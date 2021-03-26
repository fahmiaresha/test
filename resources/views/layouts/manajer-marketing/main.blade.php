<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Kemiri Water Solution')
    </title>

    {{-- Favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/assets/favicon/site.webmanifest') }}">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="{{ asset('/assets/fontawesome/css/all.min.css') }}">

    {{-- CSS --}}
    {{-- <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/bundle.css') }}" type="text/css"> --}}
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/gogi-bundle.min.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('/assets/gogi/assets/css/app.min.css') }}" type="text/css"> --}}
    <link rel="stylesheet" href="{{ asset('/assets/gogi/assets/css/gogi-app.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/css/custom-global.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/css/user-profile.css') }}" type="text/css">

    {{-- Extra CSS --}}
    @yield('extra-css')
</head>
<body class="horizontal-navigation scrollable-layout">
    {{-- Start Preloader --}}
    <div class="preloader">
        <div class="preloader-icon"></div>
        <span>Loading...</span>
    </div>
    {{-- End of Preloader --}}

    {{-- Sidebar Group --}}
    {{-- @include('layouts/manajer-marketing/sidebar-group') --}}

    {{-- Start Layout Wrapper --}}
    <div class="layout-wrapper">

        {{-- Header --}}
        @include('layouts/manajer-marketing/header')

        {{-- Start Content Wrapper --}}
        <div class="content-wrapper">

            {{-- Navigation --}}
            @include('layouts/manajer-marketing/navigation')

            {{-- Start Content Body --}}
            <div class="content-body">

                {{-- Content --}}
                @yield('content')

                {{-- User Profile --}}
                @include('manajer-marketing/profil');

                {{-- Footer --}}
                @include('layouts/footer')

            </div>
            {{-- End of Content Body --}}

        </div>
        {{-- End of Content Wrapper --}}
    </div>
    {{-- End of Layout Wrapper --}}
    
    {{-- Gogi Script --}}
    {{-- <script src="{{ asset('/assets/gogi/vendors/bundle.js') }}"></script> --}}
    <script src="{{ asset('/assets/gogi/vendors/gogi-bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('/assets/gogi/assets/js/app.min.js') }}"></script> --}}
    <script src="{{ asset('/assets/gogi/assets/js/gogi-app.min.js') }}"></script>

    {{-- Fontawesome --}}
    <script src="{{ asset('/assets/fontawesome/js/all.min.js') }}"></script>

    {{-- TinyMCE --}}
    <script src="https://cdn.tiny.cloud/1/3dafzz276jvy64huaztwshj60h0lfqkv1fm1q50hw63qbt75/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    
    {{-- Extra Script --}}
    @yield('extra-script')
</body>
</html>