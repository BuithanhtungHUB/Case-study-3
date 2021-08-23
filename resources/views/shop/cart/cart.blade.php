@extends('shop.master')
@section('title','Shop Cart')
@section('content')
    <!-- catg header banner section -->
    <section id="aa-catg-head-banner">
        <img
            src="https://cdn2.jomashop.com/media/wysiwyg/banner_main_SUMMER_2021_2.jpg?fbclid=IwAR0C_w8H2BUrDVZmbaYMMqAKhCLE70Jpm3qOSQcpcaW2PptPo-bYCAxmEzM"
            style="width: 100%; height: 300px" alt="fashion img">
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
                                            <td><a class="remove" delete="{{$cart['id']}}">
                                                    <fa class="fa fa-close"></fa>
                                                </a></td>
                                            <td><img src="{{asset('storage/'.$cart['image'])}}" alt="img"></td>
                                            <td><a class="aa-cart-title">{{$cart['name']}}</a></td>
                                            <td>{{$cart['price']}}&nbsp;$</td>
                                            <td><input class="aa-cart-quantity quantity" input="{{$cart['id']}}"
                                                       id="{{$cart['id']}}" type="number"
                                                       value="{{$cart['quantity']}}"></td>
                                            <td id="total-{{$cart['id']}}">{{$cart['price']*$cart['quantity']}}
                                                &nbsp;$
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6"></td>
                                        </tr>
                                    @endforelse
                                    <tr>
                                        <td><b>Total Payment</b></td>
                                        <td colspan="5" id="totalCart">{{$totalCart}}&nbsp;$</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="cart-view-total">
                                <a href="{{route('create.payment')}}" class="aa-cart-view-btn"
                                   data-target="#payment">Payment</a>
                                <!-- Button trigger modal -->
                                <!-- Modal -->
                                <div class="modal fade" id="payment" data-bs-backdrop="static"
                                     data-bs-keyboard="false" tabindex="-1" role="dialog"
                                     aria-labelledby="staticBackdropLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form method="post" action="{{route('store.pay')}}">
                                                @csrf
                                                <div class="modal-header">
                                                    <h2 class="modal-title" id="staticBackdropLabel">Payment</h2>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Name SP</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Price</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @forelse($carts as $pro)
                                                            <tr>
                                                                <td>{{$pro['name']}}</td>
                                                                <td>{{$pro['quantity']}}</td>
                                                                <td>{{$pro['quantity']*$pro['price']}} $</td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="3"></td>
                                                            </tr>
                                                        @endforelse
                                                        <tr>
                                                            <td colspan="3" class="text-danger"><b>Total payment: {{$totalCart}} $</b></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <h3>Thông tin người nhận</h3>
                                                    <div class="row g-3">

                                                        <div class="col-md-6">
                                                            <label class="form-label">Name</label>
                                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                                                   placeholder="Full Name:">
                                                            @error('name')
                                                            <p class="text-danger">{{$message}}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Phone</label>
                                                            <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror"
                                                                   placeholder="Phone:">
                                                            @error('phone_number')
                                                            <p class="text-danger">{{$message}}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="form-label">Địa chỉ người nhận</label>
                                                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                                                                   placeholder="address:">
                                                            @error('address')
                                                            <p class="text-danger">{{$message}}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Payment</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Cart view section -->
@endsection
