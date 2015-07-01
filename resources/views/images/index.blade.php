@extends('layout')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2> Images </h2><a class="btn btn-primary" href="{{ route('images.create') }}">Create</a>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if ($images->isEmpty())
                <p> There is no images.</p>
            @else
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Item</th>
                        <th>Image</th>
                        <th>Created At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($images as $image)
                        <tr>
                            <td>{!! $image->id !!} </td>
                            <td>{!! $image->item->name !!}</td>
                            <td><a href="{{ route('images.show', ['id' => $image->id]) }}">{!! $image->image !!}</a></td>
                            <td>{!! $image->created_at !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection