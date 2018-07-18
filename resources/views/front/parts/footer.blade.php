<div class="footer">
    <ul>
        @foreach($social as $key => $item)
        <li><a href="{{ $item->link }}">{{ $item->name }}</a></li>
        @endforeach
    </ul>
</div>
