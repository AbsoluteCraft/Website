<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="theme-color" content="#FFFFFF">

    <title>@if(isset($title)){{ $title . ' | ' . trans('general.name') }}@else{{ trans('general.title') }}@endif</title>

    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    @include('partials.favicons')
</head>
<body>
    @include('partials.header', ['page' => $page, 'title' => isset($title) ? $title : null])

    @if(session()->has('flashMessage'))
        <?php $flash = session()->get('flashMessage'); ?>
        <div class="alert alert-flash alert-{{ $flash['type'] }}">
            {!! $flash['message'] !!}
        </div>
    @endif

    @yield('content')

    @include('partials.footer')
    @include('partials.cart')
    @include('partials.sticky-help')

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
