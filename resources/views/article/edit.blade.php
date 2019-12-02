@extends('layouts.app')

@section('title', 'Update')

@section('content')
    {{ Form::model($article, ['url' => route('articles.update', $article), 'method' => 'PATCH']) }}
        @include('article.form')
        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection