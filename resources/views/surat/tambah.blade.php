@extends('layouts.layout')
@section('title', 'Tambah Surat')

@section('content')
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <span class="h1"> Tambah Surat</span>
                </div>
                <div class="card-body">
                    <form action="tambah" method="POST">
                        @csrf
                        <div class="row">
                            <div class="">
                                <div class="form-group mt-2">
                                    <label for="tanggal" >Tanggal Surat</label>
                                    <input type="datetime-local" class="form-control" id="tanggal" name="tanggal_surat">
                                    
                                </div>
                                
                                <div class="form-group mt-2">
                                    <label >Jenis Surat</label>
                                     <select name="id_jenis_surat" class="form-select mb-3">
                                        @foreach($jenis_surat as $js)
                                            <option selected value="{{$js->id}}">{{$js->jenis_surat}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mt-2">
                                    <label >User</label>
                                     <select name="id_user" class="form-select mb-3">
                                        @foreach($user as $us)
                                            <option selected value="{{$us->id}}">{{$us->username}}</option>
                                        @endforeach
                                    </select>
                                </div>
                               
                                <div class="form-group">
                                    <label >Ringkasan Surat</label>
                                    <textarea name="ringkasan" id="" class="form-control" rows="7" placeholder="Ringkasan" style="resize: none"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mt-3 align-items-center">
                                        <label for="fileUpload" class="">Upload File</label>
                                        <input type="file" name="file" id="fileUpload" class="btn w-auto btn-outline-success form-control">
                                    </div>
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