@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 text-center mt-10">
    <h1 class="text-3xl font-bold mb-6">Добро пожаловать в блог</h1>
    <div class="text-lg">
        <p>Здесь вы найдете интересные статьи на различные темы.</p>
        <a href="{{ route('blog') }}" class="text-blue-500 hover:text-blue-700">Перейти к статьям</a>
    </div>
</div>
@endsection