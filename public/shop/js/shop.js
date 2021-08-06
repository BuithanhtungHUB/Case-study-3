$(document).ready(function () {
    $('.addToCart').click(function () {
        let cartId = $(this).attr('cart')
        let origin = window.location.origin
        $.ajax({
            url: origin + '/shop/addToCart/' + cartId,
            method: 'GET',
            type: 'json',
            success: function (res) {
                let counts = res.numbers
                $('#count').html(counts)
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
            let origin = window.location.origin
            console.log(cartId)
            $.ajax({
                url: origin + '/shop/deleteCart/' + cartId,
                method: 'GET',
                type: 'json',
                success: function (res) {
                    let counts = res.numbers
                    $('#destroy-' + cartId).remove();
                    toastr.success('Bạn đã xóa thành công', {timeout: 900})
                    $('#count').html(counts)
                },
                error: function () {
                    toastr.error('that bai', {timeout: 900})
                }
            });
        }
        ;
    });
    $('.quantity').on('input', function () {
        let input = $(this).attr('input')
        let value = $('#' + input).val()
        let origin = window.location.origin
        // console.log()
        $.ajax({
            url: origin + '/shop/quantity/' + input,
            method: 'GET',
            type: 'json',
            data: {
                totalQuantity: value
            },
            success: function (res) {
                let price = (res.quantity * res.price)
                if (price<=0){
                    $('#delete-' + input).remove();
                }
                $('#total-' + input).html(price)
            }
        })

    });
});
