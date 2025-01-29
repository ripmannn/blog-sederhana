@extends('welcome')

@section('content')
<h1>Search Results</h1>

    <!-- Form Pencarian -->
    <form method="GET" action="{{ route('search') }}">
        <label class="input input-bordered flex items-center gap-2">
            <input type="text" name="query" class="grow" placeholder="Search" value="{{ request('query') }}" />
            <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
                    <path fill-rule="evenodd"
                        d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </label>
    </form>

    <h2>Results for "{{ $query }}"</h2>

    @if($posts->isEmpty())
        <p>No results found for "{{ $query }}".</p>
    @else
        <ul>
            @foreach($posts as $post)
                <li>
                    <strong>{{ $post->title }}</strong><br>
                    <p>{{ $post->content }}</p>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
