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
                @can('update', App\Article::class)
                    <h6><a class="card-link float-right" href="{{ route('articles.edit', $article->id) }}">Edit</a></h6>
                @endcan
            </div>
        </div>
    @endforeach
    @endif
    {{ $articles->links() }}
@endsection