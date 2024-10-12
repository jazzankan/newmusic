<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Skapa artist') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="post" action="{{ route('artists.store') }}">
                <div>
                @csrf
                <label for="name">Namn:</label><br>
                <input type="text"
                       class="max-w-lg w-3/4 mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                       value="{{ old('name') }}" name="name"/>
                </div>
                <div>
                <label for="spotify_id">Spotify Artist-id:</label><br>
                <input type="text"
                       class="max-w-lg w-3/4 mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                       value="{{ old('spotify_id') }}" name="spotify_id"/>
                </div>
                <div>
                <label for="name">Kommentar:</label><br>
                <input type="text"
                       class="max-w-lg w-3/4 mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                       value="{{ old('comment') }}" name="comment"/>
                </div>
                <button type="submit" class="btn-blue">Skapa</button>
            </form>
        </div>
    </div>
</x-app-layout>
