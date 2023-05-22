<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Détail campagne') }}
        </h2>
    </x-slot>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <b>Titre: </b>{{ $campaign->name }}
                    @foreach($campaign->testers as $tester)
                            <div class="text-gray-900 dark:text-gray-100">
                                <b>Testeur: </b>{{ $tester->name }} {{ $tester->surname }}
                                @if($tester->score) <b>Score:</b> {{ $tester->score }} @endif
                            </div>
                    @endforeach
                </div>
            </div>
            <form method="POST" action="{{route('testers.store')}}">
                @csrf
                <x-text-input id="campaign_id" name="campaign_id" type="hidden" :value="$campaign->id"/>
                <x-text-input id="name" name="name" placeholder="Prénom"/>
                <x-text-input id="surname" name="surname" placeholder="Nom"/>
                <x-primary-button>
                    {{ __('Créer un testeur') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
