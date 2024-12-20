<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Artister hos Spotify') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4">
                    @foreach ($artists as $artist)
                        <p class="leading-loose">{{ $artist->name }} <a href="/artists/{{ $artist->id }}/edit/"><img class="display: inline-block" alt="Soptunna" src="https://webbsallad.se/jazzfiler/soptunna-16.png"></a></p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
