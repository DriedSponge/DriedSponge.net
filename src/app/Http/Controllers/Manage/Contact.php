<?php

namespace App\Http\Controllers\Manage;

use App\Models\ContactResponses;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Contact extends Controller
{
    function index(Request $request){
        if(\Auth::guest()){
            return response()->json(['error' => 'Unauthenticated'],401);
        }
        if (\Auth::user()->hasPermissionTo('Contact.See')) {
            $responses = ContactResponses::select('id','Name','Email','Subject','created_at')->paginate(10);
            return response()->json($responses);
        }else{
            return response()->json(['error' => 'Unauthorized'],403);
        }
    }

    function read(Request $request, $id){
        if(\Auth::guest()){
            return response()->json(['error' => 'Unauthenticated'],401);
        }
        if (\Auth::user()->hasPermissionTo('Contact.See')) {
            $responses = ContactResponses::find($id);
            if($responses){
                return response()->json($responses);
            }else{
                return response()->json(['error' => 'Not found'],404);
            }
        }else{
            return response()->json(['error' => 'Unauthorized'],403);
        }
    }

    function delete(Request $request, $id){
        if(\Auth::guest()){
            return response()->json(['error' => 'Unauthenticated'],401);
        }
        if (\Auth::user()->hasPermissionTo('Contact.Delete')) {
            $responses = ContactResponses::find($id);
            if($responses){
                $responses->delete();
                $rest = ContactResponses::select('id','Name','Email','Subject','created_at')->paginate(10);
                return response()->json(['success' => true,"data"=>$rest]);
            }else{
                return response()->json(['error' => 'Not found'],404);
            }
        }else{
            return response()->json(['error' => 'Unauthorized'],403);
        }
    }
}
