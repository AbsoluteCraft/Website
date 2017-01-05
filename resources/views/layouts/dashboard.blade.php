<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="theme-color" content="#FFFFFF">

    <title>@if(isset($title)){{ $title . ' | ' . trans('general.name') }}@else{{ trans('general.title') }}@endif</title>

    <link rel="stylesheet" href="{{ app_asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ app_asset('css/dashboard.css')}}">
    @include('partials.favicons')
</head>
<body class="dashboard">
@include('dashboard.header')
@include('dashboard.sidebar', ['page' => $page, 'title' => isset($title) ? $title : null])

@if(session()->has('flashMessage'))
    <?php $flash = session()->get('flashMessage'); ?>
    <div class="alert alert-flash alert-{{ $flash['type'] }}">
        {{ $flash['message'] }}
    </div>
@endif

<div class="content">
    @yield('content')
</div>

<script src="{{ app_asset('js/dashboard.js') }}"></script>
</body>
</html>
