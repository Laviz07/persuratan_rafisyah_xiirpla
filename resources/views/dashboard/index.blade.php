@extends('layouts.layout')
@section('title', 'Nyurat Dashboard')
    
@section('content')
<div class="container mt-4 mb-4">
    <div class="row">

        <div class="row">
          <div class="card bg-c-yellow">
            <div class="card-body text-center col ">
              <img src="https://cdn.icon-icons.com/icons2/3566/PNG/512/mail_email_logo_icon_225397.png"
                 alt="nyurat logo" class="img-fluid profile-image-pic my-2" width="40px">
              <span style="font-size: 20px; font-family: 'Merienda One', sans-serif; vertical-align: middle">
                <b>NYURAT DASHBOARD</b>
              </span>
            </div>
          </div>
        </div>

        <div class="row mt-4">
          <div class="card">
              <div class="card-body">
                  {!! $suratChart->container() !!}
              </div>
          </div>
      </div>

      <div class="row mt-4 ">
        <div class="card">
            <div class="card-body">
                {!! $jsChart->container() !!}
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
@endsection
@endsection