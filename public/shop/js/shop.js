$(document).ready(function () {

    let origin = window.location.origin
    $('.addToCart').click(function () {
        let cartId = $(this).attr('cart')

        $.ajax({
            url: origin + '/shop/addToCart/' + cartId,
            method: 'GET',
            type: 'json',
            success: function (res) {
                let counts = res.numbers
                $('#count').html(counts)

                $('#totalCart').html(res.totalCart+'&nbsp;$')

                toastr.success('Bạn đã thêm mới 1 sản phẩm vào gỏi hàng', {timeout: 900})
            },
            error: function () {
                toastr.error('that bai', {timeout: 1000})
            }
        });
    });

    $('.remove').click(function () {
        if (confirm('Bạn chắc chắn muốn xóa?')) {
            let cartId = $(this).attr('delete')

            removeCart(cartId)
        }
    });

    $('.quantity').on('input', function () {
        let input = $(this).attr('input')
        let value = $('#' + input).val()
        if (value <=0){
            removeCart(input)
        }else {
            $.ajax({
                url: origin + '/shop/quantity/' + input,
                method: 'GET',
                type: 'json',
                data: {
                    totalQuantity: value
                },
                success: function (res) {
                    let price = (res.carts.quantity * res.carts.price)
                    $('#total-' + input).html(price+'&nbsp;$')
                    $('#totalCart').html(res.totalCart+'&nbsp;$')
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
                $('#totalCart').html(res.totalCart+'&nbsp;$')
            },
            error: function () {
                toastr.error('that bai', {timeout: 900})
            }
        });
    }
    $('#search-name').on('input',function (){
        let input = $('#search-name').val()
        $.ajax({
           url:origin +'/search/' + input,
            method:'GET',
            type:'json',
            data: {
               value: input
            },
            success:function (res){
              console.log(res)
            },
        });

    });
});
