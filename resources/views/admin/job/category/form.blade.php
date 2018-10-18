@extends('layouts.app')

@section('title')
    Job Category Form
@endsection


@section('content')
    <form method="post" action="{{$category->id ? url('admin/job-category/' . $category->id ) : url('admin/job-category')}}" enctype="multipart/form-data">
        @csrf

        @if ($category->id)
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
                   id="name" name="name" aria-describedby="nameHelp"
                   placeholder="Category"
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