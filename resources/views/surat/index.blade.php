@extends('layouts.layout')
@section('title', 'Manajemen Surat')

@section('content')
<div class="container mt-4 mb-4">
    <div >
        <div class="card">
            <div class="card-header">
                <div>
                    <span class="h2">Daftar Surat</span>
                </div>
                <hr  class="my-3 w-100">
                <div class="col d-flex justify-content-between mb-2 ">
                    <a href="/">
                        <btn class="btn btn-primary">Kembali</btn>
                    </a>

                    <a href="{{ url('surat/tambah')}}" class="justify-content-end">
                        <btn class="btn btn-success">Tambah </btn>
                    </a>
                </div>
            </div>
           
            <div class="card-body">
                <table class="table table-hovered table-bordered DataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Ringkasan</th>
                            <th>Jenis Surat</th>
                            <th>Dibuat Oleh</th>
                            <th>Tanggal Pembuatan</th>
                            <th>File Surat</th>
                            <th>Aksi</th>
                          </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                        ?>
                        @foreach($surat as $srt)
              
                        <tr idSrt="{{$srt->id}}" >
                            <td class="col-1" style=" width: 50px; text-align:center;">{{$no++}}</td>
                            <td class="col-2">{{$srt->ringkasan}}</td>
                            <td class="col-2">{{$srt->jenis->jenis_surat}}</td>
                            <td class="col-2">{{$srt->user->username}}</td> 
                            <td class="col-2">{{$srt->tanggal_surat}}</td>
                            <td class="col-2">
                              <div class="row mx-2 align-items-center">
                                  @if ($srt->file)
                                      <a href="{{ url("surat?path=$surat->file", ["download"]) }}"
                                          class="btn btn-primary">Download</a>
                                  @else
                                      <p class="text-center m-0 p-0">No File</p>
                                  @endif
                              </div>
                          </td>
                            <td class="col text-center ">
                                {{-- <a href="/surat/edit/{{$srt->id}}" class="text-decoration-none">
                                    <btn class="btn btn-primary">Edit</btn>
                                </a> --}}

                                <btn class="hapusBtn btn btn-danger" idSrt="{{$srt->id}}">Hapus</btn>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>

</div>
@endsection
@section('footer')
<script type="module">
    $('.DataTable tbody').on('click','.hapusBtn',function(a){
        a.preventDefault();
        let idSrt = $(this).closest('.hapusBtn').attr('idSrt');
        swal.fire({
                title : "Apakah anda ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'Setuju',
                cancelButtonText: `Batal`,
                confirmButtonColor: 'red'
    
            }).then((result)=>{
                if(result.isConfirmed){
                    //dilakukan proses hapus
                    axios.delete('surat/hapus/'+idSrt).then(function(response){
                        console.log(response);
                        if(response.data.success){
                            swal.fire('Berhasil di hapus!', '', 'success').then(function(){
                                    //Refresh Halaman
                                    location.reload();
                                });
                        }else{
                            swal.fire('Gagal di hapus!', '', 'warning').then(function(){
                                    //Refresh Halaman
                                    location.reload();
                                });
                        }
                    }).catch(function(error){
                        swal.fire('Data gagal di hapus!', '', 'error').then(function(){
                                    //Refresh Halaman
                                   
                                });
                    });
                }
            });
    });
    $('.DataTable').DataTable();
    </script>
@endsection