@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Создать новую публикацию</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="max-w-2xl">
        @csrf
        
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Заголовок</label>
            <input type="text" name="title" id="title" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="category_id" class="block text-gray-700 font-bold mb-2">Категория</label>
            <select name="category_id" id="category_id" class="w-full border rounded px-3 py-2" required>
                <option value="">Выберите категорию</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="content" class="block text-gray-700 font-bold mb-2">Содержание</label>
            <textarea name="content" id="content" rows="6" class="w-full border rounded px-3 py-2" required></textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-bold mb-2">Изображение</label>
            <input type="file" name="image" id="image" class="w-full">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Создать публикацию
        </button>
    </form>
</div>
@endsection
