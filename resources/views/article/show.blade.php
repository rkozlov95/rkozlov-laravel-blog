@extends('layouts.app')

@section('content')
    <div class="shadow-sm p-3 mb-5 bg-white rounded">
        <h1>{{$article->name}}</h1>
        <div>{{$article->body}}</div>
    </div>
@endsection

