@extends('shop.master')
@section('title','Payment history')
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
                                        <th>#</th>
                                        <th>Người đặt</th>
                                        <th>Ngày đặt</th>
                                        <th>Product_name</th>
                                        <th>Quantity</th>
                                        <th>Total payment</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($payment as $key=>$pay)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$pay->user->name}}</td>
                                            <td>{{$pay->created_at}}</td>
                                            <td>{{$pay->product_name}}</td>
                                            <td>{{$pay->quantity}}</td>
                                            <td>{{$pay->total_payment}} $</td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="5"></td></tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                {!! $payment->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Cart view section -->
@endsection
