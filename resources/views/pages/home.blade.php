@extends('welcome')
@section('content')
    <section class="max-w-[1240px] mx-auto grid grid-cols-1 md:grid-cols-3 gap-4 mt-5 pb-10">

        <div class="md:col-span-2 space-y-5">
            
            <div class="grid grid-cols-1 md:grid-cols-2 w-full gap-4 mb-5">
                @foreach ($latest as $item)
                    @php
                        $bodyText = strip_tags($item->body);
                    @endphp
                    <div class="card bg-base-300 shadow-xl rounded-lg p-5">
                        <img class="card-img-top rounded-t-lg w-full h-52 object-contain bg-gray-200"
                            src="{{ Storage::url($item->thumbnail) }}" alt="{{ $item->title }}" />
                        <div class="card-body">

                            <a href="{{ route('show', $item->slug) }}"
                                class="card-title text-3xl text-primary font-bold hover:text-gray-100">{{ $item->title }}

                            </a>

                            <p class="card-text text-gray-300 py-2">{{ Str::limit($bodyText, 100, '...') }}</p>
                            <div class="text-sm text-gray-400 py-5">By <span
                                    class="font-semibold text-accent">{{ $item->author->name }}</span> on
                                {{ $item->created_at->diffForHumans() }}</div>
                            <a href="{{ route('show', $item->slug) }}"
                                class="btn glass bg-base-300 text-base-content hover:text-primary-content hover:bg-primary transition duration-300 ease-in-out">Read
                                more</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="md:col-span-1">
            <!-- Categories Card -->
            <div class="card bg-base-300 shadow-xl rounded-lg mb-5">
                <div class="card-body">
                    <h2 class="card-title text-2xl text-gray-300 font-bold mb-4">Categories</h2>
                    <ul class="flex flex-wrap space-x-2">
                        @foreach ($categories as $category)
                            <li class="mb-2">
                                <a href="{{ route('category.show', $category->slug) }}"
                                    class="badge badge-primary badge-outline hover:bg-blue-500 hover:text-white transition duration-300 ease-in-out">{{ $category->name }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>

            <!-- Advertisement Card 1 -->
            <div class="card bg-base-300 shadow-xl rounded-lg  mb-5">
                <div class="card-body">
                    <h2 class="card-title text-2xl font-bold mb-4 text-gray-300">Advertisements</h2>
                    <div class="ad-placeholder bg-gray-200 h-64 flex items-center justify-center">
                        <span class="text-gray-500">Ad Space 1</span>
                    </div>
                </div>
            </div>

            <!-- Advertisement Card 2 -->
            <div class="card bg-base-300 shadow-xl rounded-lg mb-5">
                <div class="card-body">
                    <h2 class="card-title text-2xl font-bold mb-4 text-gray-300">Advertisements</h2>
                    <div class="ad-placeholder bg-gray-200 h-64 flex items-center justify-center">
                        <span class="text-gray-500">Ad Space 2</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-5 col-span-full">
            {{ $latest->links('pagination::tailwind') }}
        </div>
    </section>
@endsection
