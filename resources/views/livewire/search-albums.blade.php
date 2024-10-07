<div>
    <p wire:click.prevent="getalbums" class="mb-4"><a class="btn-blue" href="">Sök nya</a></p>
    @if($response)
    <p>{{ $response["items"][17]["name"] }}</p>
        @endif
</div>
