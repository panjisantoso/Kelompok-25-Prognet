<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Kelompok 25</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link rel="apple-touch-icon" href="/apple-icon.png">
    <link rel="shortcut icon" href="/favicon.ico">

    <link rel="stylesheet" href="/assets2/plugins/bootstrap/css/bootstrap.min.css">    
    <link rel="stylesheet" href="/assets2/css/ecommerce.css">
    <link rel="stylesheet" href="/assets2/css/color_skins.css">
    <link rel="stylesheet" href="/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

    <style>
    article, aside, figure, footer, header, hgroup, 
    menu, nav, section { display: block; }
    </style>
    @php
    $id = Auth::id();
    $jum = auth()->user()->unreadNotifications->count();
    $notif = DB::table('admin_notifications')->where('notifiable_id',$id)->get();
@endphp
</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" ><img src="/images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" ><img src="/images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/admin"> <i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
                    </li>
                    <h3 class="menu-title">Menu Admin</h3><!-- /.menu-title -->
                    
                    <li>
                        <a href="/admin/product"> <i class="menu-icon fa fa-gift"></i>Product</a>
                    </li>
                    <li>
                        <a href="/admin/couriers"> <i class="menu-icon fa fa-truck"></i>Courier</a>
                    </li>
                    <li>
                        <a href="/admin/categories"> <i class="menu-icon fa fa-file"></i>Product Categories</a>
                    </li>
                    <li>
                        <a href="/admin/discounts"> <i class="menu-icon fa fa-dollar"></i>Discounts</a>
                    </li>
                    <form action="/logout/admin" method="POST">
                                @csrf

                                <button type="submit" ><i class="fa fa-power-off"></i>Log Out</button>
                            </form>
                    <!-- <li>
                        <a href="/admin/categories-details"> <i class="menu-icon fa fa-file"></i>Product Category Details</a>
                    </li>
                    <li>
                        <a href="/admin/product-images"> <i class="menu-icon fa fa-picture-o"></i>Product Images</a>
                    </li> -->
                    

                        
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">
                <!-- /.dropdown -->
 <li class="dropdown" id ="markasread" onclick="markNotificationAsRead()">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      <span class="glyphicon glyphicon-globe"></i> notification
      <span class="badge">{{count(auth()->user()->unreadNotifications)}}</span>
    </a>
    <ul class="dropdown-menu dropdown-alerts">
        <li>
            @foreach($notif as $notif)
                    <li><a href=""> {{$notif->data}}</a></li>
            @endforeach
        </li>
       
       
    </ul>
    <!-- /.dropdown-alerts -->
</li>
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                        Hallo
                           
                    </div>
                </div>

                <div class="col-sm-5">
                
                    <div class="user-area dropdown float-right">
                    
                       

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="/profile"><i class="fa fa-user"></i> My Profile</a>

                            <form action="/logout" method="POST">
                                @csrf

                                <button type="submit" ><i class="fa fa-power-off"></i>Log Out</button>
                            </form>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-id"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-us"></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>@yield('pageHeader')</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">@yield('pageHeader')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @yield('isi')

   
   </div><!-- /#right-panel -->

<!-- Right Panel -->



<script src="/vendors/jquery/dist/jquery.min.js"></script>
<script src="/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/assets/js/main.js"></script>


<script src="/vendors/chart.js/dist/Chart.bundle.min.js"></script>
<script src="/assets/js/dashboard.js"></script>
<script src="/assets/js/widgets.js"></script>
<script src="/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<script src="/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/jquery.magnific-popup.min.js"></script>
<script src="/js/aos.js"></script>

<!-- <script src="/assets2/plugins/jquery-spinner/js/jquery.spinner.js"></script>

<script src="/assets2/bundles/libscripts.bundle.js"></script>    
<script src="/assets2/bundles/vendorscripts.bundle.js"></script>
<script src="/assets2/bundles/mainscripts.bundle.js"></script> -->
<script>
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script src="/js/main.js"></script>

@yield('script')
<script>
    (function($) {
        "use strict";

        jQuery('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#1de9b6', '#03a9f5'],
            normalizeFunction: 'polynomial'
        });
    })(jQuery);
    $(document).ready(function(){
            $(".dropdown").click(function(){
                if (!$(this).is($('.dropdown.active').eq(0))) {
                    $('.dropdown.active').eq(0).removeClass("active");
                }
                $(this).toggleClass("active");
            });
        });

        function formatRupiah(uang){
            uang = uang.replace(/\./g, "");
            return parseInt(uang).toLocaleString(['ban','id']);
        }


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