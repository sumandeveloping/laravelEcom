<header>
    <div class="top-nav container">
    <div class="logo"><a href="{{route('landing-page')}}">LaravelEcom</a></div>
        @if (! request()->is('checkout'))
        <ul>
            <li><a href="{{route('shop.index')}}">Shop</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Cart <span class="cart-count"><span>3</span></span></a></li>
        </ul>
        @endif
    </div> <!-- end top-nav -->
</header>