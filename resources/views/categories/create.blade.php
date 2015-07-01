@extends('layout')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <form class="form-horizontal" method="post" action="{{ route('categories.store') }}">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                    <legend>Submit a new Category</legend>
                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="parent_id" class="col-lg-2 control-label">Parent category</label>
                        <div class="col-lg-10">
                            <select class="form-control" id="parent_id" name="parent_id">
                            @if ($categories->isEmpty())
                                <option value="0">There is no categories.</option>
                            @else
                                    <option value="0">Select a parent category.</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection