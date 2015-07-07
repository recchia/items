@extends('welcome')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <form class="form-horizontal" method="POST" action="/password/email">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                <fieldset>
                    <legend>Reset password form</legend>
                {!! csrf_field() !!}
                <div class="form-group">
                    <label class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                        <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button class="btn btn-primary" type="submit">Send Password Reset Link</button>
                    </div>
                </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection