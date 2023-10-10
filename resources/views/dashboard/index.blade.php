@extends('layouts.layout')
@section('title', 'Nyurat Dashboard')
@section('content')
  
<div class="container mt-4 mb-4">
    <div class="row">

        <div class="row">
          <div class="col-md-12">
          <div 
            class="card rounded-lg" 
            style="background-color: #8EC5FC;
            background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
            
          ">
            <div class="card-body text-center col ">
              <h5 
                style="font-family: 'Merienda One', sans-serif; font-size: 16px;  " 
                class="mt-3"
                >
                <b>Selamat datang <i> {{Auth::user()->username}}</i>! Di</b>
              </h5>
                {{-- <div class="d-flex flex-column align-items-center">  --}}
                  <img src="https://cdn.icon-icons.com/icons2/3566/PNG/512/mail_email_logo_icon_225397.png"
                    alt="nyurat logo" class="img-fluid   profile-image-pic my-2" width="90px">
                  <span style="font-size: 50px; font-family: 'Merienda One', sans-serif; vertical-align: middle; ">
                    <b>NYUUAAAK~~ </b>
                  </span>
                {{-- </div> --}}
              </div>
          </div>
        </div>
      </div>

        <div class="mt-4 row l-container"> 
          @if(Auth::user()["role"]==="admin")

          <div class="col-3">
            <a href="{{url('dashboard', ['user'])}}" class="text-decoration-none">
             
                <div class="card bg-red-g" >
                    <div class="card-body text-white">
                        <h1 class="text-right"><i class="bi bi-person-fill"></i><span
                                class="f-right">{{$user}}</span></h1>
                        <h2>User</h2>
                    </div>
                </div>
            </a>
          </div>

          <div class="col-3">
            <a href="{{url('dashboard', ['jenis_surat'])}}" class="text-decoration-none">
                <div class="card bg-yellow-g" >
                    <div class="card-body text-white">
                        <h1 class="text-right"><i class="bi bi-envelope-paper"></i><span
                                class="f-right"> {{$jsurat}} </span></h1>
                        <h2>Jenis Surat</h2>
                    </div>
                </div>
            </a>
          </div>

          @endif



        <div class="col-3">
          <a href="{{url('dashboard', ['surat'])}}" class="text-decoration-none">
              <div class="card bg-green-g" >
                  <div class="card-body text-white">
                      <h1 class="text-right"><i class="bi bi-envelope"></i><span
                              class="f-right"> {{$surat}} </span></h1>
                      <h2>Surat</h2>
                  </div>
              </div>
          </a>
      </div>


    <div class="col-3">
      <a href="{{url('dashboard', ['logs'])}}" class="text-decoration-none">
          <div class="card bg-blue-g" >
              <div class="card-body text-white">
                  <h1 class="text-right"><i class="bi bi-activity"></i><span
                          class="f-right"> {{$logs}} </span></h1>
                  <h2>Log Activity</h2>
              </div>
          </div>
      </a>
  </div>
      </div>

        <div class="row mt-4">
          <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {!! $suratChart->container() !!}
                </div>
            </div>
          </div>
      </div>

      <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    {!! $jsChart->container() !!}
                </div>
            </div>
        </div>
    
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    {!! $userChart->container() !!}
                </div>
            </div>
        </div>
      </div>
    
    </div>

    </div>

    
</div>
@section('footer')
    <script src="{{$suratChart->cdn()}}"></script>
    {{$suratChart->script()}}

    <script src="{{$jsChart->cdn()}}"></script>
    {{$jsChart->script()}}

    <script src="{{$userChart->cdn()}}"></script>
    {{$userChart->script()}}
@endsection
@endsection