<div class="right-nav">
    <div class="right"><a class="cart" href="/cart">
            <div class="product-num blue-text">9</div><i class="icon-cart"></i></a><a class="login" href="/login"><i class="icon-login"></i></a></div>
    <ul class="tab">
        <?php $index = 1; ?>
        @foreach($categories as $category)
            <li class="{{ $index == 1 ? 'active' : '' }}" data-content-id="{{ $index }}"><a href="#">{{ $category  }}</a></li>
            <?php $index++; ?>
        @endforeach
    </ul>
    @include('front/parts/footer')
</div>
