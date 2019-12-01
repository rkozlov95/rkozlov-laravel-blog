@extends('layouts.app')

@section('title', 'Articles')

@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
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
		<div class="shadow p-3 mb-3 bg-ligth rounded">
        	<a href="/articles/{{$article->id}}" class="text-decoration-none"><h3>{{$article->name}}</h3></a>
        	{{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
        	{{-- Используется для очень длинных текстов, которые нужно сократить --}}
        	<p>{{Str::limit($article->body, 200)}}</p>
        </div>
    @endforeach
    @endif
    {{ $articles->links() }}
@endsection