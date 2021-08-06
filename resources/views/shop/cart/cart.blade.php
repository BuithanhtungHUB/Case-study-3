@extends('shop.master')
@section('content')
<!-- catg header banner section -->
<section id="aa-catg-head-banner">
    <img src="https://cdn2.jomashop.com/media/wysiwyg/banner_main_SUMMER_2021_2.jpg?fbclid=IwAR0C_w8H2BUrDVZmbaYMMqAKhCLE70Jpm3qOSQcpcaW2PptPo-bYCAxmEzM" style="width: 100%; height: 300px" alt="fashion img">
    <div class="aa-catg-head-banner-area">
    </div>
</section>
<!-- / catg header banner section -->

<!-- Cart view section -->
<section id="cart-view">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cart-view-area">
                    <div class="cart-view-table">
                        <form action="">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($carts as $cart)
                                    <tr id="delete-{{$cart['id']}}">
                                        <td><a class="remove" delete="{{$cart['id']}}"><fa class="fa fa-close"></fa></a></td>
                                        <td><img src="{{asset('storage/'.$cart['image'])}}" alt="img"></td>
                                        <td><a class="aa-cart-title">{{$cart['name']}}</a></td>
                                        <td>{{$cart['price']}}&nbsp;$</td>
                                        <td><input class="aa-cart-quantity quantity" input="{{$cart['id']}}" id="{{$cart['id']}}" type="number" value="{{$cart['quantity']}}"></td>
                                        <td id="total-{{$cart['id']}}">{{$cart['price']*$cart['quantity']}}&nbsp;$</td>
                                    </tr>
                                    @empty
                                    <tr><td colspan="6"></td></tr>
                                    @endforelse
                                    <tr>
                                        <td>total bill amount</td>
                                        <td colspan="5" id="totalCart">{{$totalCart}}&nbsp;$</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="cart-view-total">
                                <a href="#" class="aa-cart-view-btn">Payment</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Cart view section -->
@endsection
