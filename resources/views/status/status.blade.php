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
                @foreach($servers as $name => $server)
                    <li>
                        {{ $name . ' ' }}
                        <span class="label {{ $server['online'] ? 'label-success' : 'label-danger' }}">
                            {{ $server['online'] ? 'Online' : 'Offline' }}
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </main>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
