<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="theme-color" content="#FFFFFF">

    <title>{{ 'Server Status | ' . trans('general.name') }}</title>

    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    @include('partials.favicons')
</head>
<body>
    <main class="status">
        <div class="container">
            <ul class="servers">
                <li>Lobby <span class="label label-success">Online</span></li>
                <li>Creative <span class="label label-success">Online</span></li>
                <li>Survival <span class="label label-success">Online</span></li>
                <li>Games <span class="label label-muted">Maintenance</span></li>
            </ul>
        </div>
    </main>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
