<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="theme-color" content="#FFFFFF">

    <title>@if(isset($title)){{ $title . ' | ' . trans('general.name') }}@else{{ trans('general.title') }}@endif</title>

    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=2">
    <link rel="icon" type="image/png" href="/favicon-32x32.png?v=2" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-16x16.png?v=2" sizes="16x16">
    <link rel="manifest" href="/manifest.json?v=2">
    <link rel="mask-icon" href="/safari-pinned-tab.svg?v=2" color="#5AAD23">
    <link rel="shortcut icon" href="/favicon.ico?v=2">
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
    @include('partials.sticky-status')
    @include('partials.cart')

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
