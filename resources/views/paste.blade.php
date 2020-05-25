@extends('layouts.app')

@section('content')
    <div class="container">
        <p>{{is_null($paste->title) ? 'Untitled' : $paste->title}}</p>
        <p></p>
        <p>{{$paste->content}}</p>
    </div>
@endsection
