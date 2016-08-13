<div class="popover popover-cart">
    <div class="arrow"></div>
    <h3 class="popover-title"></h3>
    <div class="popover-content"></div>
    <div class="popover-footer">
        @if($cart != null && count($cart->items) > 0)
            <button type="button" class="btn btn-primary btn-sm ">Checkout</button>
        @endif
        <a href="cart" class="btn btn-default btn-sm">View Cart</a>
    </div>
</div>
<div class="popover-cart-content">
    @if($cart != null)
        @foreach($cart->items as $item)
            {{ $item->name }}
        @endforeach
    @else
        <div class="empty-state">
            <p>Your cart is empty</p>
            <p><a href="{{ route('shop') }}">Visit the Token Shop</a></p>
        </div>
    @endif
</div>