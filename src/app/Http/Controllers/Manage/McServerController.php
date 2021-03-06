<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\McPlayer;
use App\Models\McServer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;

class McServerController extends Controller
{
    public function index(Request $request){
        if(!\Auth::guest()){
            if(\Auth::user()->hasPermissionTo('Projects.See')){
                $servers = McServer::select('id','ip','port','created_at','private','name')->orderBy('created_at','desc')->with('players:id')->paginate(9);
                $servers->transform(function ($item,$key){
                    $item->player_count = $item->players->count();
                    return $item;
                });
                return response()->json($servers);
            }else{
                return response()->json(['error' => 'Unauthorized'],403);
            }
        }
        return response()->json(['error' => 'Unauthenticated'],401);
    }

    public function store(Request $request)
    {
        if(\Auth::guest()){
            return response()->json(['error' => 'Unauthenticated'],401);
        }
        if (\Auth::user()->hasPermissionTo('Projects.Create')) {
            $validator = Validator::make($request->all(), [
                "name" => "required|max:100",
                "ip" => "required|max:50",
                "port" => "integer",
                "description" => "max:2000",
                "private" => "required|boolean"
            ]);
            if ($validator->passes()) {
                $server = new McServer();
                $server->name = $request->name;
                $server->ip = $request->ip;
                $server->port = $request->port;
                $server->description = $request->description;
                $server->private = $request->private;
                $pass = Str::random(64);
                $server->slug = Str::slug($request->name);
                $server->password = Hash::make($pass);
                $server->save();
                return response()->json(['success' => "The server has been added!","token"=>$pass],201);
            }
            return response()->json($validator->errors(),400);
        } else {
            return response()->json(['error' => 'Unauthorized'],403);
        }
    }

    public function destroy(Request $request,$id)
    {
        if(\Auth::guest()){
            return response()->json(['error' => 'Unauthenticated'],401);
        }
        if (\Auth::user()->hasPermissionTo('Projects.Delete')) {
            $mcserver = McServer::find($id);
            if($mcserver){
                $mcserver->delete();
                $rest = McServer::select('id','ip','port','created_at','private','name')->orderBy('created_at','desc')->paginate(9);
                return response()->json($rest);
            }else{
                return response()->json(['error' => 'Not found'],404);
            }
        }else{
            return response()->json(['error' => 'Unauthorized'],403);
        }
    }

    public function show($id)
    {
        if(\Auth::guest()){
            return response()->json(['error' => 'Unauthenticated'],401);
        }
        if (\Auth::user()->hasPermissionTo('Projects.Edit')) {
            $server = McServer::select('name','ip','port','description','private')->where('id',$id)->first();
            if($server){
                return response()->json($server);
            }else{
                return response()->json(['error' => 'Not found'],404);
            }
        }else{
            return response()->json(['error' => 'Unauthorized'],403);
        }
    }

    public function update(Request $request, $id)
    {
        if(\Auth::guest()){
            return response()->json(['error' => 'Unauthenticated'],401);
        }
        if (\Auth::user()->hasPermissionTo('Projects.Edit')) {
            $server = McServer::find($id);
            if($server){
                $validator = Validator::make($request->all(), [
                    "name" => "required|max:100",
                    "ip" => "required|max:50",
                    "port" => "integer",
                    "description" => "max:2000",
                    "private" => "required|boolean"
                ]);
                if($validator->passes()){
                    $server->name = $request->name;
                    $server->ip = $request->ip;
                    $server->port = $request->port;
                    $server->description = $request->description;
                    $server->private = $request->private;
                    $server->slug = Str::slug($request->name);
                    $server->save();
                    return response()->json(['success' => 'The server has been updated!']);
                }
                return response()->json($validator->errors(),400);
            }else{
                return response()->json(['error' => 'Not found'],404);
            }
        }else{
            return response()->json(['error' => 'Unauthorized'],403);
        }
    }

    public function regen($id)
    {
        if(\Auth::guest()){
            return response()->json(['error' => 'Unauthenticated'],401);
        }
        if (\Auth::user()->hasPermissionTo('Projects.Edit')) {
            $server = McServer::find($id);
            if($server){
                $pass = Str::random(64);
                $server->password = Hash::make($pass);
                $server->save();
                return response()->json(["success"=>"The server key has been regnerated! Don't lose it!","token"=>$pass]);
            }else{
                return response()->json(['error' => 'Not found'],404);
            }
        }else{
            return response()->json(['error' => 'Unauthorized'],403);
        }
    }

    public function players(Request $request){
        if(!\Auth::guest()){
            if(\Auth::user()->hasPermissionTo('Projects.See')){
                $players = McPlayer::select('id','username','uuid','created_at')->orderBy('created_at','desc')->paginate(9);
                return response()->json($players);
            }else{
                return response()->json(['error' => 'Unauthorized'],403);
            }
        }
        return response()->json(['error' => 'Unauthenticated'],401);
    }
    public function playerDelete(Request $request, $id){
        if(\Auth::guest()){
            return response()->json(['error' => 'Unauthenticated'],401);
        }
        if (\Auth::user()->hasPermissionTo('Projects.Delete')) {
            $player = McPlayer::find($id);
            if($player){
                $player->delete();
                $rest = McPlayer::select('id','username','uuid','created_at')->orderBy('created_at','desc')->paginate(9);
                return response()->json($rest);
            }else{
                return response()->json(['error' => 'Not found'],404);
            }
        }else{
            return response()->json(['error' => 'Unauthorized'],403);
        }
    }
}
