@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg">
        <div class="px-6 py-4 bg-gray-50 border-b rounded-t-lg">
            <h2 class="text-2xl font-bold text-gray-800">{{ __('Подтверждение пароля') }}</h2>
        </div>

        <div class="p-6">
            <p class="mb-4">{{ __('Пожалуйста, подтвердите ваш пароль перед продолжением.') }}</p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Пароль') }}</label>
                    <input id="password" type="password"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror"
                           name="password" required autocomplete="current-password">
                    @error('password')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        {{ __('Подтвердить пароль') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('password.request') }}">
                            {{ __('Забыли пароль?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
