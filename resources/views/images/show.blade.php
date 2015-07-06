@extends('layout')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <div class="content">
                <h2 class="header"><img src="{{ asset('img/catalog/' . $image->image) }}"></h2>
                <p> {!! $image->item->name !!} </p>
            </div>
            {!! Form::open(['route' => ['items.images.destroy', $item_id, $image->id], 'method' => 'post', 'class' => 'pull-left']) !!}
            {!! Form::hidden('_method', 'DELETE') !!}
            <div class="form-group">
                <div>
                    {!! Form::submit('Delete', ['class' => 'btn btn-warning']) !!}
                </div>
            </div>
            {!! Form::close() !!}
            <div class="clearfix"></div>
        </div>
    </div>
@endsection