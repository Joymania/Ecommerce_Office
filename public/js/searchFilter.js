//Filter by price or
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
            url: '/search-filter',
            data: {
                search: search,
                category: category,
                first: first,
                second: second
            },
            success: function (data) {
                singleProduct.attr('hidden',true);
                if (data.length > 0) {
                    $('#noResult').remove();
                    for (let i = 0; i < data.length; i++) {
                        shopArea.append('' +
                            '<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 singleProduct">' +
                            ' <div class="single-product-wrap mb-35">' +
                            '<div class="product-img product-img-zoom mb-15">' +
                            '<a href="/'+data[i].id+'/product-details">' +
                            '<img src="../upload/products_images/'+data[i].image+'" style="width: 266px; height: 320px;"></a>' +
                            '<div class="product-action-2 tooltip-style-2">' +
                            '<button title="Wishlist"><i class="icon-heart"></i></button>' +
                            '</div> </div>' +
                            ' <div class="product-content-wrap-2 text-center">' +
                            '<h3><a href="/'+data[i].id+'/product-details">'+data[i].name+'</a></h3>' +
                            '<div class="product-price-2">' +
                            '<span class="price">'+data[i].price+'</span><span style="margin-left: -3px">Tk.</span>' +
                            '</div>' +
                            '</div>' +
                            '<div class="product-content-wrap-2 product-content-position text-center">' +
                            '<h3><a href="/'+data[i].id+'/product-details">'+data[i].name+'</a></h3>' +
                            '<div class="product-price-2">' +
                            ' <span class="product-price">'+data[i].price+' Tk.</span>' +
                            ' </div>' +
                            '<div class="pro-add-to-cart">' +
                            '<button title="Add to Cart">Add To Cart</button>' +
                            ' </div> </div>  </div> </div>')
                    }
                }else {
                    $('#noResult').remove();
                    shopArea.append('' +
                        '<div id="noResult" class="col-12 text-center"><h3>No Result Found</h3></div>');
                }
            },
            error: function (error) {

            }
        })

    });

});


//Sorting by name or price function
$(document).ready(function () {
    function SortByName() {
        var sortedProducts = $('.singleProduct').sort(function(a, b) {
            return $(a).find('.productName').text().localeCompare($(b).find('.productName').text())
        });
        $('#shopArea').remove('.singleProduct').append(sortedProducts)
    }

    function SortByPrice(){
        var sortedProducts = $('.singleProduct').sort(function(a, b) {
            return $(a).find('.product-price').text().localeCompare($(b).find('.product-price').text())
        });
        $('#shopArea').remove('.singleProduct').append(sortedProducts)
    }

    $('#sortBy').on('change', function () {
        if ($(this).val() === 'name'){
            SortByName();
        }
        if ($(this).val() === 'price')
        {
            SortByPrice();
        }
    });
});

//Newly Search products
$(document).ready(function () {

    $('#searchBtn').on('click', function (e) {
        e.preventDefault();

        let shopArea = $('#shopArea');
        let singleProduct = $('.singleProduct');
        let searchText = $('#searchInput').val();
        $.ajax({
            type: 'get',
            url: '/search-ajax',
            data: {
                search: searchText
            },
            success: function (data) {
                singleProduct.attr('hidden',true);
                if (data.length > 0) {
                    $('#noResult').remove();
                    for (let i = 0; i < data.length; i++) {
                        shopArea.append('' +
                            '<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 singleProduct">' +
                            ' <div class="single-product-wrap mb-35">' +
                            '<div class="product-img product-img-zoom mb-15">' +
                            '<a href="/'+data[i].id+'/product-details">' +
                            '<img src="../upload/products_images/'+data[i].image+'" style="width: 266px; height: 320px;"></a>' +
                            '<div class="product-action-2 tooltip-style-2">' +
                            '<button title="Wishlist"><i class="icon-heart"></i></button>' +
                            '</div> </div>' +
                            ' <div class="product-content-wrap-2 text-center">' +
                            '<h3><a href="/'+data[i].id+'/product-details">'+data[i].name+'</a></h3>' +
                            '<div class="product-price-2">' +
                            '<span class="price">'+data[i].price+'</span><span style="margin-left: -3px">Tk.</span>' +
                            '</div>' +
                            '</div>' +
                            '<div class="product-content-wrap-2 product-content-position text-center">' +
                            '<h3><a href="/'+data[i].id+'/product-details">'+data[i].name+'</a></h3>' +
                            '<div class="product-price-2">' +
                            ' <span class="product-price">'+data[i].price+' Tk.</span>' +
                            ' </div>' +
                            '<div class="pro-add-to-cart">' +
                            '<button title="Add to Cart">Add To Cart</button>' +
                            ' </div> </div>  </div> </div>')
                    }
                }else {
                    $('#noResult').remove();
                    shopArea.append('' +
                        '<div id="noResult" class="col-12 text-center"><h3>No Result Found</h3></div>');
                }
            }

        })
    })
});

$(document).ready(function () {
    $(".categoryName").on('click', function (e) {
        e.preventDefault();
        let shopArea = $('#shopArea');
        let categoryName = $(this).text();
        let singleProduct = $('.singleProduct');
        $.ajax({
            type: 'GET',
            url: '/category-products',
            data: {category: categoryName},
            success: function (data) {
                singleProduct.attr('hidden',true);
                if (data.length > 0) {
                    $('#noResult').remove();
                    for (let i = 0; i < data.length; i++) {
                        shopArea.append('' +
                            '<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 singleProduct">' +
                            ' <div class="single-product-wrap mb-35">' +
                            '<div class="product-img product-img-zoom mb-15">' +
                            '<a href="/'+data[i].id+'/product-details">' +
                            '<img src="../upload/products_images/'+data[i].image+'" style="width: 266px; height: 320px;"></a>' +
                            '<div class="product-action-2 tooltip-style-2">' +
                            '<button title="Wishlist"><i class="icon-heart"></i></button>' +
                            '</div> </div>' +
                            ' <div class="product-content-wrap-2 text-center">' +
                            '<h3><a href="/'+data[i].id+'/product-details">'+data[i].name+'</a></h3>' +
                            '<div class="product-price-2">' +
                            '<span class="price">'+data[i].price+'</span><span style="margin-left: -3px">Tk.</span>' +
                            '</div>' +
                            '</div>' +
                            '<div class="product-content-wrap-2 product-content-position text-center">' +
                            '<h3><a href="/'+data[i].id+'/product-details">'+data[i].name+'</a></h3>' +
                            '<div class="product-price-2">' +
                            ' <span class="product-price">'+data[i].price+' Tk.</span>' +
                            ' </div>' +
                            '<div class="pro-add-to-cart">' +
                            '<button title="Add to Cart">Add To Cart</button>' +
                            ' </div> </div>  </div> </div>')
                    }
                }else {
                    $('#noResult').remove();
                    shopArea.append('' +
                        '<div id="noResult" class="col-12 text-center"><h3>No Result Found</h3></div>');
                }
            }
        })

    });
});

