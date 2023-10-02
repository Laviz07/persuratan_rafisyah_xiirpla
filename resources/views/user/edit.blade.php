@extends('layouts.layout')
@section('title', 'Edit User')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <span class="h1"> Edit User</span>
                </div>
                <div class="card-body">
                    <form action="/user/edit" method="POST">
                    @csrf
                        <div class="row">
                            <div class="col-md-5">

                                <div class="form-group">
                                    <label >Username</label>
                                    <input type="text" class="form-control" 
                                        name="username" value="{{$user->username}}">
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                </div>

                                <div class="form-group">
                                    <label >password</label>
                                    <input type="text" class="form-control" 
                                        name="password" value="{{$user->password}}">
                                </div>

                                <div class="form-group">
                                    <label >Role</label>
                                    <select name="role" class="form-select mb-3">
                                       <option 
                                        @if ($user->role === "operator")
                                            selected
                                        @endif 
                                       value="operator">Operator</option>

                                       <option 
                                        @if ($user->role === "admin")
                                            selected
                                        @endif 
                                       value="admin">Admin</option>
                                   </select>
                                </div>

                            </div>
                        </div>  
                        {{-- <p> --}}
                            <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-success" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection