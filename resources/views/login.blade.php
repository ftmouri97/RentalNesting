@extends('layout.app')

@section('login-status','active')
@section('body')

<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    .bradcam_area {
        padding: 180px 0 30px 0;
    }
</style>

<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Login</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<div class="card">
    <div class="row align-items-center card-body mx-0 py-5">
        <div class="col-md-6 offset-md-3">
            <div class="mt-10">
                @if (session('message'))
                <div class="alert alert-info">
                    {{ session('message') }}
                </div>
                @endif
            </div>
            <form  method="post" action="{{ route('login') }}">
                @csrf
                <input type="number" name="phone" placeholder="Phone number"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone number'" required
                        class="single-input">

                <div class="mt-10">
                    <input type="password" name="password" placeholder="Password"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required
                        class="single-input">
                </div>
                <div class="row mt-10 mx-0">
                    <button type = "submit" class="col-12 btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer end  -->
@endsection
