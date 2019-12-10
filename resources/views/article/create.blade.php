@extends('layouts.app')

@section('title', 'Create')

@section('content')
{{ Form::model($article, ['url' => route('articles.store')]) }}
    @include('article.form')
    {{ Form::submit('Create', ['class' => 'btn btn-outline-secondary']) }}
{{ Form::close() }}
@endsection