@extends('layout')

@section('title', 'Shopping Cart')

@section('extra-css')

@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <a href="#">Home</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Shopping Cart</span>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="cart-section container">
        <div>
            {{-- NOTE - success & error mesage --}}
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{session()->get('success_message')}}
                </div> 
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Cart::count() > 0)
                <h2>{{Cart::count()}} item(s) in Shopping Cart</h2>

                <div class="cart-table">

                    @foreach (Cart::content() as $item)
                        <div class="cart-table-row">
                            <div class="cart-table-row-left">
                                <a href="{{route('shop.show',$item->model->slug)}}"><img src="/img/macbook-pro.png" alt="item" class="cart-table-img"></a>
                                <div class="cart-item-details">
                                    <div class="cart-table-item"><a href="{{route('shop.show',$item->model->slug)}}">{{$item->name}}</a></div>
                                    <div class="cart-table-description">{{$item->model->details}}</div>
                                </div>
                            </div>
                            <div class="cart-table-row-right">
                                <div class="cart-table-actions">
                                    {{-- <a href="#">Remove</a>  --}}
                                    <form action="{{route('cart.destroy',$item->rowId)}}" method="post">
                                        @method('DELETE')
                                        <button type="submit" class="cart-options">Remove</button>
                                        @csrf
                                    </form>
                                    
                                    {{-- <a href="">Save for Later</a> --}}
                                    <form action="{{route('cart.switchToSaveForLater',$item->rowId)}}" method="post">
                                        <button type="submit" class="cart-options">Save for Later</button>
                                        @csrf
                                    </form>
                                </div>
                                <div>
                                    <select class="quantity">
                                        <option selected="">1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div>{{$item->model->presentPrice()}}</div>
                            </div>
                        </div> <!-- end cart-table-row -->
                    @endforeach

                </div> <!-- end cart-table -->

                <a href="#" class="have-code">Have a Code?</a>

                <div class="have-code-container">
                    <form action="#">
                        <input type="text">
                        <button type="submit" class="button button-plain">Apply</button>
                    </form>
                </div> <!-- end have-code-container -->

                <div class="cart-totals">
                    <div class="cart-totals-left">
                        Shipping is free because we’re awesome like that. Also because that’s additional stuff I don’t feel like figuring out :).
                    </div>

                    <div class="cart-totals-right">
                        <div>
                            Subtotal <br>
                            Tax (18%) <br>
                            <span class="cart-totals-total">Total</span>
                        </div>
                        <div class="cart-totals-subtotal">
                            {{ presentPrice(Cart::subtotal()) }} <br>
                            {{ presentPrice(Cart::tax()) }} <br>
                            <span class="cart-totals-total">{{ presentPrice(Cart::total()) }}</span>
                        </div>
                    </div>
                </div> <!-- end cart-totals -->

                <div class="cart-buttons">
                    <a href="{{ route('shop.index') }}" class="button">Continue Shopping</a>
                    <a href="{{ route('checkout.index') }}" class="button-primary">Proceed to Checkout</a>
                </div>

            @else

                <h2>No items in your cart</h2>
                <a href="{{ route('shop.index') }}" class="button">Continue Shopping</a>
                <div class="spacer"></div>
                
            @endif

            @if (Cart::instance('saveForLater')->count() > 0)

                <h2>{{Cart::instance('saveForLater')->count()}} items Saved For Later</h2>

                <div class="saved-for-later cart-table">

                    @foreach (Cart::instance('saveForLater')->content() as $saveItem)
                        <div class="cart-table-row">
                            <div class="cart-table-row-left">
                                <a href="{{route('shop.show',$saveItem->model->slug)}}"><img src="/img/macbook-pro.png" alt="item" class="cart-table-img"></a>
                                <div class="cart-item-details">
                                    <div class="cart-table-item"><a href="{{route('shop.show',$saveItem->model->slug)}}">{{ $saveItem->model->name }}</a></div>
                                    <div class="cart-table-description">{{ $saveItem->model->details }}</div>
                                </div>
                            </div>
                            <div class="cart-table-row-right">
                                <div class="cart-table-actions">
                                    {{-- <a href="#">Remove</a> <br> --}}

                                    <form action="{{route('saveForLater.destroy',$saveItem->rowId)}}" method="post">
                                        @method('DELETE')
                                        <button type="submit" class="cart-options">Remove</button>
                                        @csrf
                                    </form>

                                    {{-- <a href="#">Move to Cart</a> --}}

                                    <form action="{{ route('saveForLater.switchToCart', $saveItem->rowId) }}" method="post">
                                        <button type="submit" class="cart-options">Move to Cart</button>
                                        @csrf
                                    </form>
                                </div>
                                {{-- <div>
                                    <select class="quantity">
                                        <option selected="">1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div> --}}
                                <div>{{ presentPrice($saveItem->model->price) }}</div>
                            </div>
                        </div> <!-- end cart-table-row -->
                    @endforeach

                </div> <!-- end saved-for-later -->

            @else

                <h2>No items to save for later</h2>
                
            @endif

        </div>

    </div> <!-- end cart-section -->

    @include('partials.might-like')


@endsection
