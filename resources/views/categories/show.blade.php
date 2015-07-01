@extends('layout')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <div class="content">
                <h2 class="header">{!! $category->name !!}</h2>
                @if ($category->parent_id == null)
                    <p>No parent category</p>
                @else
                    <p>Parent category: {!! $category->parent->name !!} </p>
                @endif
            </div>
            <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-info">Edit</a>
            <form method="post" action="{{ route('categories.destroy', ['id' => $category->id]) }}" class="pull-left">
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