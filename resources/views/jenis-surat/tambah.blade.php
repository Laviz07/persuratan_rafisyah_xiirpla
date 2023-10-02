@extends('layouts.layout')
@section('title', 'Tambah Jenis Surat')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <span class="h1"> Tambah Jenis Surat</span>
                </div>
                <div class="card-body">
                    <form action="simpan" method="POST">
                    
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label >Jenis Surat</label>
                                    <input type="text" class="form-control" name="jenis_surat">
                                    @csrf
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