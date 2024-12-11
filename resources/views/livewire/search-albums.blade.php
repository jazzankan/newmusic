<div>
    <p class="mb-4">Nya album sedan {{ $last_time }}:</p>
    @if(count($artAlbArray) > 0)
    @foreach($artAlbArray as $key => $value)
        <b>{{ $key }}:</b><br>
        @foreach($value as $v)
                {{ $v["name"] }}<br>
        @endforeach
        <p>---</p>
    @endforeach
    @else
        <p>Inget nytt!</p>
        @endif

</div>
