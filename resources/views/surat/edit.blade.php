@extends('layouts.layout')
@section('title', 'Edit Surat')

@section('content')
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <span class="h1"> Edit Surat</span>
                </div>
                <div class="card-body">
                    <form action="/surat/edit/{{ $surat->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="tanggal_surat">Tanggal Surat</label>
                                    <input type="datetime-local" class="form-control" 
                                        name="tanggal_surat" value="{{ $surat->tanggal_surat }}">
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                </div>

                                <div class="form-group">
                                    <label for="jenis_surat">Jenis Surat</label>
                                    <select name="jenis_surat" class="form-select mb-3">
                                        @foreach($jenis_surat as $js)
                                            <option value="{{ $js->id }}" {{ $js->id === $surat->id_jenis_surat ? 'selected' : '' }}>
                                                {{ $js->jenis_surat }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="ringkasan">Ringkasan</label>
                                    <textarea name="ringkasan" id="ringkasan" class="form-control" rows="7" 
                                        placeholder="Ringkasan" style="resize: none">{{ $surat->ringkasan }}</textarea>
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