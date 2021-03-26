<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Kemiri Water Solution</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/assets/favicon/site.webmanifest') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/login_util.css') }}">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="{{ asset('/assets/fontawesome/css/all.min.css') }}">

    <style>
        @font-face {
            font-family: Ubuntu-Regular;
            src: url('{{ asset('/assets/fonts/ubuntu/Ubuntu-Regular.ttf') }}'); 
        }

        @font-face {
            font-family: Ubuntu-Bold;
            src: url('{{ asset('/assets/fonts/ubuntu/Ubuntu-Bold.ttf') }}'); 
        }
    </style>

    <link rel="stylesheet" href="{{ asset('/assets/css/login_main.css') }}">
</head>
<body>

	<div class="limiter">
        <div class="container-login100" style="background-image: url('{{ asset('/assets/img/login-bg.jpg') }}');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
                    <img src="{{ asset('/assets/img/logo-kemiri-180.png') }}">
				</span>
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <i class="fas fa-exclamation-triangle mr-2"></i>Gagal login. Pastikan username dan password benar.
                    </div>
                @endif
                <form action="{{ route('login') }}" method="POST" class="login100-form validate-form p-b-33 p-t-5">
                    @csrf

					<div class="wrap-input100">
                        <input class="input100" type="text" name="username" id="username" placeholder="Username" autocomplete="off">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100">
						<input class="input100" type="password" name="password" id="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>
                    
                    <div class="form-group form-check my-3 ml-4">
                        <input type="checkbox" class="form-check-input mt-1" id="togglePassword">
                        <label class="form-check-label" for="togglePassword">Show Password</label>
                    </div>

					<div class="container-login100-form-btn m-t-32">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
    
    <script src="{{ asset('/assets/js/login.js') }}"></script>
</body>
</html>