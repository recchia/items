@extends('welcome')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <form class="form-horizontal" method="POST" action="/password/reset">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                <fieldset>
                    <legend>Reset Password form</legend>
                {!! csrf_field() !!}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                        <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                        <input class="form-control" type="password" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Confirm Password</label>
                    <div class="col-lg-10">
                        <input class="form-control" type="password" name="password_confirmation">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button class="btn btn-primary" type="submit">Reset Password</button>
                    </div>
                </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection