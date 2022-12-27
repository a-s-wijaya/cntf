<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Icon -->
    <link rel="icon" href="{{ asset('img/icon.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <style>
        a {
            text-decoration: none;
            color: black;
        }
        a:hover {
            text-decoration: none;
            color: black;
        }
        .btn-primary {
            background-color: #667AE1;
            border-color: #667AE1;
        }
        .card-1 {
            background: linear-gradient(90.55deg, #105ED2 30%, #4683DF 100%);
            border-radius: 10px;
        }
        .card-2 {
            background: linear-gradient(90.55deg, #F67F11 30%, #EBC973 100%);
            border-radius: 10px;
        }
        .card-3 {
            background: linear-gradient(90.55deg, #D2CB10 30%, #F8CE39 100%);
            border-radius: 10px;
        }
        .card-4 {
            background: linear-gradient(90.55deg, #42D210 30%, #89DF46 100%);
            border-radius: 10px;
        }
        .card-5 {
            background: linear-gradient(90.55deg, #8810D2 30%, #BB6EEB 100%);
            border-radius: 10px;
        }
        .card-6 {
            background: linear-gradient(90.55deg, #E40909 30%, #DC3B3B 100%);
            border-radius: 10px;
        }
        .card-bg {
            position: absolute;
            top: 25px;
            left: 25px;
            width: 80px;
            height: 80px;
            object-fit: cover;
            z-index: 0;
        }
        #arrowAnim {
            display: flex;
            justify-content: center;
            align-items: center;
        } 
        .arrow {
            width: 5vw;
            height: 5vw;
            border: 2.5vw solid;
            border-color: black transparent transparent black;
            transform: rotate(-225deg);
        }
        .arrowSliding {
            position: absolute;
            -webkit-animation: slide 4s linear infinite; 
            animation: slide 4s linear infinite;
        }
        .delay1 {
            -webkit-animation-delay: 1s; 
            animation-delay: 1s;
        }
        .delay2 {
            -webkit-animation-delay: 2s; 
            animation-delay: 2s;
        }
        .delay3 {
            -webkit-animation-delay: 3s; 
            animation-delay: 3s;
        }
        
        @-webkit-keyframes slide {
            0% { opacity:0; transform: translateX(-15vw); }	
            20% { opacity:1; transform: translateX(-9vw); }	
            80% { opacity:1; transform: translateX(9vw); }	
            100% { opacity:0; transform: translateX(15vw); }	
        }
        @keyframes slide {
            0% { opacity:0; transform: translateX(-15vw); }	
            20% { opacity:1; transform: translateX(-9vw); }	
            80% { opacity:1; transform: translateX(9vw); }	
            100% { opacity:0; transform: translateX(15vw); }	
        }
    </style>
    @stack('styles')
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>