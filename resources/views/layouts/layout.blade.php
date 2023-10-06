<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

     <!-- CSRF Token -->

     <meta name="csrf-token" content="{{ csrf_token() }}">
     <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
     <link rel="icon" href="{{asset('mail-logo.png')}}">

    <title>@yield('title')</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body {
            background: #eeeeee;
        }
        .form-inline {
            display: inline-block;
        }
        .navbar-header.col {
            padding: 0 !important;
        }
        .navbar {		
            background: #fff;
            padding-left: 16px;
            padding-right: 16px;
            border-bottom: 1px solid #d6d6d6;
            box-shadow: 0 0 4px rgba(0,0,0,.1);
            
        }
        .nav-link img {
            border-radius: 50%;
            width: 36px;
            height: 36px;
            margin: -8px 0;
            float: left;
            margin-right: 10px;
        }
        .navbar .navbar-brand {
            color: #555;
            padding-left: 0;
            padding-right: 50px;
            font-family: 'Merienda One', sans-serif;
            font-size: 20px;
        }
        .nav-item.account {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }
       
        .navbar .nav-item i {
            font-size: 38px;
        }

    
        .navbar .active a, .navbar .active a:hover, .navbar .active a:focus {
            background: transparent !important;
        }
        @media (min-width: 1200px){
            .form-inline .input-group {
                width: 300px;
                margin-left: 30px;
            }
        }
        @media (max-width: 1199px){
            .form-inline {
                display: block;
                margin-bottom: 10px;
            }
            .input-group {
                width: 100%;
            }
        }

    </style>
</head>

<body>

    <nav class="navbar navbar-expand-xl navbar-light bg-light">
        <img src="https://cdn.icon-icons.com/icons2/3566/PNG/512/mail_email_logo_icon_225397.png"
                class="img-fluid profile-image-pic   my-2" width="40px" alt="profile">
        <a href="#" class="navbar-brand ps-2"><b>NYURAT</b></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
            <div class="navbar-nav">
                <a href="/dashboard" class="nav-item nav-link active">Dashboard</a>

                @if(Auth::user()["role"]==="admin")
                    <a href="{{url('dashboard', ['user'])}}" class="nav-item nav-link">Manajemen User</a>
                    <a href="{{ url('dashboard', ['jenis_surat'])}}" class="nav-item nav-link">Manajemen Jenis Surat</a>
                @endif
                <a href="{{url('dashboard', ['surat'])}}" class="nav-item nav-link">Manajemen Surat</a>
                <a href="{{url('dashboard', ['logs'])}}" class="nav-item nav-link">Logs</a>
            </div>
        
            <div class="navbar-nav navbar-collapse justify-content-end">
                <div class="nav-item account">
                    <li class="nav-item mx-4 d-flex align-items-center">
                        <h1 class="m-auto mx-2"><i class="bi bi-person-circle"></i></h1>
                        <div>
                            <p class="mb-0 fs-5">{{Auth::user()->username}}</p>
                            <p class="text-capitalize m-0 text-secondary">{{Auth::user()->role}}</p>
                            {{-- <p class="mb-0 fs-5">Username</p>
                            <p class="text-capitalize m-0  text-secondary">Role</p> --}}
                        </div>
                    </li>
                    <li>
                        <a href="/logout" class="btn logout btn-danger ">Logout</a>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="container">
        @include('layouts.flashMessage')
        @yield('content')
    </div>

</body>

<footer>
    @yield('footer')
</footer>

</html>