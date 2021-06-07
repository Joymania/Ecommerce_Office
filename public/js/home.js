(function($) {
    $(document).ready(function() {
        //alert("ffff");quickView_modal_btn
        $(document).on('click', '.q_m_btn', function(e) {

            $('#colorInput').val('');
            $('#sizeInput').val('');
            $('#colorPtag').attr('hidden',true);
            $('#sizePtag').attr('hidden',true);
            $("#color_desc").text('');
            $("#size_desc").text('');


            //alert("eeeee");
            //$('#quickviewmodal').modal('show');
            e.preventDefault();
            //$('#edit_productCategory_modal').modal('show');
            let productID = $(this).attr('data-id');
            //alert(productID);
            // $('#edit_productCategory_modal input[name="productBrandID"]').val(productCategoryID);

            // //alert(leaveRequestID);
            $.ajax({
                url: productID + '/product-details-Ajax',
                method: 'get',
                dataType: "json",
                success: function(data) {
                    console.log(data.product);
                    // console.log(data.reviews);
                    //console.log(data.sizes);
                    //console.log(data.sizes[0].desc);
                    // // console.log(data.orders);

                    // console.log(data.rating);
                    // console.log(data.ratingCount);

                    $("#pro_rating_star").empty();
                    $(".pro-details-color-wrap ul").empty();
                    $(".pro-details-size ul").empty();
                    $('#pro-1').html('');

                    $('#quickViewSubmitBtn').attr('data-id',data.product.id);
                    $("#addToCartForm h2").html(data.product.name);
                    $('#quickviewmodal input[name="pro_id"]').val(data.product.id);
                    //alert(data.reviews.length);
                    $("#pro_rating").text(data.rating);
                    $("#pro_review_count").text(data.reviews.length + " reviews");
                    $("#pro_order_count").text(data.orders + " orders");



                    $("#pro_new_price").text(data.product.price + " Tk.");


                    for (let index = 0; index < data.rating; index++) {
                        $("#pro_rating_star").append("<i class='icon_star'></i>");
                    }

                    if (data.colors.length > 0) {
                        $('#productColorDiv').attr('hidden',false);
                        $('#productSizeDiv').find('input#colorInput').remove();
                        $('#productColorDiv').append(`
                           <input type="number" id="colorInput" name="color_id" value="" hidden>
                        `);
                        for (let index = 0; index < data.colors.length; index++) {
                            if (data.colors[index].color_id == 1) {
                                $(".pro-details-color-wrap ul").append("<li class='colorLi' data-desc='Red' data-id='1' ><a class='red' href='#'>Red</a></li>");
                            }
                            if (data.colors[index].color_id == 2) {
                                $(".pro-details-color-wrap ul").append("<li class='colorLi' data-desc='Black' data-id='2' ><a class='black' href='#'>Black</a></li>");
                            }
                            if (data.colors[index].color_id == 3) {
                                $(".pro-details-color-wrap ul").append("<li class='colorLi' data-desc='White' data-id='3' ><a class='white' href='#'>White</a></li>");
                            }

                        }
                    }else{
                        $('#colorInput').remove();
                        $('#productColorDiv').attr('hidden',true);
                    }


                    if (data.sizes.length > 0){
                        $('#productSizeDiv').attr('hidden',false);
                        $('#productSizeDiv').find('input#sizeInput').remove();
                        $('#productSizeDiv').append(`
                            <input type="number" id="sizeInput" name="size_id" value="" hidden>
                        `);
                        for (let index = 0; index < data.sizes.length; index++) {
                            $(".pro-details-size ul").append("<li class='sizeLi' data-desc='" + data.sizes[index].desc + "' data-id=" + data.sizes[index].size_id + " data-toggle='tooltip' title='" + data.sizes[index].desc + "'><strong><a class='productSizeContent' href='#' >" + data.sizes[index].size + "</a></strong></li>");

                        }
                    }else{
                        $('#sizeInput').remove();
                        $('#productSizeDiv').attr('hidden',true);
                    }




                    //Quick view modal image adding code
                    // $(".easyzoom").append("<a href=/upload/products_images/" + data.product.image + "><img src=/upload/products_images/" + data.product.image + " alt='Product Image'></a>");

                    // $(".easyzoom").append("<a class='easyzoom-pop-up img-popup' href='/upload/products_images/'" + data.product.image + "'><i class='icon-size-fullscreen'></i class='icon-size-fullscreen' ></a>");

                    $('#pro-1').append(`
                                 <img src="/upload/products_images/${data.product.image}" alt='Product Image'>
                    `);

                    $('#quickviewmodal').modal('show');
                    //var status = data.status == '1' ? 'Active' : 'Inactive';
                    //alert(status);

                    //$("#referenceEdit").val(data.reference).change();;
                    //                     $

                    // $('#edit_productCategory_modal input[name="brand_nameEdit"]').val(data.category_name);
                    // $('#edit_productCategory_modal input[name="imageEdit"]').val('');
                    // $("#productCategoryStatusEdit").val(data.is_active).change();
                    // $("#categoryEdit").val(data.category_id).change();;

                    // $('#edit_productCategory_modal').modal('show');
                },
                error: function(data) {
                    alert('error');
                    console.log(data);
                }
            });


        });

    });



})(jQuery);
