@extends('layout')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">

            {!! Form::model($item, ['route' => ['items.update', $item->id], 'method' => 'post', 'class' => 'form-horizontal']) !!}
            {!! Form::hidden('_method', 'PUT') !!}
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <fieldset>
                    <legend>Edit item</legend>
                    <div class="form-group">
                        {!! Form::label('name', 'Name', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Description', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '3']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('category_list', 'Categories', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::select('category_list[]', $categories, null, ['class' => 'form-control', 'multiple']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            {!! Form::button('Cancel', ['class' => 'btn btn-default']) !!}
                            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                </fieldset>
            {!! Form::close() !!}
        </div>
    </div>
@endsection