@extends('Frontend.layouts.master')

@section('content')
        <div class="breadcrumb-area bg-gray">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li class="active">about us </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="about-us-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        @if($logos)
                        <div class="about-us-logo">
                        <a href="{{'/'}}"><img src=" {{ asset($logos->image) }} " height="100px" width="150px" alt="logo"></a>
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="about-us-content">
                            <h3>Introduce</h3>
                            <p>Norda store is a business concept is to offer fashion and quality at the best price. It has since it was founded in 2018 grown into one of the best WooCommerce Fashion Theme. The content of this site is copyright-protected and is the property of David Moye Creative.</p>
                            <div class="signature">
                                <h2>David Moye</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="service-area pb-120">
            <div class="container">
                <div class="service-wrap-border service-wrap-padding-3">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 service-border-1">
                            <div class="single-service-wrap-2 mb-30">
                                <div class="service-icon-2 icon-red">
                                    <i class="icon-cursor"></i>
                                </div>
                                <div class="service-content-2">
                                    <h3>Free Shipping</h3>
                                    <p>Oders over 4999 TK.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 service-border-1 service-border-1-none-md">
                            <div class="single-service-wrap-2 mb-30">
                                <div class="service-icon-2 icon-red">
                                    <i class="icon-refresh "></i>
                                </div>
                                <div class="service-content-2">
                                    <h3>90 Days Return</h3>
                                    <p>For any problems</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 service-border-1">
                            <div class="single-service-wrap-2 mb-30">
                                <div class="service-icon-2 icon-red">
                                    <i class="icon-credit-card "></i>
                                </div>
                                <div class="service-content-2">
                                    <h3>Secure Payment</h3>
                                    <p>100% Guarantee</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="single-service-wrap-2 mb-30">
                                <div class="service-icon-2 icon-red">
                                    <i class="icon-earphones "></i>
                                </div>
                                <div class="service-content-2">
                                    <h3>24h Support</h3>
                                    <p>Dedicated support</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="team-area pb-90">
            <div class="container">
                <div class="section-title mb-45 text-center">
                    <h2>Team Members</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-wrapper mb-30">
                            <div class="team-img">
                                <img src="assets/images/team/team-1.jpg" alt="">
                                <div class="team-action">
                                    <a class="facebook" href="#">
                                        <i class="social_facebook"></i>
                                    </a>
                                    <a class="twitter" href="#">
                                        <i class="social_twitter"></i>
                                    </a>
                                    <a class="instagram" href="#">
                                        <i class="social_instagram"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h4>Mr. Mike Banding</h4>
                                <span>Manager </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-wrapper mb-30">
                            <div class="team-img">
                                <img src="assets/images/team/team-2.jpg" alt="">
                                <div class="team-action">
                                    <a class="facebook" href="#">
                                        <i class="social_facebook"></i>
                                    </a>
                                    <a class="twitter" href="#">
                                        <i class="social_twitter"></i>
                                    </a>
                                    <a class="instagram" href="#">
                                        <i class="social_instagram"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h4>Mr. Peter Pan</h4>
                                <span>Developer </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-wrapper mb-30">
                            <div class="team-img">
                                <img src="assets/images/team/team-3.jpg" alt="">
                                <div class="team-action">
                                    <a class="facebook" href="#">
                                        <i class="social_facebook"></i>
                                    </a>
                                    <a class="twitter" href="#">
                                        <i class="social_twitter"></i>
                                    </a>
                                    <a class="instagram" href="#">
                                        <i class="social_instagram"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h4>Ms. Sophia</h4>
                                <span>Designer </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-wrapper mb-30">
                            <div class="team-img">
                                <img src="assets/images/team/team-4.jpg" alt="">
                                <div class="team-action">
                                    <a class="facebook" href="#">
                                        <i class="social_facebook"></i>
                                    </a>
                                    <a class="twitter" href="#">
                                        <i class="social_twitter"></i>
                                    </a>
                                    <a class="instagram" href="#">
                                        <i class="social_instagram"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h4>Mr. John Lee</h4>
                                <span>Chairmen </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonial-area bg-gray-3 pt-115 pb-115">
            <div class="container">
                <div class="section-title mb-45 text-center">
                    <h2>Testimonials</h2>
                </div>
                <div class="testimonial-active-2 dot-style-2 dot-style-2-position-static">
                    <div class="single-testimonial-2 text-center">
                        <div class="testimonial-img">
                            <img alt="" src="assets/images/testimonial/client-1.png">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                        <div class="client-info">
                            <h5>Anna Miller</h5>
                            <span>Deginer</span>
                        </div>
                    </div>
                    <div class="single-testimonial-2 text-center">
                        <div class="testimonial-img">
                            <img alt="" src="assets/images/testimonial/client-1.png">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo.</p>
                        <div class="client-info">
                            <h5>Anna Miller</h5>
                            <span>Deginer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="brand-logo-area pt-120 pb-80">
            <div class="container">
                <div class="brand-logo-wrap-2">
                    <div class="single-brand-logo-2 mb-30">
                        <img src="assets/images/brand-logo/brand-logo-6.png" alt="brand-logo">
                    </div>
                    <div class="single-brand-logo-2 mb-30">
                        <img src="assets/images/brand-logo/brand-logo-7.png" alt="brand-logo">
                    </div>
                    <div class="single-brand-logo-2 mb-30">
                        <img src="assets/images/brand-logo/brand-logo-8.png" alt="brand-logo">
                    </div>
                    <div class="single-brand-logo-2 mb-30">
                        <img src="assets/images/brand-logo/brand-logo-9.png" alt="brand-logo">
                    </div>
                    <div class="single-brand-logo-2 mb-30">
                        <img src="assets/images/brand-logo/brand-logo-10.png" alt="brand-logo">
                    </div>
                    <div class="single-brand-logo-2 mb-30">
                        <img src="assets/images/brand-logo/brand-logo-11.png" alt="brand-logo">
                    </div>
                </div>
            </div>
        </div>
@endsection