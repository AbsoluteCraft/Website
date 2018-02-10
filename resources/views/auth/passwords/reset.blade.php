@extends('layouts.master', ['page' => 'login'])

@section('content')
    <main class="login">
        <div class="container">
            <div class="col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                <h3>Reset your password</h3>
                <form action="{{ route('auth.reset-password-post') }}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ $token }}">
                    @if($errors->has('email'))
                        <div class="alert alert-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="email" class="sr-only control-label">Email</label>
                        <div class="col-md-12">
                            <input type="email" name="email" id="email" placeholder="Email" class="form-control" required autofocus value="{{ old('email') ? old('email') : '' }}">
                        </div>
                    </div>
                    @if($errors->has('password'))
                        <div class="alert alert-danger">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="password" class="sr-only control-label">New Password</label>
                        <div class="col-md-12">
                            <input type="password" name="password" id="password" placeholder="Password" class="form-control" required autofocus>
                        </div>
                    </div>
                    @if($errors->has('password_confirmation'))
                        <div class="alert alert-danger">
                            {{ $errors->first('password_confirmation') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="password_confirmation" class="sr-only control-label">Confirm Password</label>
                        <div class="col-md-12">
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@stop
