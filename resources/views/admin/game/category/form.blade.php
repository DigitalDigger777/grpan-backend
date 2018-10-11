@extends('layouts.app')

@section('title')
    Game Category
@endsection

@section('content')


    <form method="post" action="{{$category->id ? url('admin/game-category/' . $category->id ) : url('admin/game-category')}}" enctype="multipart/form-data">
        @csrf

        @if ($category->id)
            @method('PATCH')
        @else
            @method('POST')
        @endif

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control"
                   id="name" name="name"
                   aria-describedby="nameHelp" placeholder="Category"
                   value="{{$category->name}}"
            >
            <small id="nameHelp" class="form-text text-muted">Name of game category</small>
        </div>
        <div class="form-group">
            <label for="locale">Language</label>
            <select class="form-control" id="locale" name="locale">
                <option {{$category->locale == "EN" ? "selected" : ""}}>EN</option>
                <option {{$category->locale == "FR" ? "selected" : ""}}>FR</option>
                <option {{$category->locale == "RU" ? "selected" : ""}}>RU</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection