@extends('layout')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <div class="content">
                <h2 class="header">{!! $item->name !!}</h2>
                <p> {!! $item->description !!} </p>
            </div>
            <a href="{!! action('ItemsController@edit', $item->id) !!}" class="btn btn-info">Edit</a>
            <form method="post" action="{!! action('ItemsController@destroy', $item->id) !!}" class="pull-left">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
                <div>
                    <button type="submit" class="btn btn-warning">Delete</button>
                </div>
            </div>
            </form>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection