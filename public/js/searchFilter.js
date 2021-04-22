$(document).ready(function () {


   $('#filterBtn').on('click', function () {
        let amount = $('#amount').val();
        let split = amount.split('-');
        let first =split[0].replace('$','');
        let second = split[1].replace('$','');
        let search = $('#search').val();
        let category = $('#category').val();
        let shopArea = $('#shopArea');
        let singleProduct = $('.singleProduct');

        $.ajax({
            type: 'get',
            url: '/front/search-filter/',
            data: {
                search: search,
                category: category,
                first: first,
                second: second
            },
            success: function (data) {
                singleProduct.attr('hidden',true);
                if (data.length > 0) {
                    for (let i = 0; i < data.length; i++) {
                        shopArea.append('' +
                            '<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 singleProduct">' +
                            ' <div class="single-product-wrap mb-35">' +
                            '<div class="product-img product-img-zoom mb-15">' +
                            '<a href="{{route("product.details",'+data[i].id+')}}">' +
                            '<img src="../upload/products_images/'+data[i].image+'" ></a>' +
                            '<div class="product-action-2 tooltip-style-2">' +
                            '<button title="Wishlist"><i class="icon-heart"></i></button>' +
                            '<button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>' +
                            '<button title="Compare"><i class="icon-refresh"></i></button>' +
                            '</div> </div>' +
                            ' <div class="product-content-wrap-2 text-center">' +
                            '<h3><a href="{{route("product.details",'+data[i].id+')}}">'+data[i].name+'</a></h3>' +
                            '<div class="product-price-2">' +
                            '<span class="price">'+data[i].price+'</span><span style="margin-left: -3px">Tk.</span>' +
                            '</div>' +
                            '</div>' +
                            '<div class="product-content-wrap-2 product-content-position text-center">' +
                            '<h3><a href="{{route("product.details",'+data[i].id+')}}">'+data[i].name+'</a></h3>' +
                            '<div class="product-price-2">' +
                            ' <span class="product-price">'+data[i].price+' Tk.</span>' +
                            ' </div>' +
                            '<div class="pro-add-to-cart">' +
                            '<button title="Add to Cart">Add To Cart</button>' +
                            ' </div> </div>  </div> </div>')
                    }
                }
            },
            error: function (error) {
                console.log(error)
            }
        })

    })

});

