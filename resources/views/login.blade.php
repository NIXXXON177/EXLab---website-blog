@extends('layouts.app')

@section('title', 'Авторизация')

@section('content')
<div class="min-h-screen bg-gradient-to-r from-green-300 to-blue-300 flex flex-col items-center justify-center">
    <div class="text-[70px] font-bold mb-8 mt-[50px]">
        <h1><span class="text-white border-[5px] border-black">EX</span>Lab</h1>
    </div>
    
    <div class="bg-white p-[25px] rounded-lg shadow-md w-[700px] h-[500px] border-[3px] border-[#868686]">
        <h2 class="text-Inner font-black text-center mb-[16px] text-[50px]">Вход</h2>
        
        <form method="POST" action="{{ route('login') }}" class="px-[70px] flex flex-col gap-[15px]">
            @csrf
            <div>
                <label for="email" class="text-[20px] block text-sm font-medium text-black opacity-50 ml-[10px]">Email</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 rounded-md bg-[#D9D9D9] border-[#B1B1B1] border-[2px] focus:outline-none focus:ring-2 focus:border-[#7c7c7c]">
            </div>
            
            <div>
                <label for="password" class="text-[20px] block text-sm font-medium text-black opacity-50 ml-[10px]">Пароль</label>
                <input type="password" name="password" id="password" class="w-full px-4 py-2 rounded-md bg-[#D9D9D9] border-[#B1B1B1] border-[2px] focus:outline-none focus:ring-2 focus:border-[#7c7c7c]">
            </div>
            
            <div class="flex items-center mt-2">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-[16px] text-black opacity-50">Запомнить меня</label>
            </div>
            
            <button type="submit" class="mt-[40px] w-full bg-[#879CEB] hover:bg-blue-500 text-white font-semibold py-2 px-4 rounded-md transition duration-200">
                Войти
            </button>
            
            <div class="text-center mt-4">
                <a href="#" class="text-[#879CEB] hover:text-blue-500">Забыли пароль?</a>
                <p class="mt-4 text-black opacity-50">
                    Нет аккаунта? 
                    <a href="{{ route('register') }}" class="text-[#879CEB] hover:text-blue-500">Зарегистрируйтесь</a>
                </p>
            </div>
        </form>
        // Добавить после формы:
@if ($errors->any())
    <div class="mt-4">
        @foreach ($errors->all() as $error)
            <p class="text-red-500">{{ $error }}</p>
        @endforeach
    </div>
@endif
    </div>
</div>