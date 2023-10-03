@extends('layouts.layout')
@section('title', 'Edit Jenis Surat')

@section('content')
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <span class="h1"> Edit Jenis Surat</span>
                </div>
                <div class="card-body">
                    <form action="/jenis_surat/simpan" method="POST">
                    
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label >Jenis Surat</label>
                                    <input type="text" class="form-control" 
                                        name="jenis_surat" value="{{$jenis_surat->jenis_surat}}">
                                    <input type="hidden" name="id" value="{{$jenis_surat->id}}">
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