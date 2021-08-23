$(document).ready(function () {
    let origin = window.location.origin
    // $('.addToCart').click(function () {
    $(document).on('click', '.addToCart', function () {
        let cartId = $(this).attr('cart')
        $.ajax({
            url: origin + '/shop/addToCart/' + cartId,
            method: 'GET',
            type: 'json',
            success: function (res) {
                let counts = res.numbers
                $('#count').html(counts)
                $('#totalCart').html(res.totalCart + '&nbsp;$')
                toastr.success('Bạn đã thêm mới 1 sản phẩm vào gỏi hàng', {timeout: 900})
            },
            error: function () {
                toastr.error('that bai', {timeout: 1000})
            }
        });
    });

    $('.remove').click(function () {
        // console.log(1)
        // $(document).on('click', '.remove' , function (){
        if (confirm('Bạn chắc chắn muốn xóa?')) {
            let cartId = $(this).attr('delete')
            removeCart(cartId)
        }
    });

    $('.quantity').on('input', function () {
        let input = $(this).attr('input')
        let value = $('#' + input).val()
        if (value <= 0) {
            removeCart(input)
        } else {
            $.ajax({
                url: origin + '/shop/quantity/' + input,
                method: 'GET',
                type: 'json',
                data: {
                    totalQuantity: value
                },
                success: function (res) {
                    let price = (res.carts.quantity * res.carts.price)
                    $('#total-' + input).html(price + '&nbsp;$')
                    $('#totalCart').html(res.totalCart + '&nbsp;$')
                },
            });
        }
    });

    function removeCart(ProductId) {
        $.ajax({
            url: origin + '/shop/deleteCart/' + ProductId,
            method: 'GET',
            type: 'json',
            success: function (res) {
                let counts = res.numbers
                $('#delete-' + ProductId).remove();
                toastr.success('Bạn đã xóa thành công', {timeout: 900})
                $('#count').html(counts)
                $('#totalCart').html(res.totalCart + '&nbsp;$')
            },
            error: function () {
                toastr.error('that bai', {timeout: 900})
            }
        });
    }

    $('#search-name').on('input', function () {
        let input = $('#search-name').val()
        if (input != '') {
            $.ajax({
                url: origin + '/shop/search/' + input,
                method: 'GET',
                type: 'json',
                data: {
                    value: input
                },
                success: function (res) {
                    display(res)
                }
            });
        } else {
            $.ajax({
                url: origin + '/api/shop/list/',
                method: 'GET',
                type: 'json',
                success: function (res) {
                    display(res)
                },
            });
        }
    });

    function display(arr) {
        let data = ''
        for (let i = 0; i < arr.length; i++) {
            data += `
                        <ul class="aa-product-catg">
                            <!-- start single product item -->
                            <li>
                                <figure>
                                    <a class="aa-product-img"><img src="../../storage/${arr[i].image}" style="width: 250px;height: 300px"></a>
                                    <a class="aa-add-card-btn addToCart" cart="${arr[i].id}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                    <figcaption>
                                        <h4 class="aa-product-title">${arr[i].name}</h4>
                                        <span class="aa-product-price">${arr[i].price}&nbsp;$</span>
                                    </figcaption>
                                </figure>
                                <div class="aa-product-hvr-content">
                                    <a class="likes" like="${arr[i].id}" data-toggle="tooltip" data-placement="top" title="like"><span class="fas fa-thumbs-up"></span></a>
                                    <a data-toggle="tooltip" data-placement="top" title="Compare"><span class="far fa-heart"></span></a>
                                    <a class="detailPro" detail="${arr[i].id}" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                                </div>
                                <!-- product badge -->
                                <span class="aa-badge aa-sale" href="#">SALE!</span>
                            </li>
                        </ul>`
        }
        $('.search-product').html(data)
    }

    $('.category-name').click(function () {
        // $(document).on('click', '.category-name' , function (){
        let categoryId = $(this).attr('cate')
        // console.log(categoryId)
        filterCategory(categoryId)
    });

    function filterCategory(categoryId) {
        $.ajax({
            url: origin + '/shop/filterCategory/' + categoryId,
            method: 'GET',
            type: 'json',
            success: function (res) {
                console.log(res)
                display(res)
            },
        })
    }

    $('.brand-name').click(function () {
        // $(document).on('click', '.brand-name' , function (){
        let brandId = $(this).attr('brand')
        filterBrand(brandId)
    });

    function filterBrand(brandId) {
        $.ajax({
            url: origin + '/shop/filterBrand/' + brandId,
            method: 'GET',
            type: 'json',
            success: function (res) {
                display(res)
            },
        })
    }

    // $('.detail-pro').click(function (){
    $(document).on('click', '.detailPro', function () {
        let proId = $(this).attr('detail')
        $.ajax({
            url: origin + '/shop/detail/' + proId,
            method: 'GET',
            type: 'json',
            success: function (res) {
                // console.log(res)
                display2(res)
            }
        })
    })

    function display2(arr) {
        console.log(arr)
        let data = `
                      <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="aa-product-view-slider">
                                                    <div class="simpleLens-gallery-container" id="demo-1">
                                                        <div class="simpleLens-container">
                                                            <div class="simpleLens-big-image-container">
                                                                <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                                                    <img src="../../storage/${arr.product.image}" style="width: 250px;height: 300px" class="simpleLens-big-image">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal view content -->
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="aa-product-view-content">
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="aa-product-view-content">
                                                            <h3>${arr.product.name}</h3>
                                                                <p class="aa-product-avilability text-danger"> Price:&nbsp;<span class="aa-product-view-price">${arr.product.price}&nbsp;$</span></p>
                                                                <p class="aa-product-avilability">Brand:&nbsp;<span>${arr.brand}</span></p>
                                                                <p class="aa-product-avilability">Category:&nbsp;<span>${arr.category}</span></p>
                                                                <p class="aa-product-avilability">Description:&nbsp;<span>${arr.product.description}</span></p>

                                                                <p class="aa-product-avilability">like:&nbsp;<span>${arr.like.like}</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>`
        $('.detail-content').html(data)
    }

    $('.filter-price').on('input', function () {
        let price = $(this).val()
        $.ajax({
            url: origin + '/shop/filterPrice/' + price,
            method: 'GET',
            type: 'json',
            data: {
                value: price,
            },
            success: function (res) {
                display(res)
            }
        })
    });

    $(document).on('click', '.likes', function () {
        let proId = $(this).attr('like');
        $.ajax({
            url: origin + '/shop/productLike/' + proId,
            method: 'GET',
            type: 'json',
            success: function (res) {
                console.log(res)
            }
        })
    });

});
