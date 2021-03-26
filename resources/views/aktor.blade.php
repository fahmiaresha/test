<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Aktor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <style>
        #app {
            width: 70%;
            margin-left: 15%;
            margin-top: 5%;
            text-align: center;
        }

        #app ul li {
            border: none;
            width: 100%;
        }

        #app ul li a {
            width: 50%;
        }
    </style>
</head>
<body>
    <div id="app" class="">
        <h3>Silahkan pilih aktor</h3>
        <h6>Halaman sementara, dapat dihapus saat autentikasi dan autorisasi sudah dibuat</h6>

        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{ url('/admin-gudang') }}" class="btn btn-info btn-sm">Admin Gudang</a>
            </li>
            <li class="list-group-item">
                <a href="{{ url('/manajer-marketing') }}" class="btn btn-info btn-sm">Manajer Marketing</a>
            </li>
            <li class="list-group-item">
                <a href="{{ url('/operator-mesin') }}" class="btn btn-info btn-sm">Operator Mesin</a>
            </li>
            <li class="list-group-item">
                <a href="{{ url('/owner') }}" class="btn btn-info btn-sm">Owner</a>
            </li>
            <li class="list-group-item">
                <a href="{{ url('/sales-a') }}" class="btn btn-info btn-sm">Sales A</a>
            </li>
            <li class="list-group-item">
                <a href="{{ url('/sales-b') }}" class="btn btn-info btn-sm">Sales B</a>
            </li>
        </ul>
    </div>
    
    {{-- Script --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>