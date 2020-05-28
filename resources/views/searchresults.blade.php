@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Search results</h2>
        <p class="border-top" style="width: 70%"></p>

        @foreach($pastes as $paste)
            <p><a href="/{{ $paste->link }}">{{ $paste->title ? $paste->title : 'Untitled' }}</a></p>
        @endforeach

    </div>
@endsection
