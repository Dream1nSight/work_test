@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="/create">
            @csrf
            <textarea name="paste" style="width: 70%" rows="10"></textarea>
            <p>Public paste <input type="checkbox" name="public" id=""></p>
            <p>Expiries at <input type="datetime-local" name="expiries" id=""></p>
            <p>Paste name/title <input type="text" name="title"></p>
            <input type="submit" value="Create Paste">
        </form>
    </div>
@endsection
