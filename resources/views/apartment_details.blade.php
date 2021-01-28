@extends('layout.app')

@section('body')
    <!-- bradcam_area  -->
    <div class="property_details_banner">
        <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-8 col-lg-6">
                        <div class="comfortable_apartment">
                            <h4>Comfortable Apartment in {{$apartment->district}}</h4>
                            <p> <img src="{{asset('assets/realstate')}}/img/svg_icon/location.svg" alt="">{{$apartment->address}}</p>
                            <div class="quality_quantity d-flex">
                                <div class="single_quantity">
                                    <img src="{{asset('assets/realstate')}}/img/svg_icon/color_box.svg" alt="">
                                    <span>{{$apartment->apartment_size}}</span>
                                </div>
                                <div class="single_quantity">
                                    <img src="{{asset('assets/realstate')}}/img/svg_icon/color_bed.svg" alt="">
                                    <span>{{$apartment->total_bed}}</span>
                                </div>
                                <div class="single_quantity">
                                    <img src="{{asset('assets/realstate')}}/img/svg_icon/color_bath.svg" alt="">
                                    <span>{{$apartment->total_bath}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-4 col-lg-6">
                        <div class="prise_quantity">
                            <h4>BDT {{$apartment->apartment_rent}}</h4>
                            <a href="#">{{$apartment->owner->phone}}</a>
                        </div>
                    </div>
                </div>
            </div>
</div>
    <!--/ bradcam_area  -->

<!-- details  -->
<div class="property_details">
<div class="container">
    <div class="row">
        @if ($apartment->detailsImages)
        <div class="col-xl-12">
            <div class="property_banner">
                <div class="property_banner_active owl-carousel">
                        @php
                            $i=1;
                        @endphp
                        @foreach ($apartment->detailsImages as $images)
                        <div class="single_property" style="height: 400px">
                            @if ($i==1)
                                <img class="img-fluid h-100" src="{{asset('Apartment photoes/'.$apartment->featureImage->image)}}" alt="">
                                @else
                                <img class="img-fluid h-100" src="{{asset('Apartment photoes/'.$images->image)}}" alt="">
                            @endif
                        </div>
                        @php
                            $i++;
                        @endphp
                        @endforeach
                    {{-- <div class="single_property">
                        <img src="img/banner/property_details.png" alt="">
                    </div>
                    <div class="single_property">
                        <img src="img/banner/property_details.png" alt="">
                    </div> --}}
                </div>
            </div>
        </div>
        @endif
        <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1" style="word-wrap: break-word;margin-top: 115px;">
            <div class="details_info mb-5">
                <h4>Description</h4>
               {{$apartment->apartment_description}}

            </div>
            <div class="contact_field">
                <form action="#">
                    <div class="row">
                        <div class="col-xl-12">
                            @if (session('msg'))
                            <div class="alert alert-success">
                                {{ session('msg') }}
                            </div>
                            @endif
                            @if (Auth::check())
                                @if (Auth::user()->user_role == 'renter')
                                    @if ($status_check === 'true')
                                    <div class="send_btn">
                                        <a href="javascript:void(0)" class="send_btn">Request On Pending!</a>
                                    </div>
                                    @else
                                    <div class="send_btn">
                                        <a href="{{url('/renter/rent-apartment/'.$apartment->id)}}" class="send_btn">Book now!</a>
                                    </div>
                                    @endif
                                @endif
                            @else
                                <div class="send_btn">
                                    <a href="javascript:;" onclick="send_to_register()" class="send_btn">Join to rent apartment!</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /details  -->


@endsection
<script>
 function send_to_register()
 {
     <?php
       Session::put('apartment_id_for_login',$apartment_id);

     ?>
    window.location.href = "{{route('registration')}}";
    
 }
</script>