@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <article class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg overflow-hidden">
        @if($post->featured_image)
            <div class="relative h-[400px]">
                <img src="{{ asset('storage/' . $post->featured_image) }}" 
                     alt="{{ $post->title }}"
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                <h1 class="absolute bottom-6 left-8 right-8 text-4xl font-bold text-white">
                    {{ $post->title }}
                </h1>
            </div>
        @else
            <h1 class="text-4xl font-bold p-8">{{ $post->title }}</h1>
        @endif
        
        <div class="p-8">
            <div class="flex items-center space-x-6 text-gray-600 mb-8 border-b border-gray-100 pb-6">
                <span class="flex items-center">
                    <i class="far fa-calendar text-blue-500 mr-2"></i>
                    {{ $post->created_at->format('d.m.Y') }}
                </span>
                <span class="flex items-center">
                    <i class="far fa-user text-blue-500 mr-2"></i>
                    {{ $post->user->name }}
                </span>
                @if($post->category)
                    <span class="flex items-center">
                        <i class="far fa-folder text-blue-500 mr-2"></i>
                        {{ $post->category->name }}
                    </span>
                @endif
            </div>

            <div class="prose prose-lg max-w-none">
                {!! $post->content !!}
            </div>

            <div class="mt-12 pt-6 border-t border-gray-100">
                <a href="{{ route('blog') }}" 
                   class="inline-flex items-center text-blue-600 hover:text-blue-800 font-semibold group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                    </svg>
                    Вернуться к списку публикаций
                </a>
            </div>
        </div>
    </article>
</div>
@endsection 