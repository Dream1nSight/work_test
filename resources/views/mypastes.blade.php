@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>My Pastes</h2>
        <p class="border-top" style="width: 70%"></p>

        @foreach($pastes as $paste)
            <p><a href="/{{ $paste->link }}">{{ $paste->title }}</a></p>
        @endforeach

        <nav>
            <ul class="pagination">
                @php
                    $page_count = $pastes->lastPage();
                    $current_page = $pastes->currentPage();
                @endphp

                @if ($current_page == 1)
                    <li class="page-item disabled"><a href="" class="page-link">Prev</a></li>
                @else
                    <li class="page-item">
                        <a href="/my-pastes/{{ $current_page - 1 }}" class="page-link">Prev</a>
                    </li>
                @endif

                @for($i = 1; $i <= $page_count; $i++)
                    @if ($i == $current_page)
                        <li class="page-item active">
                            <a href="/my-pastes/{{ $i }}" class="page-link">{{ $i }}</a>
                        </li>
                        @continue
                    @endif
                    <li class="page-item"><a href="/my-pastes/{{ $i }}" class="page-link">{{ $i }}</a></li>
                @endfor

                @if ($current_page == $page_count)
                    <li class="page-item disabled">
                        <a href="" class="page-link">Next</a>
                    </li>
                @else
                    <li class="page-item">
                        <a href="/my-pastes/{{ $current_page + 1 }}" class="page-link">Next</a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endsection
