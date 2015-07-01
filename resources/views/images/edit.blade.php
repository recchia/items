@extends('layout')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            {!! Form::model($image, ['route' => ['images.update', $image->id], 'method' => 'post', 'class' => 'form-horizontal', 'files' => true]) !!}
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <fieldset>
                <legend>Edit Image</legend>
                <div class="form-group">
                    {!! Form::label('item', 'Item', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::select('item', $items, $image->item->id, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('image', 'Image', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::file('image', null); !!}
                        <span class="help-block">Only png/jpg images allowed.</span>
                    </div>
                </div>
                <p><img src="{{ asset('img/catalog/' . $image->image) }}"></p>
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