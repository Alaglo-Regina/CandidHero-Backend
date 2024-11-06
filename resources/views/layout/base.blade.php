<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css')}}">
    <link rel="icon" href="{{ URL::asset('asset/Images/Logo et favicon/logo-favicon')}}">
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')
</body>
</html>