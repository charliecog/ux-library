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
                <label for="article" class="col-sm-3 control-label">Article</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="article-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Article
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Current Articles -->
    @if (count($articles) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Articles
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>Article</th>
                    <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div><a href="{{$article->name}}">{{ $article->name }}</a></div>
                            </td>

                            <td>
                                <form action="{{ url('article/'.$article->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection