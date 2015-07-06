@extends('layout')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2> Images </h2><a class="btn btn-primary" href="{{ route('items.images.create', $item_id) }}">Create</a>
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
                        <th>Image</th>
                        <th>Created At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($images as $image)
                        <tr>
                            <td>{!! $image->id !!} </td>
                            <td><a href="{{ route('items.images.show', ['items' => $item_id, 'images' => $image->id]) }}">{!! $image->image !!}</a></td>
                            <td>{!! $image->created_at !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection