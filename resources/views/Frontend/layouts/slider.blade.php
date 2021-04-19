
        <div class="slider-banner-area">
            <div class="container">
                <div class="row">
                      @foreach ($sliders as $slider)
                    <div class="col-lg-8">

                            <div class="slider-area bg-gray mb-30">
                            <div class="hero-slider-active-3 dot-style-2 dot-style-2-position-4 dot-style-2-active-purple">
                                <div class="single-hero-slider single-animation-wrap">

                                        <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="hero-slider-content-1 slider-animated-1 hero-slider-content-1-padding1">
                                                <h4 class="animated font-dec">New Arrivals</h4>
                                                <h1 class="animated font-dec">{{ $slider->short_title }}</h1>
                                                <p class="animated width-inc"> {{ $slider->long_title }}</p>
                                                <div class="btn-style-1">
                                                    <a class="animated btn-1-padding-1 btn-1-bg-purple" href="product-details.html">Explore</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="hm6-hero-slider-img slider-animated-1">
                                                <img class="animated" alt="" src="{{ asset('upload/Slider_images/'.$slider->image) }}" width="848px" height="570px" alt="">
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>


                    </div>
                     @endforeach
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="banner-wrap mb-30">
                                    <div class="banner-img banner-img-zoom">
                                        <a href="product-details.html"><img src="assets/images/banner/banner-14.jpg" alt=""></a>
                                    </div>
                                    <div class="banner-content-13">
                                        <span>20x absorbs</span>
                                        <h2>Triple <br>guards</h2>
                                        <div class="product-available-wrap">
                                            <div class="single-product-available">
                                                <h3>6</h3>
                                                <span>pack</span>
                                            </div>
                                            <div class="single-product-available">
                                                <h3>124</h3>
                                                <span>diapers</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="banner-wrap mb-30">
                                    <div class="banner-img banner-img-zoom">
                                        <a href="product-details.html"><img src="assets/images/banner/banner-15.jpg" alt=""></a>
                                    </div>
                                    <div class="banner-content-14">
                                        <span>ZHnio</span>
                                        <h2>head <br>phone</h2>
                                        <p>new version 3.0 for new era</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
