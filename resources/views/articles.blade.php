<!-- resources/views/articles.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Article Form -->
        <form action="{{ url('article') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Article Name -->
            <div class="form-group">
                <label for="article" class="col-sm-3 control-label">Website Name:</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="article-name" class="form-control">
                </div>
            </div>

        <!-- Article Url -->
        <div class="form-group">
            <label for="article" class="col-sm-3 control-label">URL:</label>

            <div class="col-sm-6">
                <input type="text" name="url" id="article-url" class="form-control">
            </div>
        </div>

            <!-- Add Article Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Add Website
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Current Articles -->
    @if (count($articles) > 0)
        <div class="container-fluid">
            <div class="row">
                    @foreach ($articles as $article)

                        <div class="col-sm-6 mb-2">
                            <div class="card w75" >
                                <div class="card-body">
                                    <h5 class="card-title">{{$article->name}}</h5>
                                    <a href="{{$article->url}}" target="_blank" class="btn btn-primary">Visit site</a>
                                    <form action="{{ url('article/'.$article->id) }}" method="POST" class="deleteForm">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{--<tr>--}}
                            {{--<!-- Task Name -->--}}
                            {{--<td class="table-text">--}}
                                {{--<div><a href="{{$article->name}}">{{ $article->name }}</a></div>--}}
                            {{--</td>--}}

                            {{--<td>--}}
                                {{--<form action="{{ url('article/'.$article->id) }}" method="POST">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--{{ method_field('DELETE') }}--}}

                                    {{--<button type="submit" class="btn btn-danger">--}}
                                        {{--<i class="fa fa-trash"></i> Delete--}}
                                    {{--</button>--}}
                                {{--</form>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    @endforeach
            </div>
        </div>
    @endif
@endsection