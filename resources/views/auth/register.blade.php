@extends('welcome')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <form class="form-horizontal" method="POST" action="/auth/register">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                <fieldset>
                    <legend>Register form</legend>
                {!! csrf_field() !!}
                <div class="form-group">
                    <label class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-10">
                        <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                    </div>
                </div>
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
                        <button class="btn btn-primary" type="submit">Register</button>
                    </div>
                </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection