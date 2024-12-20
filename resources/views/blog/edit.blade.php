@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <h1 class="text-3xl font-bold mb-8 pb-4 border-b border-gray-100">
                Редактировать пост
            </h1>

            <form action="{{ route('blog.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div>
                        <label for="title" class="block text-gray-700 font-semibold mb-2">Заголовок</label>
                        <input type="text" name="title" id="title" 
                               value="{{ old('title', $post->title) }}"
                               class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                    </div>

                    <div>
                        <label for="content" class="block text-gray-700 font-semibold mb-2">Содержание</label>
                        <textarea name="content" id="content" rows="8" 
                                  class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">{{ old('content', $post->content) }}</textarea>
                    </div>

                    <div>
                        <label for="category_id" class="block text-gray-700 font-semibold mb-2">Категория</label>
                        <select name="category_id" id="category_id" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                        {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="featured_image" class="block text-gray-700 font-semibold mb-2">Изображение</label>
                        <div class="flex items-center space-x-4">
                            @if($post->featured_image)
                                <div class="relative group">
                                    <img src="{{ asset('storage/' . $post->featured_image) }}" 
                                         alt="Текущее изображение" 
                                         class="w-32 h-32 object-cover rounded-lg">
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg"></div>
                                </div>
                            @endif
                            <div class="flex-1">
                                <input type="file" name="featured_image" id="featured_image" 
                                       class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end space-x-4 pt-6 mt-8 border-t border-gray-100">
                        <a href="{{ route('blog') }}" 
                           class="px-6 py-3 rounded-lg border-2 border-gray-200 text-gray-600 font-semibold hover:bg-gray-50 transition-colors">
                            Отмена
                        </a>
                        <button type="submit" 
                                class="px-6 py-3 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 transition-colors">
                            Сохранить
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 