@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <article class="max-w-4xl mx-auto">
        <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>
        
        @if($post->featured_image)
            <img src="{{ asset('storage/' . $post->featured_image) }}" 
                 alt="{{ $post->title }}" 
                 class="w-full h-auto mb-6 rounded-lg">
        @endif

        <div class="prose max-w-none">
            {!! $post->content !!}
        </div>

        <div class="mt-8 pt-4 border-t">
            <a href="{{ route('posts.index') }}" 
               class="text-blue-600 hover:text-blue-800">
                ← Вернуться к списку публикаций
            </a>
        </div>
    </article>
</div>
@endsection