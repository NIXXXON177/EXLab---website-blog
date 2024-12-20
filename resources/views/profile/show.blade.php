@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-start space-x-6">
                <div class="flex-shrink-0">
                    <div class="relative">
                        <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/default-avatar.png') }}" 
                             alt="Аватар пользователя" 
                             class="w-32 h-32 rounded-full object-cover">
                        <button onclick="document.getElementById('avatar-input').click()" 
                                class="absolute bottom-0 right-0 bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600">
                            <i class="fas fa-camera"></i>
                        </button>
                        <form id="avatar-form" action="{{ route('profile.update.avatar') }}" method="POST" enctype="multipart/form-data" class="hidden">
                            @csrf
                            @method('PATCH')
                            <input type="file" id="avatar-input" name="avatar" accept="image/*" onchange="this.form.submit()">
                        </form>
                    </div>
                </div>

                <div class="flex-grow">
                    <div class="flex justify-between items-start">
                        <div>
                            <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
                            <p class="text-gray-600">{{ $user->email }}</p>
                            <p class="text-sm text-gray-500 mt-1">
                                Дата регистрации: {{ $user->created_at->format('d.m.Y') }}
                            </p>
                        </div>
                        <a href="{{ route('profile.edit') }}" 
                           class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition-colors">
                            <i class="fas fa-edit mr-2"></i>Редактировать профиль
                        </a>
                    </div>

                    <div class="mt-8">
                        <h2 class="text-xl font-semibold mb-4">Мои посты</h2>
                        @if($user->posts->isEmpty())
                            <p class="text-gray-600">Пока нет постов</p>
                        @else
                            <div class="grid md:grid-cols-2 gap-6">
                                @foreach($user->posts as $post)
                                    <article class="bg-gray-50 rounded-lg p-4">
                                        <h3 class="font-semibold mb-2">
                                            <a href="{{ route('blog.detail', $post->slug) }}" 
                                               class="text-gray-900 hover:text-blue-600">
                                                {{ $post->title }}
                                            </a>
                                        </h3>
                                        <div class="text-sm text-gray-500">
                                            {{ $post->created_at->format('d.m.Y') }}
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection