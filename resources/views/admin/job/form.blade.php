@extends('layouts.app')

@section('title')
    Job Form
@endsection

@section('content')
    <form method="post" action="{{$job->id ? url('admin/job/' . $job->id) : url('admin/job')}}" enctype="multipart/form-data">
        @csrf
        @if ($job->id)
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
        <input type="hidden" name="ordering" value="{{$job->ordering ? $job->ordering : 0}}">
        <div class="form-group">
            <label for="name">Position</label>
            <input type="text" class="form-control"
                   id="name" name="name"
                   placeholder="Position"
                   value="{{$job->name}}"
            >
            {{--<small id="nameHelp" class="form-text text-muted">Name of game category</small>--}}
        </div>
        <div class="form-group">
            <label for="locations">Locations</label>
            <input type="text" class="form-control"
                   name="city"
                   placeholder="Locations"
                   value="{{$job->city}}"
            >
            {{--<small id="nameHelp" class="form-text text-muted">Name of game category</small>--}}
        </div>
        <div class="form-group">
            <label for="locale">Category</label>
            <select class="form-control" name="category">
                <option value="0">--SELECT--</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" {{$job->id && $job->category && $job->category->id == $category->id ? "selected" : ""}}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="locale">Language</label>
            <select class="form-control" name="locale">
                <option {{$job->locale == "EN" ? "selected" : ""}}>EN</option>
                <option {{$job->locale == "FR" ? "selected" : ""}}>FR</option>
                <option {{$job->locale == "RU" ? "selected" : ""}}>RU</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection