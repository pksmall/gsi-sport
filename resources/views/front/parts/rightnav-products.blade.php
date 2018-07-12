<div class="right-nav">
    <div class="right"><a class="cart" href="/cart">
            <div class="product-num blue-text">9</div><i class="icon-cart"></i></a><a class="login" href="/login"><i class="icon-login"></i></a></div>
    <ul class="tab">
        {{-- dd($sumitems) --}}
        <?php $index = 0; ?>
        @foreach ($parent_categories as $p_category)
            <li class="tab-li {{ $index == 0 ? 'active' : '' }}">
            <a href="#" class="blue">{{ $p_category->locales[0]->name }}
                {{  $p_category->id }}
                {{ isset($sumitems[$p_category->id]) ? $sumitems[$p_category->id] : 0 }}</a></li>
            <?php $index++; ?>
            <ul class="sub-tab">
            @foreach($additional_menu as $a_menu)
                @if($a_menu->parent_id == $p_category->id)
                    @if(isset($sumitems[$a_menu->id]))
                        <li><a href="#">{{ $a_menu->locales[0]->name }}
                                {{ $a_menu->id }}
                            ({{ isset($sumitems[$a_menu->id]) ? $sumitems[$a_menu->id] : 0 }})</a></li>
                    @endif
                @endif
            @endforeach
            </ul>
        @endforeach
    </ul>
    @include('front/parts/footer')
</div>