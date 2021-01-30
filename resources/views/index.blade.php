@extends('layout.app')
@section('home-status','active')
@section('body')

<style>
    ul.list {
        height: 130 px;
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
                        <h3>Find Your New Home</h3>
                        <p>Let's find a space that's perfect for you</p>
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
                                            <label for="#">Property Type</label>
                                            <select class="wide" type="text" id="category-search">
                                                <option value="apartment">All</option>
                                                <option value="apartment">Apartment</option>
                                                <option value="duplex">Duplex</option> 
                                                <option value="sublet">Sublet</option>
                                                <option value="office space">Office space</option>
                                            </select>
                                            <ul class="bg-light text-dark" id="showing-zone"></ul>
                                        </div>
                                        <div class="single_field range_slider">
                                            <label for="#">Price (BDT)</label>
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
                    <h3>Searched Apartments</h3>
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
                                            <span><h3> Popular Apartment</h3> </span>
                                            <div class="popular_pro d-flex">
                                            @if ($apartment->featureImage)
                        <img style="height:300px;width:700px;" src="{{asset('Apartment photoes/'.$apartment->featureImage->image)}}" alt="">
                        @else
                        <img src="" alt="">
                        @endif
                                                 
                                               
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
                    <h3> <span class="counter"></span> <span>+</span> </h3>
                    <p>Properties for Rent</p>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_counter">
                    <h3> <span class="counter">300</span></h3>
                    <p>Properties for Rent</p>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_counter">
                    <h3> <span class="counter">15</span></h3>
                    <p>Properties for Rent</p>
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
                    <h3>Add your property for Rent</h3>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="call_add_action">
                    <span>01835-657256</span>
                    <a href="{{route('registration')}}" class="boxed-btn3-line">Add Property</a>
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
                                <img src="{{asset('assets/realstate')}}/img/logo5.png" alt="">
                            </a>
                        </div>
                        <p>
                            <a href="#">newdoor@gmail.com</a> <br>
                            01765-324556 <br>
                            Yunesco,GEC more,Chittagong
                        </p>
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="m.facebook.com">
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
                <div class="col-xl-2 col-md-6 col-lg-2">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                        Useful Links
                                </h3>
                                <ul>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('registration') }}">Registration</a></li>
                                    <li><a href="{{ route('contact') }}"> Contact</a></li>
                                    <li><a href="{{ route('contact') }}">About Us</a></li>
                                    
                                </ul>
                            </div>
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
