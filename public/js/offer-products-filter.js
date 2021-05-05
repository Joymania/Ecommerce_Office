$(document).ready(function () {

    $('.priceFilter').on('click', function () {
        $(".priceFilter").css({
            'backgroundColor':'#FFFFFF',
            'color': 'black'
        });
        $(this).css({
            'backgroundColor':'#666666',
            'color': 'white'
        });

        let first = $(this).find('span[class="first"]').text();
        let second = $(this).find('span[class="second"]').text();
        let shopArea = $('#shopArea');
        let singleProduct = $('.singleProduct');

        $.ajax({
            type: 'get',
            url: '/priceFiltered-offer-products',
            data: {
                first: first,
                second: second
            },
            success: function (data) {
                singleProduct.attr('hidden',true);
                if (data.length > 0) {
                    $('#noResult').remove();
                    for (let i = 0; i < data.length; i++) {
                        let rating = '';
                        if (Math.ceil(data[i].avg_rating) === 1){
                            rating = `<i class="icon_star"></i>`;
                        }else if (Math.ceil(data[i].avg_rating) === 2){
                            rating = `<i class="icon_star"></i>
                                       <i class="icon_star"></i> `;
                        }else if (Math.ceil(data[i].avg_rating) === 3){
                            rating = `<i class="icon_star"></i>
                                      <i class="icon_star"></i>
                                      <i class="icon_star"></i> `;
                        }else if (Math.ceil(data[i].avg_rating) === 4){
                            rating = `<i class="icon_star"></i>
                                      <i class="icon_star"></i>
                                      <i class="icon_star"></i>
                                      <i class="icon_star"></i>`;
                        }else if (Math.ceil(data[i].avg_rating) === 5){
                            rating = `<i class="icon_star"></i>
                                      <i class="icon_star"></i>
                                      <i class="icon_star"></i>
                                      <i class="icon_star"></i>
                                      <i class="icon_star"></i>`;
                        }

                        let reviews = '';
                        if (data[i].reviews.length > 0){
                            reviews = `<span>(${data[i].reviews.length})</span>`
                        }
                            shopArea.append(`
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 singleProduct">
                                                <div class="single-product-wrap mb-35">
                                                    <div class="product-img product-img-zoom mb-15 text-center">
                                                        <a href="/${data[i].id}/product-details">
                                                            <img src="./upload/products_images/${data[i].image}" style="height: 324px; width: 270px" alt="">
                                                        </a>


                                                        <span class="pro-badge left bg-red">-${(((parseInt(data[i].price) - parseInt(data[i].promo_price))*100)/data[i].price).toFixed(2)}%</span>
                                                        <div class="product-action-2 tooltip-style-2">

                                                            <a href="/add-to-wishlist/${data[i].id}">
                                                                <button title="Wishlist"><i class="icon-heart"></i></button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-content-wrap-2 text-center">
                                                        <div class="product-rating-wrap">
                                                            <div class="product-rating">
                                                                ${rating}
                                                            </div>
                                                            ${reviews}
                                                        </div>
                                                        <h3><a href="/${data[i].id}/product-details" class="productName">${data[i].name}</a></h3>
                                                        <div class="product-price-2">
                                                               <span class="new-price product-price">${data[i].promo_price}</span>Tk
                                                               <span class="old-price">${data[i].price}</span>Tk
                                                        </div>
                                                    </div>
                                                    <div class="product-content-wrap-2 product-content-position text-center">
                                                        <div class="product-rating-wrap">
                                                            <div class="product-rating">
                                                                ${rating}
                                                            </div>
                                                            ${reviews}
                                                        </div>
                                                        <h3><a href="/${data[i].id}/product-details">${data[i].name}</a></h3>
                                                        <div class="product-price-2">
                                                            <span class="new-price product-price">${data[i].promo_price}</span>Tk
                                                               <span class="old-price">${data[i].price}</span>Tk
                                                        </div>
                                                        <div class="pro-add-to-cart">
                                                            <a href="/${data[i].id}/product-details">
                                                                <button title="Add to Cart">Add To Cart</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            `);

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
    function sortProductsPriceAscending() {
        // change variable name, so it's clear what it contains
        var gridItems = $('.singleProduct');

        gridItems.sort(function(a, b){
            // we are sorting the gridItems, but we are sorting them on the nested
            // product card prices.  So we have to find the nested product card
            // to get the price off of
            return $(a).find('.product-price').text() - $(b).find('.product-price').text();
        });

        // when you put the grid items back on the container, just append them rather
        // than using html().  Append will just move them.
        $("#shopArea").append(gridItems);
    }

    $('#sortBy').on('change', function () {
        if ($(this).val() === 'name'){
            SortByName();
        }
        if ($(this).val() === 'price')
        {
            //SortByPrice();
            sortProductsPriceAscending();
        }
    });
});

//Newly Search products
$(document).ready(function () {

    $('#search2').on('submit', function (e) {
        e.preventDefault();

        let shopArea = $('#shopArea');
        let singleProduct = $('.singleProduct');
        let searchText = $('#searchInput').val();
        $.ajax({
            type: 'get',
            url: '/offer-products-ajax-search',
            data: {
                search: searchText
            },
            success: function (data) {
                singleProduct.attr('hidden',true);
                if (data.length > 0) {
                    $('#noResult').remove();

                    for (let i = 0; i < data.length; i++) {
                        let rating = '';
                        if (Math.ceil(data[i].avg_rating) === 1){
                            rating = `<i class="icon_star"></i>`;
                        }else if (Math.ceil(data[i].avg_rating) === 2){
                            rating = `<i class="icon_star"></i>
                                       <i class="icon_star"></i> `;
                        }else if (Math.ceil(data[i].avg_rating) === 3){
                            rating = `<i class="icon_star"></i>
                                      <i class="icon_star"></i>
                                      <i class="icon_star"></i> `;
                        }else if (Math.ceil(data[i].avg_rating) === 4){
                            rating = `<i class="icon_star"></i>
                                      <i class="icon_star"></i>
                                      <i class="icon_star"></i>
                                      <i class="icon_star"></i>`;
                        }else if (Math.ceil(data[i].avg_rating) === 5){
                            rating = `<i class="icon_star"></i>
                                      <i class="icon_star"></i>
                                      <i class="icon_star"></i>
                                      <i class="icon_star"></i>
                                      <i class="icon_star"></i>`;
                        }

                        let reviews = '';
                        if (data[i].reviews.length > 0){
                            reviews = `<span>(${data[i].reviews.length})</span>`
                        }
                        shopArea.append(`
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 singleProduct">
                                                <div class="single-product-wrap mb-35">
                                                    <div class="product-img product-img-zoom mb-15 text-center">
                                                        <a href="/${data[i].id}/product-details">
                                                            <img src="./upload/products_images/${data[i].image}" style="height: 324px; width: 270px" alt="">
                                                        </a>


                                                        <span class="pro-badge left bg-red">-${(((parseInt(data[i].price) - parseInt(data[i].promo_price))*100)/data[i].price).toFixed(2)}%</span>
                                                        <div class="product-action-2 tooltip-style-2">

                                                            <a href="/add-to-wishlist/${data[i].id}">
                                                                <button title="Wishlist"><i class="icon-heart"></i></button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-content-wrap-2 text-center">
                                                        <div class="product-rating-wrap">
                                                            <div class="product-rating">
                                                                ${rating}
                                                            </div>
                                                            ${reviews}
                                                        </div>
                                                        <h3><a href="/${data[i].id}/product-details" class="productName">${data[i].name}</a></h3>
                                                        <div class="product-price-2">
                                                               <span class="new-price product-price">${data[i].promo_price}</span>Tk
                                                               <span class="old-price">${data[i].price}</span>Tk
                                                        </div>
                                                    </div>
                                                    <div class="product-content-wrap-2 product-content-position text-center">
                                                        <div class="product-rating-wrap">
                                                            <div class="product-rating">
                                                                ${rating}
                                                            </div>
                                                            ${reviews}
                                                        </div>
                                                        <h3><a href="/${data[i].id}/product-details">${data[i].name}</a></h3>
                                                        <div class="product-price-2">
                                                            <span class="new-price product-price">${data[i].promo_price}</span>Tk
                                                               <span class="old-price">${data[i].price}</span>Tk
                                                        </div>
                                                        <div class="pro-add-to-cart">
                                                            <a href="/${data[i].id}/product-details">
                                                                <button title="Add to Cart">Add To Cart</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            `);
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
            url: '/offer-category-products',
            data: {category: categoryName},
            success: function (data) {
                singleProduct.attr('hidden',true);
                if (data.length > 0) {
                    $('#noResult').remove();
                    for (let i = 0; i < data.length; i++) {
                        let rating = '';
                        if (Math.ceil(data[i].avg_rating) === 1){
                            rating = `<i class="icon_star"></i>`;
                        }else if (Math.ceil(data[i].avg_rating) === 2){
                            rating = `<i class="icon_star"></i>
                                       <i class="icon_star"></i> `;
                        }else if (Math.ceil(data[i].avg_rating) === 3){
                            rating = `<i class="icon_star"></i>
                                      <i class="icon_star"></i>
                                      <i class="icon_star"></i> `;
                        }else if (Math.ceil(data[i].avg_rating) === 4){
                            rating = `<i class="icon_star"></i>
                                      <i class="icon_star"></i>
                                      <i class="icon_star"></i>
                                      <i class="icon_star"></i>`;
                        }else if (Math.ceil(data[i].avg_rating) === 5){
                            rating = `<i class="icon_star"></i>
                                      <i class="icon_star"></i>
                                      <i class="icon_star"></i>
                                      <i class="icon_star"></i>
                                      <i class="icon_star"></i>`;
                        }

                        let reviews = '';
                        if (data[i].reviews.length > 0){
                            reviews = `<span>(${data[i].reviews.length})</span>`
                        }

                        shopArea.append(`
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 singleProduct">
                                                <div class="single-product-wrap mb-35">
                                                    <div class="product-img product-img-zoom mb-15 text-center">
                                                        <a href="/${data[i].id}/product-details">
                                                            <img src="../upload/products_images/${data[i].image}" style="height: 324px; width: 270px" alt="">
                                                        </a>
                                                        <span class="pro-badge left bg-red">-${(((parseInt(data[i].price) - parseInt(data[i].promo_price))*100)/data[i].price).toFixed(2)}%</span>
                                                        <div class="product-action-2 tooltip-style-2">

                                                            <a href="/add-to-wishlist/${data[i].id}">
                                                                <button title="Wishlist"><i class="icon-heart"></i></button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-content-wrap-2 text-center">
                                                        <div class="product-rating-wrap">
                                                            <div class="product-rating">
                                                                ${rating}
                                                            </div>
                                                            ${reviews}
                                                        </div>
                                                        <h3><a href="/${data[i].id}/product-details" class="productName">${data[i].name}</a></h3>
                                                        <div class="product-price-2">
                                                               <span class="new-price product-price">${data[i].promo_price}</span>Tk
                                                               <span class="old-price">${data[i].price}</span>Tk
                                                        </div>
                                                    </div>
                                                    <div class="product-content-wrap-2 product-content-position text-center">
                                                        <div class="product-rating-wrap">
                                                            <div class="product-rating">
                                                                ${rating}
                                                            </div>
                                                            ${reviews}
                                                        </div>
                                                        <h3><a href="/${data[i].id}/product-details">${data[i].name}</a></h3>
                                                        <div class="product-price-2">
                                                            <span class="new-price product-price">${data[i].promo_price}</span>Tk
                                                               <span class="old-price">${data[i].price}</span>Tk
                                                        </div>
                                                        <div class="pro-add-to-cart">
                                                            <a href="/${data[i].id}/product-details">
                                                                <button title="Add to Cart">Add To Cart</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            `);
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


