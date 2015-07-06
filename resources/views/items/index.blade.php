@extends('layout')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2> Items </h2><a class="btn btn-primary" href="{{ route('items.create') }}">Create</a>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if ($items->isEmpty())
                <p> There is no items.</p>
            @else
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Categories</th>
                        <th>Images</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{!! $item->id !!} </td>
                            <td><a href="{!! action('ItemsController@show', $item->id) !!}">{!! $item->name !!}</a></td>
                            <td>{!! $item->description !!}</td>
                            <td>
                                <ul>
                                @foreach($item->categories as $category)
                                    <li>{!! $category->name !!}</li>
                                @endforeach
                                </ul>
                            </td>
                            <td>
                                <a href="{{ route('items.images.index', ['items' => $item->id]) }}">View</a> -
                                <a href="{{ route('items.images.create', $item->id) }}">Add</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection