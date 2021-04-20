<footer class="footer-area bg-gray-4">
    <div class="footer-top border-bottom-4 pb-55">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="footer-widget mb-40">
                        <h3 class="footer-title">Quick Shop</h3>
                        <div class="footer-info-list info-list-50-parcent">
                            <ul>
                                <li><a href="shop.html">New In</a></li>
                                <li><a href="shop.html">T-Shirts</a></li>
                                <li><a href="shop.html">Best Seller</a></li>
                                <li><a href="shop.html">Shirts</a></li>
                                <li><a href="shop.html">Clothing</a></li>
                                <li><a href="shop.html">Bags</a></li>
                                <li><a href="shop.html">Men</a></li>
                                <li><a href="shop.html">Dresses</a></li>
                                <li><a href="shop.html">Women</a></li>
                                <li><a href="shop.html">Jeans</a></li>
                                <li><a href="shop.html">Baby Girl</a></li>
                                <li><a href="shop.html">Shorts</a></li>
                                <li><a href="shop.html">Baby Boys</a></li>
                                <li><a href="shop.html">Blouses & Shirts</a></li>
                                <li><a href="shop.html">Accessories</a></li>
                                <li><a href="shop.html">Blazers</a></li>
                                <li><a href="shop.html">Shoes</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="footer-widget ml-70 mb-40">
                        <h3 class="footer-title">useful links</h3>
                        <div class="footer-info-list">
                            <ul>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="wishlist.html">My Wishlish</a></li>
                                <li><a href="#">Term & Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Track Order</a></li>
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="#">Returns/Exchange</a></li>
                                <li><a href="#">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="footer-widget mb-40 ">
                        <h3 class="footer-title">Contact Us</h3>
                        <div class="contact-info-2">
                            <div class="single-contact-info-2">
                                <div class="contact-info-2-icon">
                                    <i class="icon-call-end"></i>
                                </div>
                                <div class="contact-info-2-content contact-info-2-content-purple">
                                    <p>Got a question? Call us 24/7</p>
                                    <h3 class="purple">{{$contacts->mobile_no}}</h3>
                                </div>
                            </div>
                            <div class="single-contact-info-2">
                                <div class="contact-info-2-icon">
                                    <i class="icon-cursor icons"></i>
                                </div>
                                <div class="contact-info-2-content">
                                    <p>{{$contacts->address}}</p>
                                </div>
                            </div>
                            <div class="single-contact-info-2">
                                <div class="contact-info-2-icon">
                                    <i class="icon-envelope-open "></i>
                                </div>
                                <div class="contact-info-2-content">
                                    <p>{{$contacts->email}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="social-style-1 social-style-1-font-inc social-style-1-mrg-2">
                            <a href="{{$contacts->twitter}}"><i class="icon-social-twitter"></i></a>
                            <a href="{{$contacts->facebook}}"><i class="icon-social-facebook"></i></a>
                            <a href="{{$contacts->instagram}}"><i class="icon-social-instagram"></i></a>
                            <a href="{{$contacts->youtube}}"><i class="icon-social-youtube"></i></a>
                            <a href="{{$contacts->pioneer}}"><i class="icon-social-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom pt-30 pb-30 ">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-6 col-md-6">
                    <div class="payment-img payment-img-right">
                        <a href="#"><img src="assets/images/icon-img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="copyright copyright-center">
                        <p>Copyright © 2020 HasThemes | <a href="https://hasthemes.com/">Built with <span>Norda</span> by HasThemes</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-12 col-sm-12">
                        <div class="tab-content quickview-big-img">
                            <div id="pro-1" class="tab-pane fade show active">
                                <img src="assets/images/product/product-1.jpg" alt="">
                            </div>
                            <div id="pro-2" class="tab-pane fade">
                                <img src="assets/images/product/product-3.jpg" alt="">
                            </div>
                            <div id="pro-3" class="tab-pane fade">
                                <img src="assets/images/product/product-6.jpg" alt="">
                            </div>
                            <div id="pro-4" class="tab-pane fade">
                                <img src="assets/images/product/product-3.jpg" alt="">
                            </div>
                        </div>
                        <div class="quickview-wrap mt-15">
                            <div class="quickview-slide-active nav-style-6">
                                <a class="active" data-toggle="tab" href="#pro-1"><img src="assets/images/product/quickview-s1.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-2"><img src="assets/images/product/quickview-s2.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-3"><img src="assets/images/product/quickview-s3.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-4"><img src="assets/images/product/quickview-s2.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-12 col-sm-12">
                        <div class="product-details-content quickview-content">
                            <h2>Simple Black T-Shirt</h2>
                            <div class="product-ratting-review-wrap">
                                <div class="product-ratting-digit-wrap">
                                    <div class="product-ratting">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                    </div>
                                    <div class="product-digit">
                                        <span>5.0</span>
                                    </div>
                                </div>
                                <div class="product-review-order">
                                    <span>62 Reviews</span>
                                    <span>242 orders</span>
                                </div>
                            </div>
                            <p>Seamlessly predominate enterprise metrics without performance based process improvements.</p>
                            <div class="pro-details-price">
                                <span class="new-price">$75.72</span>
                                <span class="old-price">$95.72</span>
                            </div>
                            <div class="pro-details-color-wrap">
                                <span>Color:</span>
                                <div class="pro-details-color-content">
                                    <ul>
                                        <li><a class="dolly" href="#">dolly</a></li>
                                        <li><a class="white" href="#">white</a></li>
                                        <li><a class="azalea" href="#">azalea</a></li>
                                        <li><a class="peach-orange" href="#">Orange</a></li>
                                        <li><a class="mona-lisa active" href="#">lisa</a></li>
                                        <li><a class="cupid" href="#">cupid</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pro-details-size">
                                <span>Size:</span>
                                <div class="pro-details-size-content">
                                    <ul>
                                        <li><a href="#">XS</a></li>
                                        <li><a href="#">S</a></li>
                                        <li><a href="#">M</a></li>
                                        <li><a href="#">L</a></li>
                                        <li><a href="#">XL</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pro-details-quality">
                                <span>Quantity:</span>
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                                </div>
                            </div>
                            <div class="product-details-meta">
                                <ul>
                                    <li><span>Categories:</span> <a href="#">Woman,</a> <a href="#">Dress,</a> <a href="#">T-Shirt</a></li>
                                    <li><span>Tag: </span> <a href="#">Fashion,</a> <a href="#">Mentone</a> , <a href="#">Texas</a></li>
                                </ul>
                            </div>
                            <div class="pro-details-action-wrap">
                                <div class="pro-details-add-to-cart">
                                    <a title="Add to Cart" href="#">Add To Cart </a>
                                </div>
                                <div class="pro-details-action">
                                    <a title="Add to Wishlist" href="#"><i class="icon-heart"></i></a>
                                    <a title="Add to Compare" href="#"><i class="icon-refresh"></i></a>
                                    <a class="social" title="Social" href="#"><i class="icon-share"></i></a>
                                    <div class="product-dec-social">
                                        <a class="facebook" title="Facebook" href="#"><i class="icon-social-facebook"></i></a>
                                        <a class="twitter" title="Twitter" href="#"><i class="icon-social-twitter"></i></a>
                                        <a class="instagram" title="Instagram" href="#"><i class="icon-social-instagram"></i></a>
                                        <a class="pinterest" title="Pinterest" href="#"><i class="icon-social-pinterest"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->
</div>

<!-- All JS is here
============================================ -->

<script src="{{""}}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="{{""}}/assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="{{""}}/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="{{""}}/assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="{{""}}/assets/js/plugins/slick.js"></script>
<script src="{{""}}/assets/js/plugins/jquery.syotimer.min.js"></script>
<script src="{{""}}/assets/js/plugins/jquery.instagramfeed.min.js"></script>
<script src="{{""}}/assets/js/plugins/jquery.nice-select.min.js"></script>
<script src="{{""}}/assets/js/plugins/wow.js"></script>
<script src="{{""}}/assets/js/plugins/jquery-ui-touch-punch.js"></script>
<script src="{{""}}/assets/js/plugins/jquery-ui.js"></script>
<script src="{{""}}/assets/js/plugins/magnific-popup.js"></script>
<script src="{{""}}/assets/js/plugins/sticky-sidebar.js"></script>
<script src="{{""}}/assets/js/plugins/easyzoom.js"></script>
<script src="{{""}}/assets/js/plugins/scrollup.js"></script>
<script src="{{""}}/assets/js/plugins/ajax-mail.js"></script>

<!-- Use the minified version files listed below for better performance and remove the files listed above
<script src="assets/js/vendor/vendor.min.js"></script>
<script src="assets/js/plugins/plugins.min.js"></script>  -->
<!-- Main JS -->
<script src="{{""}}/assets/js/main.js"></script>

</body>

</html>