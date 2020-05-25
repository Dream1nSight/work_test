@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="/create">
            @csrf
            <textarea name="paste" id="" cols="50" rows="10"></textarea>
            <p>Public paste <input type="checkbox" name="public" id=""></p>
            <p>Expiries at <input type="datetime-local" name="expiries" id=""></p>
            <input type="submit" value="Create Paste">
        </form>
    </div>
@endsection
