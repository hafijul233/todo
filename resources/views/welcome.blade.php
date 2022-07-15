<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Todo App</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
</head>
<body class="antialiased">
<div class="root" id="app">
    <app></app>
</div>
<script src="{{ asset("js/app.js") }}"></script>
</body>
</html>
