@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            <!-- Заголовок секции -->
            <div class="text-center mb-16">
                <h1 class="text-5xl font-extrabold text-gray-900 mb-4">Наш Блог</h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Последние публикации и новости из мира технологий</p>
            </div>
            
            <!-- Сетка постов -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-12">
                @foreach($posts as $post)
                    <article class="bg-white rounded-2xl shadow-md overflow-hidden group hover:shadow-xl transition-all duration-300">
                        @if($post->featured_image)
                            <div class="relative overflow-hidden aspect-w-16 aspect-h-9">
                                <img src="{{ asset('storage/' . $post->featured_image) }}" 
                                     alt="{{ $post->title }}"
                                     class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300">
                                @if($post->category)
                                    <div class="absolute top-4 left-4">
                                        <span class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-full">
                                            {{ $post->category->name }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <!-- Мета-информация -->
                            <div class="flex items-center space-x-4 text-sm text-gray-500 mb-4">
                                <span class="flex items-center">
                                    <i class="far fa-calendar text-blue-500 mr-2"></i>
                                    {{ $post->created_at->format('d.m.Y') }}
                                </span>
                                <span class="flex items-center">
                                    <i class="far fa-user text-blue-500 mr-2"></i>
                                    {{ $post->user->name }}
                                </span>
                            </div>

                            <!-- Заголовок -->
                            <h2 class="text-2xl font-bold mb-4 line-clamp-2 group-hover:text-blue-600 transition-colors">
                                <a href="{{ route('blog.show', $post) }}">
                                    {{ $post->title }}
                                </a>
                            </h2>
                            
                            <!-- Превью текста -->
                            <p class="text-gray-600 mb-6 line-clamp-3">
                                {{ Str::limit(strip_tags($post->content), 150) }}
                            </p>
                            
                            <!-- Кнопка "Читать далее" -->
                            <a href="{{ route('blog.show', $post) }}" 
                               class="inline-flex items-center text-blue-600 hover:text-blue-800 font-semibold group/link">
                                <span class="mr-2">Читать далее</span>
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                     class="h-5 w-5 transform group-hover/link:translate-x-1 transition-transform" 
                                     fill="none" 
                                     viewBox="0 0 24 24" 
                                     stroke="currentColor">
                                    <path stroke-linecap="round" 
                                          stroke-linejoin="round" 
                                          stroke-width="2" 
                                          d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
            
            <!-- Пагинация -->
            <div class="mt-16">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
