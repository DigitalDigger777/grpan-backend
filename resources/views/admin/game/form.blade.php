@extends('layouts.app')

@section('title')
    Game Form
@endsection

@section('content')
    <form method="post" action="{{$game->id ? url('admin/game/' . $game->id) : url('admin/game')}}" enctype="multipart/form-data">
        @csrf
        @if ($game->id)
            @method('PATCH')
        @else
            @method('POST')
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control"
                   id="name"
                   name="name"
                   placeholder="Name"
                   value="{{$game->name}}"
            >
        </div>
        <div class="form-group">
            <label for="url">URL</label>
            <input type="text" class="form-control"
                   id="url"
                   name="url"
                   aria-describedby="urlHelp" placeholder="URL"
                   value="{{$game->url}}"
            >
            <small id="urlHelp" class="form-text text-muted">URL of game</small>
        </div>
        <div class="form-group">
            <label for="locale">Category</label>
            <select class="form-control" name="category">
                <option value="0">--SELECT--</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$game->id && $game->category && $game->category->id == $category->id ? "selected" : ""}}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="locale">Language</label>
            <select class="form-control" id="locale" name="locale">
                <option {{$game->locale == "EN" ? "selected" : ""}}>EN</option>
                <option {{$game->locale == "FR" ? "selected" : ""}}>FR</option>
                <option {{$game->locale == "RU" ? "selected" : ""}}>RU</option>
            </select>
        </div>

        <div class="form-group">
            <label>Game Image</label>
            <div class="input-group">
                <span class="input-group-btn">
                    <span class="btn btn-default btn-file">
                        Browse… <input type="file" id="image" name="image">
                    </span>
                </span>
                <input type="text" class="form-control" readonly>
            </div>
            <div class="col-12" style="text-align: center">
                <img id="img-upload" style="margin-top: 10px; width: 200px" src="{{ asset('storage/' . $game->image) }}"/>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection