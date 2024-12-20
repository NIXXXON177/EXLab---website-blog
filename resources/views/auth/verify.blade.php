@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg">
        <div class="px-6 py-4 bg-gray-50 border-b rounded-t-lg">
            <h2 class="text-2xl font-bold text-gray-800">{{ __('Подтверждение email') }}</h2>
        </div>

        <div class="p-6">
            @if (session('resent'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ __('Новая ссылка для подтверждения была отправлена на ваш email.') }}
                </div>
            @endif

            <p class="mb-4">{{ __('Пожалуйста, проверьте свою электронную почту для подтверждения.') }}</p>
            
            <p class="mb-4">
                {{ __('Если вы не получили письмо') }},
                <form class="inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="text-blue-500 hover:text-blue-800 font-bold">
                        {{ __('нажмите здесь для повторной отправки') }}
                    </button>.
                </form>
            </p>
        </div>
    </div>
</div>
@endsection
