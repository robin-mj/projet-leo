<x-guest-layout>
    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    {{--    TODO: Faire le form --}}
    <form method="POST" action="{{route('form.store')}}">
        @csrf
        <x-text-input id="token" name="token" type="hidden" :value="$token"/>
        <x-primary-button>
            {{ __('Envoyer le formulaire') }}
        </x-primary-button>
    </form>
</x-guest-layout>
