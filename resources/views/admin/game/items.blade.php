@extends('layouts.app')

@section('title')
    Game List
@endsection

@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="btn btn-success" href="{{ url('admin/game/create') }}">Create</a>
{{--                <a class="nav-item nav-link" href="{{ url('admin/game/destroy') }}">Delete</a>--}}
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

                            window.location = '{{ url('admin/game') }}?locale=' + $(this).val();
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
        @foreach ($games as $game)
        <tr>
            <th scope="row">{{ $game->id }}</th>
            <td>{{ $game->name }}</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ url('admin/game/' . $game->id . '/edit') }}">Edit</a>
                        <form method="post" action="{{ url('admin/game/' . $game->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="dropdown-item" type="submit">Delete</button>
                        </form>

                    </div>
                </div>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
@endsection