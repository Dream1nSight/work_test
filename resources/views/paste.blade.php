@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.0.3/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.0.3/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>

    <style>
        .hljs-keyword {
            color: rgb(4, 64, 255); /* Looks better */
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <p>{{is_null($paste->title) ? 'Untitled' : $paste->title}}</p>
        <p></p>
{{--        <p>{{$paste->content}}</p>--}}
        <pre><code class=
                   @if(is_null($paste->syntax))
                       "plaintext"
                   @else
                       "{{ $paste->syntax }}"
                    @endif
                >{{ $paste->content }}</code></pre>
    </div>
@endsection
