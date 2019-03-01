@extends('frontend_layout')
@section('content')
<div class="col-md-12" align="center">
    @if(Session::has('message'))
    {{ Session::get('message') }}
    @endif
</div>
<div class="tp-banner-container">
  <div class="tp-banner" >
   <ul>
    <li data-transition="fade" data-slotamount="7" data-masterspeed="500">
        <img src="{{ asset('resources/assets/image/carousel1.jpg') }}"data-fullwidthcentering="on" alt="slide-1" data-bgfit="cover" data-bgposition="center bottom" data-bgrepeat="no-repeat" /> 
        <div class="tp-caption base-color font-size-60 font-weight-800 sft" data-y="155" data-x="center" data-hoffset="0" data-speed="500" data-start="1000" data-endspeed="500" data-easing="Back.easeOut" data-endeasing="easeOutElastic">WWW Product </div>
        <div style="color:white" class="tp-caption font-size-36 font-weight-600 sft" data-y="235" data-x="center" data-hoffset="0" data-speed="500" data-start="1500" data-endspeed="500" data-easing="Back.easeOut" data-endeasing="easeOutElastic">Make Your Bussiness now </div>
        <div class="tp-caption sfb"
        data-y="310"
        data-x="center"
        data-hoffset="0"
        data-speed="500"
        data-start="2000"
        data-endspeed="500"
        data-easing="Back.easeOut"
        data-endeasing="easeOutElastic">
        <a href="{{ route('register') }}" class="btn btn-Nesto">Register Now <i class="fa fa-sign-in"></i></a>
    </div>
</li>
<li data-transition="fade" data-slotamount="7" data-masterspeed="500">
    <img src="{{ asset('resources/assets/image/carousel2.jpg') }}"
    data-fullwidthcentering="on"
    alt="slide-2"
    data-bgfit="cover"
    data-bgposition="center center"
    data-bgrepeat="no-repeat" />
    <div class="tp-caption sfb"
    data-x="center"
    data-y="90"
    data-speed="700"
    data-start="1000"
    data-easing="linear">
    <img src="{{ asset('resources/assets/image/networking.png') }}" alt="iMac image" />
</div>
<div class="tp-caption uppercase medium_bg_asbestos sfl"
data-x="left" data-hoffset="20"
data-y="113"
data-speed="500"
data-start="1900"
data-endspeed="500"
data-easing="Back.easeOut"
data-endeasing="easeOutElastic">
More Link
</div>
<div class="tp-caption uppercase medium_bg_asbestos sfl"
data-x="left" data-hoffset="20"
data-y="153"
data-speed="500"
data-start="1900"
data-endspeed="500"
data-easing="Back.easeOut"
data-endeasing="easeOutElastic">
More Friend
</div>
<div class="tp-caption uppercase medium_bg_asbestos sfl"
data-x="left" data-hoffset="20"
data-y="193"
data-speed="500"
data-start="1900"
data-endspeed="500"
data-easing="Back.easeOut"
data-endeasing="easeOutElastic">
Awesome Bussiness
</div>
<div class="tp-caption uppercase medium_bg_asbestos sfl"
data-x="left" data-hoffset="20"
data-y="233"
data-speed="500"
data-start="1900"
data-endspeed="500"
data-easing="Back.easeOut"
data-endeasing="easeOutElastic">
awesome revolution
</div>
<div class="tp-caption uppercase medium_bg_asbestos sfl"
data-x="left" data-hoffset="20"
data-y="273"
data-speed="500"
data-start="1900"
data-endspeed="500"
data-easing="Back.easeOut"
data-endeasing="easeOutElastic">
effective
</div>
<div class="tp-caption uppercase medium_bg_asbestos sfl"
data-x="left" data-hoffset="20"
data-y="313"
data-speed="500"
data-start="1900"
data-endspeed="500"
data-easing="Back.easeOut"
data-endeasing="easeOutElastic">
Touch and life
</div>
<div class="tp-caption uppercase medium_bg_asbestos sfl"
data-x="left" data-hoffset="20"
data-y="353"
data-speed="500"
data-start="1900"
data-endspeed="500"
data-easing="Back.easeOut"
data-endeasing="easeOutElastic">
support to your network
</div>
<div class="tp-caption uppercase medium_bg_asbestos sfr"
data-x="right" data-hoffset="-20"
data-y="153"
data-speed="500"
data-start="1900"
data-endspeed="500"
data-easing="Back.easeOut"
data-endeasing="easeOutElastic">
well documented
</div>
<div class="tp-caption uppercase medium_bg_asbestos sfr"
data-x="right" data-hoffset="-20"
data-y="193"
data-speed="500"
data-start="1900"
data-endspeed="500"
data-easing="Back.easeOut"
data-endeasing="easeOutElastic">
Product ready
</div>
<div class="tp-caption uppercase medium_bg_asbestos sfr"
data-x="right" data-hoffset="-20"
data-y="233"
data-speed="500"
data-start="1900"
data-endspeed="500"
data-easing="Back.easeOut"
data-endeasing="easeOutElastic">
low Pricing
</div>
<div class="tp-caption uppercase medium_bg_asbestos sfr"
data-x="right" data-hoffset="-20"
data-y="273"
data-speed="500"
data-start="1900"
data-endspeed="500"
data-easing="Back.easeOut"
data-endeasing="easeOutElastic">
career optimized
</div>
<div class="tp-caption uppercase medium_bg_asbestos sfr"
data-x="right" data-hoffset="-20"
data-y="313"
data-speed="500"
data-start="1900"
data-endspeed="500"
data-easing="Back.easeOut"
data-endeasing="easeOutElastic">
easy for beginners
</div>
<div class="tp-caption uppercase medium_bg_asbestos sfr"
data-x="right" data-hoffset="-20"
data-y="353"
data-speed="500"
data-start="1900"
data-endspeed="500"
data-easing="Back.easeOut"
data-endeasing="easeOutElastic">
valid contact
</div>
</li>
</ul>
</div>
</div>

@if($list_data_promo->count())
<section id="intro-section">
    <div class="container">
        <div class="row">
            <div class="home-boxes-wrapper">
                @foreach($list_data_promo as $data)
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="feature-box-style1">
                        <div class="box-container">
                            <div class="feature-box-image">
                                <?php if ($data->image !=""): ?>
                                    <img src="{{asset('resources/assets/image/landing_page')}}/{{$data->id}}/{{$data->image}}" alt="Documentation Image"/>
                                <?php else: ?>
                                    <img src="{{asset('resources/assets/image')}}/no_photo.png">
                                <?php endif ?>
                            </div>
                            <div class="feature-box-icon">
                                <i class="fa fa-book"></i>
                            </div>
                            <div class="feature-box-containt">
                                <p>{{ str_limit($data->description, $limit = 100, $end = '...') }}</p>
                                <a href="{{ route('detail_content', $data->id) }}" title="Read More">Read More</a>
                            </div>
                            <div class="feature-box-subtitle">
                                {{ str_limit($data->created_at, $limit = 10) }}
                            </div>
                            <div class="feature-box-title">
                                <h4>{{ str_limit($data->title, $limit = 15) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

@if($list_data_product->count())
<section id="product-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <div class="main-title">
                        Our Product
                    </div>
                    <div class="desc-title">
                     When you get right down to it, success is all about value and trust.
                 </div>
             </div>
         </div>
         @foreach($list_data_product as $data)
         <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="feature-box-style2" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:500}">
                <div class="feature-box-icon">
                    <i class="fa fa-money"></i>
                </div>
                <div class="feature-box-containt">
                    <a href="{{ route('detail_content', $data->id) }}"><h4>{{ str_limit($data->title, $limit = 15) }}</h4></a>
                    <p>{{ str_limit($data->description, $limit = 100, $end = '...') }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</section>
@endif

<section id="counters-section">
    <div class="container">
        <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="feature-box-style3" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:500}">
                <div class="feature-box-icon">
                    <i class="fa fa-user"></i>
                </div>
                <div class="feature-box-number">
                    <span>{{ $total_user }}</span>
                </div>
                <div class="feature-box-title">
                    Clients
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="feature-box-style3" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:500}">
                <div class="feature-box-icon">
                    <i class="fa fa-user"></i>
                </div>
                <div class="feature-box-number">
                    <span>{{ $total_product }}</span>
                </div>
                <div class="feature-box-title">
                    Product
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="feature-box-style3" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:500}">
                <div class="feature-box-icon">
                    <i class="fa fa-user"></i>
                </div>
                <div class="feature-box-number">
                    <span>{{ $total_testimonial }}</span>
                </div>
                <div class="feature-box-title">
                    Testimonial
                </div>
            </div>
        </div>
    </div>
</section>

<section id="portfolio-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <div class="main-title">
                        Our Work
                    </div>
                    <div class="desc-title">
                        We’re in the business of big ideas, here are some of our latest and greatest.
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="portfolioFilter">
                    <ul>
                        <li>
                            <a href="#" class="selected" data-filter=".home-port-gallery">Gallery</a>
                        </li>
                        <li>
                            <a href="#" data-filter=".home-port-testimonial">Testimonial</a>
                        </li>
                        <li>
                            <a href="#" data-filter=".home-port-company">Company</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="portfolio-grid">
                @if($list_gallery_data_gallery != "")
                @foreach($list_gallery_data_gallery as $data)
                <div class="portfolio-item col-md-4 col-sm-6 col-xs-12 home-port-gallery">
                    <div class="img-figure-overlayer">
                        <a class="fancybox" title="Amazing Tiger" href="{{asset('resources/assets/image/gallery')}}/{{$data[0]->original_name}}">
                            <i class="fa fa-search-plus"></i>
                        </a>
                    </div>
                    <div class="img-figure">
                        <img src="{{asset('resources/assets/image/gallery')}}/{{$data[0]->original_name}}" alt="work 1" />
                    </div>
                </div>
                @endforeach
                @endif

                @if($list_gallery_data_testimonial != "")
                @foreach($list_gallery_data_testimonial as $data)
                <div class="portfolio-item col-md-4 col-sm-6 col-xs-12 home-port-testimonial">
                    <div class="img-figure-overlayer">
                        <a class="fancybox" title="Smoke Apple" href="{{asset('resources/assets/image/gallery')}}/{{$data[0]->original_name}}">
                            <i class="fa fa-search-plus"></i>
                        </a>
                    </div>
                    <div class="img-figure">
                        <img src="{{asset('resources/assets/image/gallery')}}/{{$data[0]->original_name}}" alt="work 2" />
                    </div>
                </div>
                @endforeach
                @endif

                @if($list_gallery_data_company != "")
                @foreach($list_gallery_data_company as $data)
                <div class="portfolio-item col-md-4 col-sm-6 col-xs-12 home-port-company">
                    <div class="img-figure-overlayer">
                        <a class="fancybox-media" title="Angry Bear" href="{{asset('resources/assets/image/gallery')}}/{{$data[0]->original_name}}">
                            <i class="fa fa-search-plus"></i>
                        </a>
                    </div>
                    <div class="img-figure">
                        <img src="{{asset('resources/assets/image/gallery')}}/{{$data[0]->original_name}}" alt="work 3" />
                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </div>
    </div>
</section>

<section id="pricing-section">
    <div class="container">
        <div class="col-md-1 col-sm-2 col-xs-2">
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="pricing-box" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:300}">
                <div class="price">
                    <h3>Package 1</h3>
                    <h1>IDR <span>/ 100.000</span></h1>
                </div>
                <ul>
                    <li><b>Free 1</b> Product</li>
                    <li><b>Get Payment</b> from 1 child left</li>
                    <li><b>Get Payment</b> from 1 child Right</li>
                    <li><b>Get Bonus</b> at the end of year</li>
                </ul>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="feature-pricing-box">
                <div class="price">
                    <h3>Package Deluxe</h3>
                    <h1>IDR <span>/ 450.000</span></h1>
                </div>
                <ul>
                    <li><b>Free 5</b> Product</li>
                    <li><b>Get Payment</b> from 20 child left</li>
                    <li><b>Get Payment</b> from 20 child Right</li>
                    <li><b>Get Bonus</b> at the middle of year </li>
                    <li><b>Get Bonus</b> at the end of year </li>
                </ul>
                <!-- <a class="btn btn-md btn-Nesto-o" href="javascript:void(0)">Sign up</a> -->
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="pricing-box" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:700}">
                <div class="price">
                    <h3>Package 3</h3>
                    <h1>IDR <span>/ 250.000</span></h1>
                </div>
                <ul>
                    <li><b>Free 3</b> Product</li>
                    <li><b>Get Payment</b> from 3 child left</li>
                    <li><b>Get Payment</b> from 3 child Right</li>
                    <li><b>Get Bonus</b> at the middle of year </li>
                    <li><b>Get Bonus</b> at the end of year</li>
                </ul>
            </div>
        </div>
        <div class="col-md-1 col-sm-2 col-xs-2">
        </div>
    </div>
</section>



<section id="monials-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <div class="main-title">
                        What Clients Say
                    </div>
                    <div class="desc-title">
                        Our main objective in everything we do, is satisfying our clients.
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                @if($list_gallery_data_company != "")
                @foreach($list_data_testimonial as $data)
                <div class="col-md-12" data-uk-scrollspy="{cls:'uk-animation-slide-left', delay:500}">
                    <div class="monials-block-left">
                        <div class="client-img">
                            <?php if ($data->image !=""): ?>
                                <img src="{{asset('resources/assets/image/landing_page')}}/{{$data->id}}/{{$data->image}}" alt="client"/>
                            <?php else: ?>
                                <img src="{{asset('resources/assets/image')}}/no_photo.png">
                            <?php endif ?>                            
                        </div>
                        <div class="client-name">{{ str_limit($data->title, $limit = 15) }}</div>
                        <div class="containt">
                            <p>{{ str_limit($data->description, $limit = 250), $end = '...' }}</p>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

<section id="client-slider-section">
    <div class="container">
        <div class="row">
            <div id="owl-clients">
                <div class="client-logo">
                    <img src="{{asset('resources/assets/image/client1.png')}}" alt="Client Logo" />
                </div>
                <div class="client-logo">
                    <img src="{{asset('resources/assets/image/client2.jpg')}}" alt="Client Logo" />
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <div class="main-title">
                        Contact Us
                    </div>
                    <div class="desc-title">
                     Submit a tip or just say hello, big or small, we've got a solution when you need it.
                 </div>
             </div>
         </div>
         <form role="form" id="form" class="contactForm" method="post" action="{{route('contact_us') }}">
            <div class="col-md-6">
                <div class="form-group" data-uk-scrollspy="{cls:'uk-animation-slide-left', delay:500}">
                    <div class="controls">
                        <input type="text" class="form-control requiredField" placeholder="Your name" name="name">
                    </div>
                </div>
                <div class="form-group" data-uk-scrollspy="{cls:'uk-animation-slide-left', delay:500}">
                    <div class="controls">
                        <input type="email" class="form-control email requiredField" placeholder="Your email" name="email">
                    </div>
                </div>
                <div class="form-group" data-uk-scrollspy="{cls:'uk-animation-slide-left', delay:500}">
                    <div class="controls">
                        <input type="text" class="form-control requiredField" placeholder="Subject" name="subject">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group" data-uk-scrollspy="{cls:'uk-animation-slide-right', delay:500}">
                    <div class="controls">
                        <textarea rows="10" class="form-control requiredField" placeholder="Your message" name="message"></textarea>
                    </div>
                </div>
                <div  data-uk-scrollspy="{cls:'uk-animation-slide-right', delay:500}">
                    <button type="submit" class="btn btn-lg btn-nesto submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
</section>

<section id="map-section">
    <div id="map"></div>
</section> 
@section('include_js_content')
<script type="text/javascript" src="{{ asset('resources/assets/js/frontend/vendor/modernizr.custom.js') }}"></script>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="{{ asset('resources/assets/js/frontend/plugins/gmaps.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/js/frontend/style.js') }}"></script>
@stop
@stop