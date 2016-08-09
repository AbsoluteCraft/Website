@extends('layouts.master', ['page' => 'login'])

@section('content')
    <main class="login">
        <div class="container">
            <div class="col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                <img src="https://crafatar.com/avatars/8667ba71b85a4004af54457a9734eed7" alt="" class="login-avatar">
                <h3>Login to {{ trans('general.name') }}</h3>
                <form action="{{ route('auth.login-post') }}" method="post" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="email" class="sr-only control-label">Email</label>
                        <div class="col-md-12">
                            <input type="email" name="email" id="email" placeholder="Email" class="form-control" required autofocus{{ old('email') ? ' value="' . old('email') . '"' : '' }}>
                        </div>
                    </div>
                    @if($errors->has('email'))
                        <div class="alert alert-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="password" class="sr-only control-label">Password</label>
                        <div class="col-md-12">
                            <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
                        </div>
                    </div>
                    @if($errors->has('password'))
                        <div class="alert alert-danger">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Login" class="btn btn-primary">
                        </div>
                    </div>
                </form>
                <a href="{{ route('auth.register') }}">Create an account</a> &nbsp; | &nbsp; <a href="{{ route('auth.recover-password') }}">Forgot password?</a>
            </div>
        </div>
    </main>
@stop