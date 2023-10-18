<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--<link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <script src="{{ asset('js/app.js')}}" defer></script>-->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id=app>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>