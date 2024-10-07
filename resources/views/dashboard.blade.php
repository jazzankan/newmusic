<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="links p-6">
                    <p><a class="text-blue-800 text-xl" target="_blank" href="/search">Söksidan</a></p>
                     <p><a class="text-blue-800 text-xl" target="_blank" href="https://developer.spotify.com/dashboard/6eded995112346d8aa49254b94d31e5b">Ankanstuff - <span class="text-sm">App skapad hos Spotify</span></a></p>
                    <p><a class="text-blue-800 text-xl" target="_blank" href="https://developer.spotify.com/documentation/web-api">Dokumentation Spotifys Web API</a></p>
                </div>
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
