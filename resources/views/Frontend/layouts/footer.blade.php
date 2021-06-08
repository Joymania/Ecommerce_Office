<div style="background-color:#23035d;color:white" class="subscribe-area-4 pt-115 pb-115">
    <div  class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5">
                <div class="section-title">
                    <h2 style="color:white">keep connected</h2>
                    <p style="color:white">Get updates by subscribe our weekly newsletter</p>
                </div>
            </div>
            <div  class="col-lg-7 col-md-7 ">
                <div style="color:#FF224B" id="mc_embed_signup" class="subscribe-form">
                    <form style="color:white" id="mc-embedded-subscribe-form" class="validate subscribe-form-style" novalidate="" target="_blank" name="mc-embedded-subscribe-form" method="" action="#">
                        <div  id="mc_embed_signup_scroll" class="mc-form">
                            <span ><input  class="email" type="email" required="" placeholder="Enter your email address" name="EMAIL" value=""></span>
                            <div class="mc-news" aria-hidden="true">
                                <input type="text" value="" tabindex="-1" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef">
                            </div>
                            <div  class="clear">
                                <a id="mc-embedded-subscribe" class="btn btn-danger" type="submit" name="subscribe" value="Subscribe">Subscribe</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<footer style="background-color:#25035d;" class="footer-area -4">
    <div class="footer-top border-bottom-4 pb-55">
        <div class="container">
            <div class="row">
                <!-- Quick shop -->
                @if($categories->isNotEmpty())
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="footer-widget mb-40">
                        <h3 style="color:white" class="footer-title">Quick Shop</h3>
                        <div class="footer-info-list info-list-50-parcent">
                            <ul>
                                @foreach($categories as $i => $cat)
                                    @if( $i >= 6 )
                                        @break
                                    @endif
                                    <li ><a style="color:white" href="{{ route('productByCategory', $cat->id) }}">{{ $cat->name }}</a></li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @else
                @endif

                @if($usefuls->isNotEmpty())
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="footer-widget ml-70 mb-40">
                            <h3 style="color:white" class="footer-title">useful links</h3>
                            <div class="footer-info-list">
                                <ul>
                                    @foreach($usefuls as $useful)
                                        <li><a style="color:white" href="{{ $useful->link }}">{{ $useful->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
                
                @if(!empty($contacts))
                <div id="contact" class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="footer-widget mb-40 ">
                        <h3 style="color:white" class="footer-title">Contact Us</h3>
                        <div class="contact-info-2">
                            <div class="single-contact-info-2">
                                <div class="contact-info-2-icon">
                                    <i style="color:white" class="icon-call-end"></i>
                                </div>
                                <div class="contact-info-2-content contact-info-2-content-purple">
                                    <p style="color:white">Got a question? Call us 24/7</p>
                                    <h3 style="color:white" class="purple">{{ $contacts->mobile_no }}</h3>
                                </div>
                            </div>
                            <div class="single-contact-info-2">
                                <div class="contact-info-2-icon">
                                    <i style="color:white" class="icon-cursor icons"></i>
                                </div>
                                <div class="contact-info-2-content">
                                    <p style="color:white">{{ $contacts->address }}</p>
                                </div>
                            </div>
                            <div class="single-contact-info-2">
                                <div class="contact-info-2-icon">
                                    <i style="color:white" class="icon-envelope-open "></i>
                                </div>
                                <div class="contact-info-2-content">
                                    <p style="color:white" >{{ $contacts->email }}</p>
                                </div>
                            </div>
                        </div>
                        <div  class="social-style-1 social-style-1-font-inc social-style-1-mrg-2">
                            @if($contacts->twitter)
                                <a target="_blank" href="{{$contacts->twitter}}"><i style="color:white" class="icon-social-twitter"></i></a>
                            @endif
                            @if($contacts->facebook)
                                <a target="_blank" href="{{$contacts->facebook}}"><i style="color:white" class="icon-social-facebook"></i></a>
                            @endif
                            @if($contacts->instagram)
                                <a target="_blank" href="{{$contacts->instagram}}"><i style="color:white" class="icon-social-instagram"></i></a>
                            @endif
                            @if($contacts->youtube)
                                <a target="_blank" href="{{$contacts->youtube}}"><i style="color:white" class="icon-social-youtube"></i></a>
                            @endif
                            @if($contacts->pioneer)
                                <a target="_blank" href="{{$contacts->pioneer}}"><i style="color:white" class="icon-social-pinterest"></i></a>
                            @endif

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
                        {{-- <p style="color:white">Copyright © 2020 HasThemes | <a style="color:white" href="https://hasthemes.com/">Built with <span>Norda</span> by HasThemes</a>.</p>--}}
                        @if(!empty($copyright))
                            <p style="color:white">{!! $copyright->title !!}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Modal Starts here--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content m-auto" id="modal-content" style="width: 100%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Track Your Order</h5>
                </div>
                <div class="modal-body m-0" style="margin-top: -10% !important;">
                    <label for="order_code"></label>
                    <input type="text" class="form-control" name="order_code" id="order_code" placeholder="Give your order code!!" autocomplete="off">
                    <button type="button" id="tracking-button" class="btn btn-primary mt-2">Track Order</button>

                    <div style="background: #FFF3CD" id="status" hidden>
                        <h4 class="text-center mt-2" id="status-text" style="padding: 10px 0"></h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="closeBtn" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{--Modal ends here--}}
</footer>

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

<script !src="">
    $('#exampleModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>

<!-- Use the minified version files listed below for better performance and remove the files listed above
<script src="assets/js/vendor/vendor.min.js"></script>
<script src="assets/js/plugins/plugins.min.js"></script>  -->
<!-- Main JS -->
<script src="{{""}}/assets/js/main.js"></script>
<script src="{{""}}/js/search.js"></script>
<script src="{{asset('js/search.js')}}"></script>
<script src="{{asset('js/order_tracking.js')}}"></script>
<script src="{{asset('js/home.js')}}"></script>
<script !src="">
    $(document).ready(function(){
        $('#trackYourOrderBtn').on('click',function () {
            $('#modal-content').css('width','50%');
        });

        $('#mobileViewOrderTrackingBtn').on('click',function () {
                $('#modal-content').css('width','100%');
                document.getElementById('sidebar-close').click();
        })

        $('#footerOrderTrackingBtn').on('click',function () {
            if(window.matchMedia("(max-width: 767px)").matches){
                $('#modal-content').css('width','100%');
            }else{
                $('#modal-content').css('width','45%');
            }
        });
    });

    $(document).ready(function () {

    });
</script>
@yield('scripts')
</body>

</html>
