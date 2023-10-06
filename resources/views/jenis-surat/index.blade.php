@extends('layouts.layout')
@section('title', 'Manajemen Jenis Surat')

@section('content')
<div class="container mt-4 mb-4">
    <div >
        <div class="card">
            <div class="card-header">
                <div>
                    <span class="h2">Daftar Jenis Surat</span>
                </div>
                <hr  class="my-3 w-100">
                <div class="col d-flex justify-content-between mb-2 ">
                    <a href="/">
                        <btn class="btn btn-primary">Kembali</btn>
                    </a>

                    <a href="{{ url('dashboard', ['jenis_surat', 'tambah'])}}" class="justify-content-end">
                        <btn class="btn btn-success">Tambah </btn>
                    </a>
                </div>
            </div>
           
            <div class="card-body">
                <table class="table table-hovered table-bordered DataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Surat</th>
                            <th>Aksi</th>
                          </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                        ?>
                        @foreach($jenis_surat as $js)
              
                        <tr idJs="{{$js->id}}" >
                            <td class="col-1" style=" width: 50px; text-align:center;">{{$no++}}</td>
                            <td class="col-9">{{$js->jenis_surat}}</td>
                            <td class="col text-center ">
                                <a href="/dashboard/jenis_surat/edit/{{$js->id}}" class="text-decoration-none">
                                    <btn class="btn btn-primary">Edit</btn>
                                </a>

                                <btn class="hapusBtn btn btn-danger ms-3" idJS="{{$js->id}}">Hapus</btn>
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
        let idJS = $(this).closest('.hapusBtn').attr('idJS');
        swal.fire({
                title : "Apakah anda ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'Setuju',
                cancelButtonText: `Batal`,
                confirmButtonColor: 'red'
    
            }).then((result)=>{
                if(result.isConfirmed){
                    //dilakukan proses hapus
                    axios.delete('/dashboard/jenis_surat/hapus/'+idJS).then(function(response){
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