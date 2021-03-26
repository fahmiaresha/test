<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title', 'Error')
    </title>
    
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/assets/favicon/site.webmanifest') }}">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/assets/materialize-1.0.0/css/materialize.min.css') }}">

    <style>
        * {
            margin: 0;
        }

        body, html {
            height: 100%;
        }

        #app {
            background-image: url("{{ asset('/assets/img/login-bg-3.png') }}");
        }
    </style>

    <link rel="stylesheet" href="{{ asset('/assets/css/error.css') }}">
</head>
<body>
    <div id="app">
        <div id="content">
            <div class="row">
                <div class="col s12 main-content">
                    <div class="row component">
                        <div class="col s12">
                            <h1 class="error-code white-text">
                                @yield('error-code')
                            </h1>
                        </div>
                    </div>

                    <div class="row component">
                        <div class="col s12">
                            <h5 class="error-message white-text">
                                @yield('error-message')
                            </h5>
                        </div>
                    </div>

                    <div class="row component">
                        <div class="col s12">
                            <a href="{{ url('/') }}" class="waves-effect waves-light btn yellow accent-2 black-text">
                                <i class="material-icons left">home</i>
                                DASHBOARD
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('/assets/materialize-1.0.0/js/materialize.min.js') }}"></script>
</body>
</html>