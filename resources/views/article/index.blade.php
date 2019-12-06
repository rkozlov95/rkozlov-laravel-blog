@extends('layouts.app')

@section('title', 'Articles')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    @if (Session::has('update'))
        <div class="alert alert-success">
            {{Session::get('update')}}
        </div>
    @endif
    
    @if (Session::has('delete'))
        <div class="alert alert-danger">
            {{Session::get('delete')}}
        </div>
    @endif


    {{ Form::open(['url' => route('articles.index'), 'method' => 'GET']) }}
        <div class="input-group mb-3">
            {{ Form::text('field', $field, ['class' => 'form-control', 'placeholder' => 'Search']) }}
            <div class="input-group-append">
            {{ Form::submit('Search', ['class' => 'btn btn-primary']) }}
            </div>
        </div>
        @if ($articles->isEmpty())
            <span class="text-danger">No matches found</span>
        @endif
    {{ Form::close() }}
    @if ($articles->isNotEmpty()) 
    <h1>List of Articles</h1>
    @foreach($articles as $article)    
        <div class="card shadow mb-3">
        <div class="card-header">
            <a href="/articles/{{$article->id}}" class="text-decoration-none">
                {{$article->name}}
            </a>
        </div>
            <div class="card-body">
                <p class="card-text">{{Str::limit($article->body, 200)}}</p>
                @can ('delete', App\Article::class)
                    <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal">
                        Delete
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete article</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete the article "{{$article->name}}"?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a type="button" class="btn btn-primary" href="{{ route('articles.destroy', $article->id) }}" data-method="delete" rel="nofollow">
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
                @can('update', App\Article::class)
                    <h6><a class="btn btn-primary float-right" href="{{ route('articles.edit', $article->id) }}">Edit</a></h6>
                @endcan
            </div>
        </div>
    @endforeach
    @endif
    {{ $articles->links() }}
@endsection