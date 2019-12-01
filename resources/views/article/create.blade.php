@extends('layouts.app')

@section('title', 'Create Article')

@section('content')
{{ Form::model($article, ['url' => route('articles.store')]) }}
    <div class="form-group">
        {{ Form::label('name', 'Title:') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
        @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="form-group">
        {{ Form::label('body', 'Сontent:') }}
        {{ Form::textarea('body', null, ['class' => 'form-control']) }}
        @if ($errors->has('body'))
            <span class="text-danger">{{ $errors->first('body') }}</span>
        @endif
    </div>
    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
{{ Form::close() }}
@endsection