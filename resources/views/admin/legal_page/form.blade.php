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
            <label for="title">Title</label>
            <input type="text" class="form-control"
                   id="title" name="title" placeholder="Title"
                   value="{{$page->title ? $page->title : old('title')}}"
            >
            {{--<small id="nameHelp" class="form-text text-muted">Name of game category</small>--}}
        </div>
        <div class="form-group">
            <label for="title">Slug</label>
            <input type="text" class="form-control"
                   id="slug"
                   name="slug"
                   placeholder="Slug"
                   aria-describedby="slugHelp"
                   value="{{$page->slug ? $page->slug : old('slug')}}"
            >
            <small id="slugHelp" class="form-text text-muted">slug for url should be unique</small>
        </div>
        <div class="form-group">
            <label for="title">Url</label>
            <input type="text" class="form-control"
                   id="url"
                   name="url"
                   placeholder="Url"
                   aria-describedby="urlHelp"
                   value="{{$page->url ? $page->url : old('url')}}"
            >
            <small id="urlHelp" class="form-text text-muted">keep this field empty if not need use url</small>
        </div>
        <div class="form-group">
            <label for="locale">Visible</label>
            <select class="form-control" id="visible" name="visible">
                <option value="1" {{$page->status == 1 ? "selected" : ""}}>Yes</option>
                <option value="0" {{$page->status == 0 ? "selected" : ""}}>No</option>
            </select>
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
            <textarea class="form-control" id="content" name="content" rows="15">{{$page->content ? $page->content : old('content')}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection