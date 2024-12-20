@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-sm rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Панель управления</h1>
            <div class="space-x-4">
                <a href="{{ route('posts.create') }}"
                   class="btn-primary">
                    <i class="fas fa-plus mr-2"></i>Создать публикацию
</a>
            </div>
        </div>

        <!-- Статистика -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-6 rounded-lg text-white">
                <h2 class="text-lg font-semibold mb-2">Мои публикации</h2>
                <p class="text-3xl font-bold">
                    {{ auth()->user()->posts()->count() }}
                </p>
            </div>

            <div class="bg-gradient-to-br from-green-500 to-green-600 p-6 rounded-lg text-white">
                <h2 class="text-lg font-semibold mb-2">Просмотры</h2>
                <p class="text-3xl font-bold">
                    {{ auth()->user()->posts()->sum('views') }}
                </p>
            </div>

            <div class="bg-gradient-to-br from-purple-500 to-purple-600 p-6 rounded-lg text-white">
                <h2 class="text-lg font-semibold mb-2">Черновики</h2>
                <p class="text-3xl font-bold">
                    {{ auth()->user()->posts()->where('status', 'draft')->count() }}
                </p>
            </div>
        </div>

        <!-- Последние публикации -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-4 border-b">
                <h2 class="text-xl font-semibold">Последние публикации</h2>
            </div>
            <div class="divide-y">
                @forelse(auth()->user()->posts()->latest()->take(5)->get() as $post)
                    <div class="p-4 flex items-center justify-between hover:bg-gray-50">
                        <div>
                            <h3 class="font-medium">{{ $post->title }}</h3>
                            <p class="text-sm text-gray-600">
                                Опубликовано: {{ $post->created_at->format('d.m.Y') }}
                                | Просмотры: {{ $post->views }}
                            </p>
                        </div>
                        <div class="flex space-x-3">
                            <a href="{{ route('posts.show', $post) }}"
                               class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('posts.edit', $post) }}"
                               class="text-green-600 hover:text-green-800">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="p-4 text-center text-gray-500">
                        У вас пока нет публикаций.
                        <a href="{{ route('posts.create') }}" class="text-blue-600 hover:text-blue-800">
                            Создать первую публикацию
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
