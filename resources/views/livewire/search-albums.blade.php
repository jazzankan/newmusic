<div>
    <p wire:click.prevent="getalbums" class="mb-4"><a class="btn-blue" href="">Sök nya</a></p>
    @if($artAlbArray)
    @foreach($artAlbArray as $key => $value)
<b>{{ $key }}:</b><br>
        @foreach($value as $v)
            @if($v["release_date"] > 1950-01-01)
        {{ $v["name"] }}<br>
                @endif
            @endforeach
        <p>---</p>
    @endforeach
        @endif
</div>
