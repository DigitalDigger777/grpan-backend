@extends('layouts.app')

@section('title')
    GPG Perk Form
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
    <form method="post" action="{{$testimonial->id ? url('admin/gpg-perks/' . $testimonial->id ) : url('admin/testimonials')}}" enctype="multipart/form-data">
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
                   value="{{$testimonial->name}}"
            >
            {{--<small id="nameHelp" class="form-text text-muted">Name of game category</small>--}}
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{$testimonial->description}}</textarea>
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