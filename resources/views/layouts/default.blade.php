<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">

    {{-- Editor TyniMCE --}}
    <script src="https://cdn.tiny.cloud/1/msa60e83rznqkmcoznjux42z94q7bybccl2d3vniiev7bcvv/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <title>
        @yield('title') | Larablog
    </title>
  </head>
  <body>
    @include('layouts.menu')

    @yield('body')

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/dc0477d9c6.js" crossorigin="anonymous"></script> {{-- Lien récu de fontawesome par mail --}}
  </body>
</html>
