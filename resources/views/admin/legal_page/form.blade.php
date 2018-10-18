@extends('layouts.app')

@section('title')
    Legal Page Form
@endsection

@section('content')
    <form method="post" action="{{$page->id ? url('admin/legal-pages/' . $page->id) : url('admin/legal-pages')}}" enctype="multipart/form-data">
        @csrf
        @if ($page->id)
            @method('PATCH')
        @else
            @method('POST')
        @endif
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control"
                   id="title" name="title" placeholder="Title"
                   value="{{$page->title}}"
            >
            {{--<small id="nameHelp" class="form-text text-muted">Name of game category</small>--}}
        </div>
        <div class="form-group">
            <label for="locale">Language</label>
            <select class="form-control" id="locale" name="locale">
                <option {{$page->locale == "EN" ? "selected" : ""}}>EN</option>
                <option {{$page->locale == "FR" ? "selected" : ""}}>FR</option>
                <option {{$page->locale == "RU" ? "selected" : ""}}>RU</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Content</label>
            <textarea class="form-control" id="content" name="content" rows="15">{{$page->content}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection