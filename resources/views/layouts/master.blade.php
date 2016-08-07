<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>@if(isset($title)){{ $title . ' | AbsoluteCraft' }}@else{{ 'AbsoluteCraft - Creative Minecraft Server' }}@endif</title>

    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>
    @include('partials.header', ['page' => $page, 'title' => isset($title) ? $title : null])

    @if(session()->has('flashMessage'))
        <?php $flash = session()->get('flashMessage'); ?>
        <div class="alert alert-flash alert-{{ $flash['type'] }}">
            {{ $flash['message'] }}
        </div>
    @endif

    @yield('content')

    @include('partials.footer')

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
