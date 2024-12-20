@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-8 text-gray-800">Последние записи</h1>

        <div class="grid gap-8">
            @foreach($posts as $post)
                <article class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <h2 class="text-2xl font-semibold mb-4 text-gray-800">{{ $post->title }}</h2>

                    @if($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}"
                             alt="{{ $post->title }}"
                             class="w-full h-64 object-cover rounded-lg mb-4">
                    @endif

                    <p class="text-gray-600 mb-4">{{ Str::limit($post->content, 200) }}</p>
                    <a href="{{ route('posts.show', $post) }}"
                       class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                        Читать далее
                    </a>
                </article>
            @endforeach
        </div>
    </div>
@endsection
