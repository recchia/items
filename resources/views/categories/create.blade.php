@extends('layout')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            {!! Form::open(['route' => 'categories.store', 'method' => 'post', 'class' => 'form-horizontal']) !!}
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <fieldset>
                    <legend>Create a new Category</legend>
                    <div class="form-group">
                        {!! Form::label('name', 'Name', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::text('name', null, ['class' => 'form-control']); !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('parent', 'Parent category', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::select('parent', $categories, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            {!! Form::button('Cancel', ['class' => 'btn btn-default']) !!}
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                </fieldset>
            {!! Form::close() !!}
        </div>
    </div>
@endsection