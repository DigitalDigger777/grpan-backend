@extends('layouts.app')

@section('title')
    Testimonial Form
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{$testimonial->id ? url('admin/testimonials/' . $testimonial->id ) : url('admin/testimonials')}}" enctype="multipart/form-data">
        @csrf
        @if ($testimonial->id)
            @method('PATCH')
        @else
            @method('POST')
        @endif
        <input type="hidden" name="ordering" value="{{$testimonial->ordering ? $testimonial->ordering : 0}}">
        <div class="form-group">
            <label for="name">Title</label>
            <input type="text" class="form-control"
                   id="name" name="name"
                   placeholder="Title"
                   value="{{$testimonial->name ? $testimonial->name : old('name')}}"
            >
            {{--<small id="nameHelp" class="form-text text-muted">Name of game category</small>--}}
        </div>
        <div class="form-group">
            <label for="signature">Signature Name</label>
            <input type="text" class="form-control"
                   id="signature" name="signature"
                   placeholder="Signature Name"
                   value="{{$testimonial->signature ? $testimonial->signature : old('signature')}}"
            >
        </div>
        <div class="form-group">
            <label for="game">Game</label>
            <select class="form-control" name="game">
                <option value="0">--SELECT--</option>
                @foreach($games as $game)
                    <option value="{{$game->id}}" {{($game->id && $testimonial->game && $testimonial->game->id == $game->id) || old('game') == $game->id ? "selected" : ""}}>{{$game->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{$testimonial->description ? $testimonial->description : old('description')}}</textarea>
        </div>
        <div class="form-group">
            <label for="locale">Language</label>
            <select class="form-control" id="locale" name="locale">
                <option {{$testimonial->locale == "EN" ? "selected" : ""}}>EN</option>
                <option {{$testimonial->locale == "FR" ? "selected" : ""}}>FR</option>
                <option {{$testimonial->locale == "RU" ? "selected" : ""}}>RU</option>
            </select>
        </div>
        <div class="form-group">
            <label>Icon</label>
            <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Browse… <input type="file" id="imgInp" name="image">
                </span>
            </span>
                <input type="text" class="form-control" readonly>
            </div>
            <div class="col-12" style="text-align: center">

                <img id='img-upload' style="margin-top: 10px; width: 200px"  src="{{ asset('storage/' . $testimonial->image) }}"/>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection