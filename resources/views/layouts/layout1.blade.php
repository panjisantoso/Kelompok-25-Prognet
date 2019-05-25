<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>E-Commerce &mdash; Kelompok 25</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="/assets2/plugins/bootstrap/css/bootstrap.min.css">    
    <link rel="stylesheet" href="/assets2/css/ecommerce.css">
    <link rel="stylesheet" href="/assets2/css/color_skins.css">
    <link href="/frontEnd/css/select2.css" rel="stylesheet">
    <link href="/frontEnd/css/font-awesome.min.css" rel="stylesheet">
    <link href="/frontEnd/css/prettyPhoto.css" rel="stylesheet">
    <link href="/frontEnd/css/price-range.css" rel="stylesheet">
    <link href="/frontEnd/css/animate.css" rel="stylesheet">
    <link href="/frontEnd/css/main.css" rel="stylesheet">
    <link href="/frontEnd/css/responsive.css" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/vendors/linericon/style.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="/vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="/vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="/vendors/animate-css/animate.css">
    <link rel="stylesheet" href="/vendors/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/css/aos.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <link rel="stylesheet" href="/css/style.css">
 
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    
    <style>
    article, aside, figure, footer, header, hgroup, 
    menu, nav, section { display: block; }
    </style>
  </head>
  <body> 
    @if(Auth::id())
    
      @php
      $id = Auth::id();
      $jum = auth()->user()->unreadNotifications->count();
      $notif = DB::table('user_notifications')->where('read_at', NULL)->get();
    @endphp
  @else
  @php
    $jum = 0;
  @endphp
  @endif
  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" placeholder="Search">
              </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="/index" class="js-logo-clone">Shoppers</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                <li class="dropdown" id ="markasread" onclick="markNotificationAsRead()">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <span class="glyphicon glyphicon-globe"></i><strong>Notification</strong>

                      <span class="badge">{$jum}}</span>

                      <span class="badge">{{count(auth()->user()->unreadNotifications)}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                            @foreach($notif as $notif)
                                    <li><a href=""> {{$notif->data}}</a></li>
                            @endforeach
                        </li>
                      <span class="badge">{{$jum}}</span>
                    </a>
                    @if (Auth::id())
                    <ul class="dropdown-menu dropdown-alerts">
                            @foreach($notif as $notif)
                                    <li><a href="{{Route('admin.markReadAdmin')}}"> $notif->data</a></li>
                            @endforeach
                      @else
                      @php
                      $notif = 0;
                      @endphp
                      @endif
                       
                       
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
              <div class="site-top-icons">
              <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                        <a href="{{ url('/logout') }}">Logout</a>
                    @else
                        <a href="/login">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            
              </div> 
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li>
              <a href="/index">Home</a>
            </li>
            <li><a href="/shop">Shop</a></li>
            <li><a href="/transaction">Transaction</a></li>
            <li><a href="/viewcart">Cart</a></li>
          </ul>
        </div>
      </nav>
    </header>

    @yield('isi')

    <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Sell online</a></li>
                  <li><a href="#">Features</a></li>
                  <li><a href="#">Shopping cart</a></li>
                  <li><a href="#">Store builder</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Mobile commerce</a></li>
                  <li><a href="#">Dropshipping</a></li>
                  <li><a href="#">Website development</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Point of sale</a></li>
                  <li><a href="#">Hardware</a></li>
                  <li><a href="#">Software</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <h3 class="footer-heading mb-4">Promo</h3>
            <a href="#" class="block-6">
              <img src="images/hero_1.jpg" alt="Image placeholder" class="img-fluid rounded mb-4">
              <h3 class="font-weight-light  mb-0">Finding Your Perfect Shoes</h3>
              <p>Promo from  nuary 15 &mdash; 25, 2019</p>
            </a>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                <li class="email">emailaddress@domain.com</li>
              </ul>
            </div>

            <div class="block-7">
              <form action="#" method="post">
                <label for="email_subscribe" class="footer-heading">Subscribe</label>
                <div class="form-group">
                  <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                  <input type="submit" class="btn btn-sm btn-primary" value="Send">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="/js/jquery-3.3.1.min.js"></script>
  <script src="/js/jquery-ui.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/owl.carousel.min.js"></script>
  <script src="/js/jquery.magnific-popup.min.js"></script>
  <script src="/js/aos.js"></script>

  <script src="/js/main.js"></script>
  <script src="/js/jquery-3.2.1.min.js"></script>
	<script src="/js/popper.js"></script>
	<script src="/js/stellar.js"></script>
	<script src="/vendors/lightbox/simpleLightbox.min.js"></script>
	<script src="/vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="/vendors/isotope/imagesloaded.pkgd.min.js"></script>
	<script src="/vendors/isotope/isotope-min.js"></script>
	<script src="/vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="/js/jquery.ajaxchimp.min.js"></script>
	<script src="/js/mail-script.js"></script>
	<script src="/vendors/jquery-ui/jquery-ui.js"></script>
	<script src="/vendors/counter-up/jquery.waypoints.min.js"></script>
	<script src="/vendors/counter-up/jquery.counterup.js"></script>
	<script src="/js/theme.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        $(".cart_quantity_delete").click(function () {
            var id=$(this).attr('rel');
            var deleteFunction=$(this).attr('rel1');
            swal({
                title:'Are you sure?',
                text:"You won't be able to revert this!",
                type:'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#d33',
                confirmButtonText:'Yes, delete it!',
                cancelButtonText:'No, cancel!',
                confirmButtonClass:'btn btn-success',
                cancelButtonClass:'btn btn-danger',
                buttonsStyling:false,
                reverseButtons:true
            },function () {
                window.location.href="/cart/deleteItem/"+id;
            });
        });
    
    </script>
  </body>
</html>
<script src="{{asset('frontEnd/js/jquery.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#readnotif').click(function(){
            console.log("terklik");
            var baseUrl = window.location.protocol+"//"+window.location.host;
            $.ajax({
                  url: baseUrl+'/markRead',  
                  type : 'post',
                  dataType: 'JSON',
                  data: {
                    "_token": "{{ csrf_token() }}",
                    
                    },
                  success:function(response){
                        location.reload();
                  },
                  error:function(){
                    alert("GAGAL");
                  }
              });
        });
    });
</script>
