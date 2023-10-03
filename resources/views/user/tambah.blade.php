@extends('layouts.layout')
@section('title', 'Tambah User')

@section('content')
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-md-12   ">
            <div class="card ">
                <div class="card-header">
                    <span class="h1"> Tambah User</span>
                </div>
                <div class="card-body">
                    <form action="tambah" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-15">
                                <div class="form-group">
                                    <label >Username</label>
                                    <input type="text" class="form-control" name="username">
                                    
                                </div>
                                <div class="form-group mt-2">
                                    <label >Password</label>
                                    <input type="text" class="form-control" name="password">
                                    
                                </div>
                                
                                <div class="form-group mt-2">
                                    <label >Role</label>
                                     <select name="role" class="form-select mb-3">
                                        <option selected value="operator">Operator</option>
                                        <option value="admin">Admin</option>
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