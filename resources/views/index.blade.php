@extends('layout.app')
@section('home-status','active')
@section('body')

<style>
    ul.list {
        height: 130px;
        overflow-y: auto !important;
    }
</style>

<!-- slider_area_start -->
<div class="slider_area">
    <div class="single_slider  d-flex align-items-center slider_bg_1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-10 offset-xl-1">
                    <div class="slider_text text-center justify-content-center">
                        <h3>Find your best Property</h3>
                        <p>Esteem spirit temper too say adieus who direct esteem.</p>
                    </div>
                    <div class="property_form">
                        <form>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form_wrap d-flex">
                                        <div class="single-field max_width ">
                                            <label for="#">Location</label>
                                            <input class="form-control" type="text" id="zone-search" value="">
                                            <ul class="bg-light text-dark" id="showing-zone"></ul>
                                        </div>
                                        <div class="single-field min_width">
                                            <label for="#">Categroy</label>
                                            <select class="wide" type="text" id="category-search">
                                                <option value="apartment">apartment</option>
                                                <option value="sublet">sublet</option>
                                                <option value="office space">office space</option>
                                            </select>
                                            <ul class="bg-light text-dark" id="showing-zone"></ul>
                                        </div>
                                        <div class="single_field range_slider">
                                            <label for="#">Price ($)</label>
                                            <div id="slider"></div>
                                        </div>
                                        <div class="single-field min_width">
                                            <label for="#">Bed Room</label>
                                            <select class="wide" id="bed-search">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        <div class="single-field min_width ">
                                            <label for="#">Bath Room</label>
                                            <select class="wide" id="bath-search">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        <div class="serach_icon">
                                            <a href="javascript:void(0)" id="search">
                                                <i class="ti-search"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider_area_end -->

<!-- search_apartment  -->
<div class="popular_property" id="search_apartment_div" style="display: none">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-40 text-center">
                    <h3>Searched Apertments</h3>
                </div>
            </div>
        </div>
        <div class="row" id="search_apartment">

        </div>
    </div>
</div>
<!-- /search_apartment  -->

<!-- popular_property  -->
@if (count($apartments)>0)
<div class="popular_property">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-40 text-center">
                    <h3>Popular Properties</h3>
                </div>
            </div>
            @php
                $i = 1;
            @endphp
            @foreach ($apartments as $apartment)
            <div class="col-xl-4 col-md-6 col-lg-4">
                <div class="single_property">
                    <div class="property_thumb">
                        <div class="property_tag">
                            For Rent
                        </div>
                        @if ($apartment->featureImage)
                        <img src="{{asset('Apartment photoes/'.$apartment->featureImage->image)}}" alt="">
                        @else
                        <img src="" alt="">
                        @endif
                    </div>
                    <div class="property_content">
                        <div class="main_pro">
                            <h3><a href="{{url('apartment-details/'.$apartment->id)}}">Comfortable Apartment in
                                    {{$apartment->zone}}</a></h3>
                            <div class="mark_pro">
                                <img src="{{asset('assets/realstate')}}/img/svg_icon/location.svg" alt="">
                                <span>Popular Properties</span>
                            </div>
                            <span class="amount">From {{$apartment->apartment_rent}}</span>
                        </div>
                    </div>
                    <div class="footer_pro">
                        <ul>
                            <li>
                                <div class="single_info_doc">
                                    <img src="{{asset('assets/realstate')}}/img/svg_icon/square.svg" alt="">
                                    <span>{{$apartment->apartment_size}}</span>
                                </div>
                            </li>
                            <li>
                                <div class="single_info_doc">
                                    <img src="{{asset('assets/realstate')}}/img/svg_icon/bed.svg" alt="">
                                    <span>{{$apartment->total_bed}}</span>
                                </div>
                            </li>
                            <li>
                                <div class="single_info_doc">
                                    <img src="{{asset('assets/realstate')}}/img/svg_icon/bath.svg" alt="">
                                    <span>{{$apartment->total_bath}}</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @if ($i == 6)
                @break
            @endif
            @php
                $i++
            @endphp
            @endforeach
        </div>
    </div>
</div>
@endif
<!-- /popular_property  -->

<!-- home_details  -->
@if (count($apartments)>0)
<div class="home_details">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="home_details_active owl-carousel">
                    @foreach ($apartments as $apartment)
                    <div class="single_details">
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="modern_home_info">
                                    <div class="modern_home_info_inner">
                                        <span class="for_sale">
                                            For Rent
                                        </span>
                                        <div class="info_header">
                                            <h3>{{$apartment->flat_name}}</h3>
                                            <div class="popular_pro d-flex">
                                                <img src="@if($apartment->featureImage)
                                                {{asset('Apartment photoes/'.$apartment->featureImage->image)}}
                                                @endif"
                                                    alt="">
                                                <span>Popular Apartment</span>
                                            </div>
                                        </div>
                                        <div class="info_content">
                                            <ul>
                                                <li> <img src="{{asset('assets/realstate')}}/img/svg_icon/square.svg"
                                                        alt=""> <span>{{$apartment->apartment_size}}</span> </li>
                                                <li> <img src="{{asset('assets/realstate')}}/img/svg_icon/bed.svg"
                                                        alt=""> <span>{{$apartment->total_bed}} Bed</span> </li>
                                                <li> <img src="{{asset('assets/realstate')}}/img/svg_icon/bath.svg"
                                                        alt=""> <span>{{$apartment->total_bath}} Bath</span> </li>
                                            </ul>
                                        <p style="word-break: break-all;">{{{$apartment->apartment_description}}}</p>
                                            <div
                                                class="prise_view_details d-flex justify-content-between align-items-center">
                                                <span>BDT {{$apartment->apartment_rent}}</span>
                                                <a class="boxed-btn3-line" href="{{url('apartment-details/'.$apartment->id)}}">View Details</a>
                                            </div>
                                        </div>
                                    </div>
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
@endif
<!-- /home_details  -->

<!-- counter_area  -->
<div class="counter_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-4">
                <div class="single_counter">
                    <h3> <span class="counter">200</span> <span>+</span> </h3>
                    <p>Properties for sale</p>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_counter">
                    <h3> <span class="counter">300</span></h3>
                    <p>Properties for sale</p>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_counter">
                    <h3> <span class="counter">15</span></h3>
                    <p>Properties for sale</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /counter_area  -->

<!-- contact_action_area  -->
<div class="contact_action_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-7">
                <div class="action_heading">
                    <h3>Add your property for sale</h3>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="call_add_action">
                    <span>+10 637 367 4567</span>
                    <a href="#" class="boxed-btn3-line">Add Property</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /contact_action_area  -->

<!-- footer start -->
<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <div class="footer_logo">
                            <a href="#">
                                <img src="{{asset('assets/realstate')}}/img/footer_logo.png" alt="">
                            </a>
                        </div>
                        <p>
                            <a href="#">conbusi@support.com</a> <br>
                            +10 873 672 6782 <br>
                            600/D, Green road, NewYork
                        </p>
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ti-twitter-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Services
                        </h3>
                        <ul>
                            <li><a href="#">Marketing & SEO</a></li>
                            <li><a href="#"> Startup</a></li>
                            <li><a href="#">Finance solution</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Travel</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-2">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Useful Links
                        </h3>
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#"> Contact</a></li>
                            <li><a href="#">Appointment</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Subscribe
                        </h3>
                        <form action="#" class="newsletter_form">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit">Subscribe</button>
                        </form>
                        <p class="newsletter_text">Esteem spirit temper too say adieus who direct esteem esteems
                            luckily.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/ footer end  -->
@endsection


@section('page-js')
<script>
    function collision($div1, $div2) {
        var x1 = $div1.offset().left;
        var w1 = 40;
        var r1 = x1 + w1;
        var x2 = $div2.offset().left;
        var w2 = 40;
        var r2 = x2 + w2;

        if (r1 < x2 || x1 > r2)
            return false;
        return true;
    }
    // Fetch Url value
    var getQueryString = function (parameter) {
        var href = window.location.href;
        var reg = new RegExp('[?&]' + parameter + '=([^&#]*)', 'i');
        var string = reg.exec(href);
        return string ? string[1] : null;
    };
    // End url
    // // slider call
    $('#slider').slider({
        range: true,
        min: 4000,
        max: 40000,
        step: 1,
        values: [getQueryString('minval') ? getQueryString('minval') : 4000, getQueryString('maxval') ?
            getQueryString('maxval') :40000
        ],

        slide: function (event, ui) {

            $('.ui-slider-handle:eq(0) .price-range-min').html( ui.values[0]);
            $('.ui-slider-handle:eq(1) .price-range-max').html( ui.values[1]);
            $('.price-range-both').html('<i>' + ui.values[0] + ' - </i>' + ui.values[1]);

            // get values of min and max
            $("#minval").val(ui.values[0]);
            $("#maxval").val(ui.values[1]);

            if (ui.values[0] == ui.values[1]) {
                $('.price-range-both i').css('display', 'none');
            } else {
                $('.price-range-both i').css('display', 'inline');
            }

            if (collision($('.price-range-min'), $('.price-range-max')) == true) {
                $('.price-range-min, .price-range-max').css('opacity', '0');
                $('.price-range-both').css('display', 'block');
            } else {
                $('.price-range-min, .price-range-max').css('opacity', '1');
                $('.price-range-both').css('display', 'none');
            }

        }
    });

    $('.ui-slider-range').append('<span class="price-range-both value"><i>' + $('#slider').slider('values', 0) +
        ' - </i>' + $('#slider').slider('values', 1) + '</span>');

    $('.ui-slider-handle:eq(0)').append('<span class="price-range-min value">' + $('#slider').slider('values', 0) +
        '</span>');

    $('.ui-slider-handle:eq(1)').append('<span class="price-range-max value">' + $('#slider').slider('values', 1) +
        '</span>');
</script>
<script src="{{asset('assets/frontend/home.js')}}"></script>
@endsection
