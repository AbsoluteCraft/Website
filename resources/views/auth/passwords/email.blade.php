@extends('layouts.master', ['page' => 'login'])

@section('content')
    <main class="login">
        <div class="container">
            <div class="col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                <h3>Reset your password</h3>
                <p>Submit your email address and we’ll send you a link to reset your password.</p>
                <br />
                <form action="{{ route('auth.forgot-password-post') }}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
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
