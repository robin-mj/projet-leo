<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Campagnes') }}
        </h2>
    </x-slot>

    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{route('campaigns.store')}}">
                @csrf
                <x-text-input id="name" name="name"/>
                <x-primary-button>
                    {{ __('Créer une campagne') }}
                </x-primary-button>
            </form>

            @foreach($campaigns as $campaign)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-3">
                    <a href="{{route('campaigns.show', $campaign->id)}}">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            {{ $campaign->name }}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
