<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cinema</title>

    <link href="https://cdn.bootcss.com/bulma/0.4.1/css/bulma.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Styles -->
    <!--<link href="{{ mix('css/app.css') }}" rel="stylesheet">-->

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>
<script src="{{ mix('js/app.js') }}"></script>

    <div id="app">

        @include('cinema.layouts.header')

        @yield('content')

    </div>




</body>
</html>