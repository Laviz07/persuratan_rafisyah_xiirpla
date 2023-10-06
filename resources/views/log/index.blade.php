@extends('layouts.layout')
@section('title', 'Log Aktivitas')

@section('content')
<div class="container mt-4 mb-4">
    <div >
        <div class="card">
            <div class="card-header">
                <div>
                    <span class="h2">Daftar Log Aktivitas</span>
                </div>
                <hr  class="my-3 w-100">
                <div class="col d-flex justify-content-between mb-2 ">
                    <a href="/">
                        <btn class="btn btn-primary">Kembali</btn>
                    </a>

                </div>
            </div>
           
            <div class="card-body">
                <table class="table table-hovered table-bordered DataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Action</th>
                            <th>Log</th>
                            <th>Created At</th>
                          </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                        ?>
                        @foreach($logs as $log)
              
                        <tr idUS="{{$log->id}}" >
                            <td class="col-1" style=" width: 50px; text-align:center;">{{$no++}}</td>
                            <td class="col-2">{{$log->username}}</td>
                            <td class="col-2">{{$log->action}}</td>
                            <td class="col-6">{{$log->log}}</td>
                            <td class="col-2">{{$log->created_at}}</td>
                          
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
    $('.DataTable').DataTable();
    </script>
@endsection