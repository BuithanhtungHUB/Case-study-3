@extends('shop.master')
@section('title','Shop List')
@section('content')
    <!-- catg header banner section -->
    <section id="aa-catg-head-banner">
        <img src="https://cdn2.jomashop.com/media/wysiwyg/banner_main_SUMMER_2021_2.jpg?fbclid=IwAR0C_w8H2BUrDVZmbaYMMqAKhCLE70Jpm3qOSQcpcaW2PptPo-bYCAxmEzM" style="width: 100%;height: 300px" alt="fashion img">
        <div class="aa-catg-head-banner-area">
            <div class="container">
                <div class="aa-catg-head-banner-content">
                    <h2>Fashion</h2>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Women</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- / catg header banner section -->

    <section id="aa-product-category">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
                <div class="aa-product-catg-content">
                    <div class="aa-product-catg-content search-product">
                        @foreach($products as $product)
                        <ul class="aa-product-catg">
                            <!-- start single product item -->
                            <li>
                                <figure>
                                    <a class="aa-product-img"><img src="{{asset('storage/'.$product->image)}}" style="width: 250px;height: 300px"></a>
                                    <a class="aa-add-card-btn addToCart" cart="{{$product->id}}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                    <figcaption>
                                        <h4 class="aa-product-title">{{$product->name}}</h4>
                                        <span class="aa-product-price">{{$product->price}}&nbsp;$</span>
                                    </figcaption>
                                </figure>
                                <div class="aa-product-hvr-content">
                                    <a class="likes" like="{{$product->id}}" data-toggle="tooltip" data-placement="top" title="like"><span class="fas fa-thumbs-up"></span></a>
                                    <a data-toggle="tooltip" data-placement="top" title="Compare"><span class="far fa-heart"></span></a>
                                    <a class="detailPro" detail="{{$product->id}}" data-toggle2="tooltip" data-placement="top" title="Detail" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                                </div>
                                <!-- product badge -->
                                <span class="aa-badge aa-sale" href="#">SALE!</span>
                            </li>
                        </ul>
                    @endforeach
                        <!-- quick view modal -->
                        <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <div class="row detail-content">
                                            <!-- Modal view slider -->
                                        </div>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                        <!-- / quick view modal -->
                    </div>
                    {!! $products->links() !!}
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
                <aside class="aa-sidebar">
                    <!-- single sidebar -->
                    <div class="aa-sidebar-widget">
                        <h3>Category</h3>
                        <div class="tag-cloud">
                            @foreach($categories as $category)
                            <a class="category-name" cate="{{$category->id}}">{{$category->name}}</a>
                            @endforeach
                        </div>
                    </div>
                    <!-- single sidebar -->
                    <div class="aa-sidebar-widget">
                        <h3>Brand</h3>
                        <div class="tag-cloud">
                            @foreach($brands as $brand)
                                <a class="brand-name" brand="{{$brand->id}}">{{$brand->name}}</a>
                            @endforeach
                        </div>
                    </div>
                    <!-- single sidebar -->
                    <div class="aa-sidebar-widget">
                        <h3>Shop By Price</h3>
                        <!-- price range -->
                        <div class="aa-sidebar-price-range">
                            <div class="slidecontainer">
                                <input type="range" min="1" max="1000" value="1000" class="slider filter-price" id="myRange">
                                <p>Price: <span>0 $</span>-><span id="demo"></span></p>
                            </div>
                        </div>
                    </div>
                    <!-- single sidebar -->
                </aside>
            </div>
        </div>
    </div>
</section>
@endsection
