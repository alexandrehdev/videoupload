<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <link href="https://vjs.zencdn.net/8.10.0/video-js.css" rel="stylesheet" />
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')

    @yield('scripts')
    <script src="https://vjs.zencdn.net/8.10.0/video.min.js"></script>
    <script type="module" src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>