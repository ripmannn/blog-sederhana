@extends('welcome')
@section('content')
    <section class="max-w-[1240px] mx-auto grid grid-cols-1 md:grid-cols-3 gap-4 mt-5 pb-10">
        <div class="breadcrumbs text-sm md:col-span-2 p-4 md:p-0">
            <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="">{{ $post->slug }}</a></li>
            </ul>
        </div>

        <!-- Konten Utama -->
        <div class="md:col-span-2">
            <div class="card bg-base-300 shadow-xl rounded-lg p-5 mb-5">
                @if ($post->thumbnail)
                    <div class="mb-5">
                        <img src="{{ Storage::url($post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-auto">
                        <p class="text-sm text-center text-gray-500 mt-2">Gambar {{ $post->title }}</p>
                    </div>
                @endif
                <h3 class="text-4xl font-bold text-primary mb-5">{{ $post->title }}</h3>
                <div class="text-sm text-gray-400 py-5 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200 mr-1" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                    <span class="font-semibold text-secondary mr-1">{{ $post->author->name }}</span> on
                    <span class="font-semibold text-secondary ml-1 ">{{ $post->created_at->diffForHumans() }}</span>
                </div>
                <div class="text-base">
                    <!-- Menambahkan class overflow-auto untuk membuat teks kode dapat di-scroll -->
                    <div class="prose overflow-auto">
                        {!! $post->body !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Iklan -->
        <div class="md:col-span-1">
            <div class="card bg-base-300 shadow-xl rounded-lg mb-5">
                <div class="card-body">
                    <h2 class="card-title text-2xl font-bold text-center mb-4">Advertisements</h2>
                    <div class="ad-placeholder bg-gray-200 h-64 flex items-center justify-center mb-5">
                        <span class="text-gray-500">Ad Space 1</span>
                    </div>
                    <div class="ad-placeholder bg-gray-200 h-64 flex items-center justify-center mb-5">
                        <span class="text-gray-500">Ad Space 2</span>
                    </div>
                    <div class="ad-placeholder bg-gray-200 h-64 flex items-center justify-center">
                        <span class="text-gray-500">Ad Space 3</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
