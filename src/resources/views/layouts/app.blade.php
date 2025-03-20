<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>flea-market-app</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div id="app">
        @component('components.header')
        @endcomponent
        @yield('main')
    </div>
</body>

</html>