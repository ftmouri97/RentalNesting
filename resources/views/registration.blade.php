@extends('layout.app')

@section('registration-status','active')
@section('body')

<style>

  .tab_li
{
   display:block;
   float:left;
   width:200px; /* adjust */
   height:50px; /* adjust */
   padding: 5px; /*adjust*/
}

  .tab-group {
    justify-content: center;
  display: flex;
  list-style:none;
  padding:0;
  margin:0 0 40px 0;
  &:after {
    content: "";
    display: table;
    clear: both;
  }

  .active a {
    background:$main;
    color:$white;
  }
}



.tab-content > div:last-child {
  display:none;
}



</style>

<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Registration</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

{{-- body area --}}

<div class="card">
    <div class="card-body">
        <div class="col-md-6 offset-md-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <ul class="tab-group">
        <li class="tab active tab_li"><a href="#owner">Owner</a></li>
        <li class="tab tab_li"><a href="#renter">Renter</a></li>
       </ul>

        <div class="tab-content">
        <div id="owner">
            <form action="{{ route('reg_process') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="mt-10">
                    <input type="text" name="name" placeholder="Full name"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full name'" required
                        class="single-input">
                </div>
                <div class="mt-10">
                    <input type="email" name="email" placeholder="Email address"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required
                        class="single-input">
                </div>
                <div class="mt-10">
                    <input type="number" name="phone" placeholder="Phone number"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone number'" required
                        class="single-input">
                </div>
                <div class="mt-10">
                    <input type="number" name="nid" placeholder="NID"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'NID'" required
                        class="single-input">
                </div>

                <div class="mt-10">
                <input type="file" name="user_image"  class="single-input"   accept="image/*" multiple required   >
                <label for="img">User Image</label>
                </div>

                <div class="mt-10">
                    <input type="password" name="password" placeholder="Password"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required
                        class="single-input">
                </div>
                <div class="mt-10">
                    <input type="password" name="password_confirmation" placeholder="Retype Password"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required
                        class="single-input">
                </div>
                <div class="row justify-content-between align-items-center mt-10">
                   <input type="hidden" value="owner" name="user_role">
                    <div class="col">
                        <button  class="d-block ml-auto btn btn-primary" type="submit">Registration</button>
                    </div>
                </div>
            </form>
            </div>

            <div id="renter">
            <form action="{{ route('reg_process') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="mt-10">
                    <input type="text" name="name" placeholder="Full name"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full name'" required
                        class="single-input">
                </div>
                <div class="mt-10">
                    <input type="email" name="email" placeholder="Email address"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required
                        class="single-input">
                </div>
                <div class="mt-10">
                    <input type="number" name="phone" placeholder="Phone number"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone number'" required
                        class="single-input">
                </div>
                <div class="mt-10">
                    <input type="number" name="nid" placeholder="NID"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'NID'" required
                        class="single-input">
                </div>

                <div class="mt-10">
                <input type="file" name="user_image"  class="single-input"   accept="image/*" multiple required   >
                <label for="img">User Image</label>
                </div>

                <div class="mt-10">
                    <input type="password" name="password" placeholder="Password"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required
                        class="single-input">
                </div>
                <div class="mt-10">
                    <input type="password" name="password_confirmation" placeholder="Retype Password"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required
                        class="single-input">
                </div>
                <div class="row justify-content-between align-items-center mt-10">
                <input type="hidden" value="renter" name="user_role">
                    <div class="col">
                        <button  class="d-block ml-auto btn btn-primary" type="submit">Registration</button>
                    </div>
                </div>
            </form>
            </div>
            </div>
        </div>
            </div>
        </div>


    </div>
</div>

{{-- body area --}}

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
                                    <p class="newsletter_text">Esteem spirit temper too say adieus who direct esteem esteems luckily.</p>
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
                        <p class="copy_right text-center"></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer end  -->
@endsection

@section('page-js')
<script>
$('.tab a').on('click', function (e) {

  e.preventDefault();

  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');

  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();

  $(target).fadeIn(600);

});
</script>

@endsection

