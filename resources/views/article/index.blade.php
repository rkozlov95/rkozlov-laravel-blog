@extends('layouts.app')

@section('content')
    <h1>List of Articles</h1>
    @foreach($articles as $article)
		<div class="shadow p-3 mb-3 bg-ligth rounded">
        	<a href="/articles/{{$article->id}}" class="text-decoration-none"><h3>{{$article->name}}</h3></a>
        	{{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
        	{{-- Используется для очень длинных текстов, которые нужно сократить --}}
        	<p>{{Str::limit($article->body, 200)}}</p>
        </div>
    @endforeach
    {{ $articles->links() }}
@endsection