<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#12375C"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}" ></script>
    

    <!-- Fonts -->
    <link href="{{ asset('fonts/Montserrat-Medium.ttf') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/classic.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet"> 
    
    <!--Styles EasyAutocomplete-->
    <link href="{{asset('css/easy-autocomplete.css')}}" rel="stylesheet">
    <link href="{{asset('css/easy-autocomplete.themes.css')}}" rel="stylesheet">
    <!--Zabuto Calendar -->

    <link rel="stylesheet" href="{{asset ('css/zabuto_calendar.min.css')}}">
    
    
    
     
</head>
<body>
            
            @yield('content')
            <script src="{{ asset('js/compressed.js') }}" ></script>
            <script src="{{asset('js/easy-autocomplete.js')}}"></script>
            <script src="{{ asset('js/settings.js') }}" ></script>
            <script src="{{ asset('js/expander/jquery.expander.js') }}" ></script>
            <script src="{{ asset('js/jquery.nicescroll.min.js') }}" ></script>
            <script src="{{ asset('js/main.js') }}" ></script>
            <script src="{{ asset('js/SmartWizard.js') }}" ></script>
            <script src="{{ asset('js/moment.min.js') }}" ></script>
            <script src="{{ asset('js/daterangepicker.min.js') }}" ></script>
            <script src="{{ asset('js/jquery.validate.js') }}" ></script>
            <script src="{{ asset('js/sweetalert2.all.js') }}" ></script>
            <script src="{{asset ('js/zabuto_calendar.min.js')}}"></script>
            <!--<script src="{{ asset('js/app.js') }}" ></script>-->
            
</body>
</html>