<div class="subscribe-area bg-gray-4 pt-115 pb-115">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5">
                <div class="section-title">
                    <h2>keep connected</h2>
                    <p>Get updates by subscribe our weekly newsletter</p>
                </div>
            </div>
            <div class="col-lg-7 col-md-7">
                <div id="mc_embed_signup" class="subscribe-form">
                    <form id="mc-embedded-subscribe-form" class="validate subscribe-form-style" novalidate="" target="_blank" name="mc-embedded-subscribe-form" method="post" action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef">
                        <div id="mc_embed_signup_scroll" class="mc-form">
                            <input class="email" type="email" required="" placeholder="Enter your email address" name="EMAIL" value="">
                            <div class="mc-news" aria-hidden="true">
                                <input type="text" value="" tabindex="-1" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef">
                            </div>
                            <div class="clear">
                                <input id="mc-embedded-subscribe" class="button" type="submit" name="subscribe" value="Subscribe">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer-area bg-gray-4">
    <div class="footer-top border-bottom-4 pb-55">
        <div class="container">
            <div class="row">
                <!-- Quick shop -->
                @if($categories->isNotEmpty())
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="footer-widget mb-40">
                        <h3 class="footer-title">Quick Shop</h3>
                        <div class="footer-info-list info-list-50-parcent">
                            <ul>
                                @foreach($categories as $i => $cat)
                                    @if( $i >= 6 )
                                        @break
                                    @endif
                                    <li><a href="{{ route('search.result') }}">{{ $cat->name }}</a></li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @else
                @endif

                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="footer-widget ml-70 mb-40">
                        <h3 class="footer-title">useful links</h3>
                        <div class="footer-info-list">
                            <ul>
                                <li><a href="{{ route('userAccount') }}">My Account</a></li>
                                <li><a href="{{ route('wishlist.view') }}">My Wishlist</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="{{ route('track.show') }}">Track Order</a></li>
                                <li><a href="{{ route('search.result') }}">Shop</a></li>
                                <li><a href="{{ route('about_us') }}">About Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                @if(!empty($contacts))
                <div id="contact" class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="footer-widget mb-40 ">
                        <h3 class="footer-title">Contact Us</h3>
                        <div class="contact-info-2">
                            <div class="single-contact-info-2">
                                <div class="contact-info-2-icon">
                                    <i class="icon-call-end"></i>
                                </div>
                                <div class="contact-info-2-content contact-info-2-content-purple">
                                    <p>Got a question? Call us 24/7</p>
                                    <h3 class="purple">{{ $contacts->mobile_no }}</h3>
                                </div>
                            </div>
                            <div class="single-contact-info-2">
                                <div class="contact-info-2-icon">
                                    <i class="icon-cursor icons"></i>
                                </div>
                                <div class="contact-info-2-content">
                                    <p>{{ $contacts->address }}</p>
                                </div>
                            </div>
                            <div class="single-contact-info-2">
                                <div class="contact-info-2-icon">
                                    <i class="icon-envelope-open "></i>
                                </div>
                                <div class="contact-info-2-content">
                                    <p>{{ $contacts->email }}</p>
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

                @else
                <p>No contact data available!</p>
                @endif
            </div>
        </div>
    </div>

    <div class="footer-bottom pt-30 pb-30 ">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-6 col-md-6">
                    <div class="payment-img payment-img-right">
                        <a href="#"><img src="{{ asset('') }}assets/images/icon-img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="copyright copyright-center">
                        {{-- <p>Copyright © 2020 HasThemes | <a href="https://hasthemes.com/">Built with <span>Norda</span> by HasThemes</a>.</p>--}}
                        @if(!empty($copyright))
                            <p>{!! $copyright->title !!}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

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
<script src="{{""}}/js/search.js"></script>
<script src="{{asset('js/search.js')}}"></script>
@yield('scripts')

</body>

</html>
