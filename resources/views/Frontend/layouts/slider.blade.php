
        <div class="slider-banner-area">
            <div class="container">
                @if(Session::get('success'))
                <div class="alert text-white container" style="background: #6f50a7;">
                   {{ Session::get('success') }}
                </div>
              @endif
                <div class="row">
                    <div class="col-sm-12 ml-auto mr-auto">
                         <div class="slider-area bg-gray mb-30 ml-auto mr-auto" >
                             <div class="hero-slider-active-3 dot-style-2 dot-style-2-position-4 dot-style-2-active-purple">
                                 @foreach ($sliders as $slider)
                                 <div class="single-hero-slider single-animation-wrap">
                                     <div class="row">
                                        <div class="col-lg-7 col-md-7 col-sm-6">
                                            <div class="hero-slider-content-1 slider-animated-1 hero-slider-content-1-padding1">
                                                <h4 class="animated font-dec">New Arrivals</h4>
                                                <h2 class="animated font-dec">{{$slider->name }}</h2>
                                                @if(strlen($slider->long_desc) > 150)
                                                    @php($a = explode(' ',$slider->long_desc))
                                                    <p class="animated width-inc">
                                                        @for($i = 0; $i < 20; $i++)
                                                            {{$a[$i]}}
                                                        @endfor
                                                        ....
                                                    </p>
                                                @else
                                                    <p class="animated width-inc">{{$slider->long_desc}}</p>
                                                @endif
                                                <div class="btn-style-1" style="margin-top: -5px">
                                                    <a class="animated btn-1-padding-1 btn-1-bg-purple" href="{{route("product.details",$slider->id)}}">Explore</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-6 pr-1">
                                            <div class="hm6-hero-slider-img slider-animated-1">
                                                <img class="animated p-5" src="{{ asset('upload/products_images/'.$slider->image) }}" style="width: 100%" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 @endforeach
                             </div>
                         </div>
                    </div>

                </div>
            </div>
        </div>
