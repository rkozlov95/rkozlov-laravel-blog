@extends('layouts.app')

@section('title', 'Article')

@section('content')
    <div class="card shadow-sm p-3 mb-5 ck-content rounded">
        <div class="card-body">
            <h1>{{$article->name}}</h1>
            <div>{!! $article->body !!}</div>
        </div>
    </div>
@endsection