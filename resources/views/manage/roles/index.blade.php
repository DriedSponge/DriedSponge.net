@extends('layouts.manage')
@section('title','Role Management')
@section('description',"Roles")
@section('content')
<div class="container-fluid-lg">
    <div class="container-fluid">
        <div class="content-box">
            <h1>Existing Roles</h1>
            <a href="/manage/roles/create" class="btn btn-success">Create New Role</a>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <th>Name</th>
                        <th>Created At</th> 
                        <th>Settings</th> 
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr id="role-{{$role->id}}">
                                <td>{{$role->name}}</td>
                                <td>{{$role->created_at}}</td>
                                <td><a href='/manage/roles/{{$role->id}}/edit' class="btn btn-sm btn-info">Edit</a><button onclick="DeleteRole('{{$role->id}}')" class="btn btn-sm btn-danger">Delete</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <script>
                    function DeleteRole(id){
                        axios({
                            method: 'DELETE',
                            url: '/manage/roles/'+id,
                        })
                        .then(function(response) {
                              if (response.data.success) {
                                AlertSuccess(response.data.success);
                                $("#role-"+id).remove();
                            } else {
                                AlertError(response.data.error); 
                            }
                        });
                    }
                </script>
            </div>
        </div>
    </div>
</div>
<script>
    navitem = document.getElementById('adminlink').classList.add('active')
    const observer = lozad(); // lazy loads elements with default selector as '.lozad'
    observer.observe();
</script>
@endsection