@extends('layouts.app')

@section('content')
    <div class="container">
        <p>{{is_null($paste[0]->title) ? 'Untitled' : $paste[0]->title}}</p>
        <p></p>
        <p>{{$paste[0]->content}}</p>
    </div>
@endsection
