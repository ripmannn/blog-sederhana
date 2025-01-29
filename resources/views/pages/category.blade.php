@extends('welcome')

@section('content')
    <section class="max-w-[1240px] mx-auto gap-4 mt-5 pb-10">
        <div class="breadcrumbs text-sm px-4 md:px-0">
            <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>Category</li>
            <li><a href="">{{ $category->name }}</a></li>
            </ul>
        </div>
        <div class="py-8">
            <h1 class="text-4xl font-extrabold text-center text-neutral-content mb-8">
                Posts in <span class="text-primary">{{ $category->name }}</span> Category
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                @php
                        $bodyText = strip_tags($post->body);
                    @endphp
                    <div class="card bg-base-300 shadow-xl">
                        <figure>
                            <img src="{{ Storage::url($post->thumbnail) }}" alt="{{ $post->title }}"
                                class="object-cover h-48 w-full" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title text-3xl font-bold text-primary">
                                {{ $post->title }}
                            </h2>
                            <p class="card-text text-gray-300 py-2">{{ Str::limit($bodyText, 100, '...') }}</p>

                            <div class="card-actions justify-start">
                                <div class="card-actions justify-start italic text-sm text-gray-400">
                                    Published on
                                    {{ $post->created_at->diffForHumans() }}
                                </div>
                            </div>
                            <div class="justify-end py-2">

                                <a href="{{ route('show', $post->slug) }}" class="btn btn-warning">Read More</a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
