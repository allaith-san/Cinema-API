<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generate Access Token') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('token.generate') }}" method="POST">
                        @csrf
                        <x-input-label for="token" :value="__('Token')" />
                        <x-text-input id="token" class="block mt-1 w-full" type="text" name="token" required autofocus value="{{ !empty($accessToken) ? $accessToken : 'XXXX-XXXX-XXXX-XXXX' }}" readonly />
                        <br>
                        @if(!empty($accessToken))
                        <p>Make sure to copy this and save it somewhere safe, the value will be hidden after refreshing</p>
                        <br>
                        @endif
                        <x-primary-button>{{ __('Generate New Access Token') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
