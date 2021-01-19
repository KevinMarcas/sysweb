<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>SGH El Encanto</title>
    <link rel="shortcut icon" type="image/ico" href="/img/Page.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/adicional.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
</head>
<body>

    <div class="container" >
        @if (session()->has('flash'))
            <div class="alert alert-info">{{ session('flash')}}</div>
        @endif
        @yield('content')
    </div>

</body>
</html>
