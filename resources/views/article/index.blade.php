@extends('layouts.app')

@section('content')
    <h1>List of Articles</h1>
    @foreach($articles as $article)
        <h3>{{$article->name}}</h3>
        {{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
        {{-- Используется для очень длинных текстов, которые нужно сократить --}}
        <p>{{Str::limit($article->body, 200)}}</p>
    @endforeach
    {{ $articles->links() }}
@endsection