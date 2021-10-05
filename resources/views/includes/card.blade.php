<ul>
    @foreach ($items as $item)
    <li class="card">
        <img src="{{ $item['thumb'] }}" alt="">
        <h4>{{ $item['series'] }}</h4>
    </li>
    @endforeach
</ul>