
$(document).ready(function () {
    $(document).on('click','.productSizeContent',function (e) {
        $('.productSizeContent').css('border-color','white');
        $(this).css({
            'border-color' : 'red'
        });
        e.preventDefault();
    })
});

$(document).ready(function () {
    $(document).on('click','.colorLi',function () {
        const colorId = $(this).attr('data-id');
        $("#colorInput").val(colorId);
        $("#colorPtag").attr('hidden',false);
        $("#color_desc").text($(this).attr("data-desc"));
        $('.subImage[data-id='+colorId+']').click();
    });
});

$(document).ready(function () {
    $(document).on('click','.sizeLi',function () {
        let size_desc = $('#size_desc');
        $("#sizeInput").val($(this).attr("data-id"));
        $('#sizePtag').attr('hidden',false);
        size_desc.text($(this).attr('data-desc'))
    })

});



$(document).ready(function () {

    $(document).on('submit','#addToCartForm',function (e) {

        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };

        let flag = 0;
        let flag1 = 0;
        e.preventDefault();
        const sizeId = $('#sizeInput').val();
        const colorId = $('#colorInput').val();
        const productId = $('#quickViewSubmitBtn').attr('data-id');
        const qty = $('#qty').val();

        // console.log(Object.keys($('.colorLi')).length);
        // if (Object.keys($('.colorLi')).length > 2 )
        if (colorId === '')
        {
            flag = 1;
            alert("You have to select a Color");
        }else{
            flag = 0;
        }

        if (sizeId === ''){
            flag1 = 1;
            alert("You have to select a Size");
        }else{
            flag1 = 0;
        }

        if (flag === 0 && flag1 === 0) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'post',
                url: '/add-to-cart-ajax',
                data: {
                    id: productId,
                    size_id: sizeId,
                    color_id: colorId,
                    qty: qty
                },
                success: function (data) {
                    toastr.success('Cart Added Successfully!');
                    console.log(data.cart);
                        $(document).ready(function () {
                            let count = $('.header-cart a[class="cart-active"]').find('.pro-count.purple')[0];
                            let cartCount = $(count).text();
                            $(count).text(data.cartCount);

                        });
                    $("#minicart").html(data.minicart);
                    $('.close').click();

                },
                error: function (error) {
                    console.log(error);
                }
            })

        }
    });

    // $(document).on('click','#quickViewSubmitBtn', function (e) {
    //     e.preventDefault();
    //     const sizeId = $('#sizeInput').val();
    //     const colorId = $('#colorInput').val();
    //     const productId = $(this).attr('data-id');
    //     const qty = $('#qty').val();
    //     if (sizeId !== ''){
    //         flag = 0;
    //     }
    //
    //     if (colorId !== ''){
    //         flag = 0;
    //     }
    //
    //
    //     if (flag === 0) {
    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });
    //
    //         $.ajax({
    //             type: 'post',
    //             url: 'add-to-cart-ajax',
    //             data: {
    //                 id: productId,
    //                 size_id: sizeId,
    //                 color_id: colorId,
    //                 qty: qty
    //             },
    //             success: function (data) {
    //                 console.log(data);
    //                 console.log(flag)
    //             },
    //             error: function (error) {
    //                 console.log(error);
    //             }
    //         })
    //
    //     }
    // });

});

$(document).ready(function (e) {
    $('.single-ratting-star').on('click',function () {
        $('.single-ratting-star').children().css('color','#535353');
        $(this).children().css('color','#f5b223')
        $('#rating').val($(this).children().length);
    });
});


