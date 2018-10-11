@extends('layouts.app')

@section('title')
    Job Category List
@endsection

@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="btn btn-success" href="{{ url('admin/job-category/create') }}">Create</a>
                {{--<a class="nav-item nav-link" href="{{ url('admin/job-category/destroy') }}">Delete</a>--}}
            </div>
        </div>
        <div class="form-inline">
            <select class="form-control" id="languageSelect">
                <option value="EN" {{ $locale == 'EN' ? 'selected' : '' }}>en</option>
                <option value="FR" {{ $locale == 'FR' ? 'selected' : '' }}>fr</option>
                <option value="RU" {{ $locale == 'RU' ? 'selected' : '' }}>ru</option>
            </select>
            <script>
                (function($){
                    $('document').ready(function(){
                        $('#languageSelect').change(function(){

                            window.location = '{{ url('admin/job-category') }}?locale=' + $(this).val();
                        });
                    });
                })(jQuery)
            </script>
        </div>
    </nav>
@endsection

@section('content')
    <table class="table table-hover">
        <thead>

        <tr>
            <th scope="col" style="width: 10px">#</th>
            <th scope="col">name</th>
            <th scope="col" style="width: 80px">action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ url('admin/job-category/' . $category->id . '/edit') }}">Edit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection