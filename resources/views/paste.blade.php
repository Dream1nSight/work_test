@extends('layouts.app')

@section('content')
    <div class="container">
        <p>{{$paste[0]->content}}</p>
    </div>
@endsection
