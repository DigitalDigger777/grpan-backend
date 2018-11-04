@extends('layouts.app')

@section('scripts')
    <script src="{{ asset('js/jquery.dform-1.1.0.js') }}" defer></script>
@endsection

@section('title')
    Static Content Form
@endsection

@section('content')
    <form method="post" action="{{$content->id ? url('admin/static-content/' . $content->id) : url('admin/static-content')}}" enctype="multipart/form-data">
        @csrf
        @if ($content->id)
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

        <div class="accordion" id="accordionExample">

            <!-- header -->
            @if(isset($content->data['header']))
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Header
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            @if(isset($content->data['header']['title']))
                                <div class="form-group">
                                    <label for="header_title">Header Title</label>
                                    <input type="text"
                                           class="form-control"
                                           id="header_title"
                                           name="header_title"
                                           placeholder="Title"
                                           value="{{$content->data['header']['title']}}"
                                    >
                                </div>
                            @endif

                            @if(isset($content->data['header']['text']))
                                <div class="form-group">
                                    <label for="header_text">Header Text</label>
                                    <input type="text"
                                           class="form-control"
                                           id="header_text"
                                           name="header_text"
                                           placeholder="Header Text"
                                           value="{{$content->data['header']['text']}}"
                                    >
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            @endif

            <!--Our story-->

            @if(isset($content->data['our_story']))
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Our Story
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            @if(isset($content->data['our_story']['title']))
                                <div class="form-group">
                                    <label for="our_story_title">Our Story Title</label>
                                    <input type="text" class="form-control"
                                           id="our_story_title" name="our_story_title" placeholder="Our Story Title"
                                           value="{{$content->data['our_story']['title']}}"
                                    >
                                </div>
                            @endif

                            @if(isset($content->data['our_story']['text']))
                                <div class="form-group">
                                    <label for="our_story_text">Our Story Text</label>
                                    <input type="text" class="form-control"
                                           id="our_story_text" name="our_story_text" placeholder="Our Story Text"
                                           value="{{$content->data['our_story']['text']}}"
                                    >
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            @endif

            <!--success_story-->
            @if(isset($content->data['success_story']))
                <div class="card" style="display: none">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Success Story
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            @foreach($content->data['success_story']['slides'] as $key => $slide)
                                @if(isset($slide['title']))
                                    <div class="form-group">
                                        <label for="success_story_title_{{$key}}">Title #{{$key + 1}}</label>
                                        <input type="text" class="form-control"
                                               id="success_story_title_{{$key}}"
                                               name="success_story_title_{{$key}}"
                                               placeholder="Success Story Title"
                                               value="{{$slide['title']}}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="success_story_text_{{$key}}">Text #{{$key + 1 }}</label>
                                        <input type="text" class="form-control"
                                               id="success_story_text_{{$key}}"
                                               name="success_story_text_{{$key}}"
                                               placeholder="Success Story Text"
                                               value="{{$slide['text']}}"
                                        >
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- news -->
            @if(isset($content->data['news']))
                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                News
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                        <div class="card-body">
                            @if(isset($content->data['news']['title']))
                                <div class="form-group">
                                    <label for="news_title">News Title</label>
                                    <input type="text" class="form-control"
                                           id="news_title"
                                           name="news_title" placeholder="News Title"
                                           value="{{$content->data['news']['title']}}"
                                    >
                                </div>
                            @endif

                            @if(isset($content->data['news']['text']))
                                <div class="form-group">
                                    <label for="news_text">News Text</label>
                                    <input type="text" class="form-control"
                                           id="news_text" name="news_text" placeholder="News Text"
                                           value="{{$content->data['news']['text']}}"
                                    >
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            @endif

            <!-- bottom -->
            @if(isset($content->data['bottom']))
                <div class="card">
                    <div class="card-header" id="headingFive">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Bottom
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                        <div class="card-body">
                            @if(isset($content->data['bottom']['title']))
                                <div class="form-group">
                                    <label for="bottom_title">Bottom Title</label>
                                    <input type="text" class="form-control"
                                           id="bottom_title" name="bottom_title" placeholder="Bottom Title"
                                           value="{{$content->data['bottom']['title']}}"
                                    >
                                </div>
                            @endif

                            @if(isset($content->data['bottom']['text']))
                                <div class="form-group">
                                    <label for="bottom_text">Bottom Text</label>
                                    <input type="text" class="form-control"
                                           id="bottom_text" name="bottom_text" placeholder="Bottom Text"
                                           value="{{$content->data['bottom']['text']}}"
                                    >
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            @endif
        </div>

        <div class="form-group">
            <label for="locale">Language</label>
            <select class="form-control" id="locale" name="locale">
                <option {{$content->locale == "EN" ? "selected" : ""}}>EN</option>
                <option {{$content->locale == "FR" ? "selected" : ""}}>FR</option>
                <option {{$content->locale == "RU" ? "selected" : ""}}>RU</option>
            </select>
        </div>
        {{--<div class="form-group">--}}
            {{--<label for="description">Content</label>--}}
            {{--<textarea class="form-control" id="content" name="content" rows="15">{{$content->title}}</textarea>--}}
        {{--</div>--}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection