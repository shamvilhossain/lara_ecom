<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <meta name="csrf-token" content="{{ csrf_token() }}">  
    <title>Daily Shop | Home</title>
    
    <!-- Font awesome -->
    <link href="{{asset('public/css/font-awesome.css')}}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{asset('public/css/bootstrap.css')}}" rel="stylesheet">  
     {{-- SweetAlert2 --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
    
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="{{asset('public/css/jquery.smartmenus.bootstrap.css')}}" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/jquery.simpleLens.css')}}">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/slick.css')}}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/nouislider.css')}}">
    <!-- Theme color -->
    <link id="switcher" href="{{asset('public/css/theme-color/default-theme.css')}}" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->

    <!-- Main style sheet -->
    <link href="{{asset('public/css/style.css')}}" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  

  </head>
  <body> 
   <!-- wpf loader Two -->
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
    <!-- / wpf loader Two -->       
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start language -->
                <div class="aa-language">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <img src="public/img/flag/english.jpg" alt="english flag">ENGLISH
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <!-- <li><a href="#"><img src="public/img/flag/french.jpg" alt="">FRENCH</a></li> -->
                      <li><a href="#"><img src="public/img/flag/english.jpg" alt="">ENGLISH</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / language -->

                <!-- start currency -->
                <!-- <div class="aa-currency">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <i class="fa fa-usd"></i>USD
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><i class="fa fa-euro"></i>EURO</a></li>
                      <li><a href="#"><i class="fa fa-jpy"></i>YEN</a></li>
                    </ul>
                  </div>
                </div> -->
                <!-- / currency -->
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>02-78951</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                <?php 
                  $customer_id=Session::get('customer_id');
                  $customer_name=Session::get('customer_name');

                  if($customer_id!=null){

                  
                ?>
                  <li><a href="account.html">Welcome {{  $customer_name }}</a></li>
                  <!-- <li class="hidden-xs"><a href="wishlist.html">Wishlist</a></li> -->
                  <li class="hidden-xs"><a href="{{URL::to('/show-cart')}}">My Cart</a></li>
                  <li class="hidden-xs"><a href="{{URL::to('/payment')}}">Checkout</a></li>
                  <li><a href="{{URL::to('/customer-logout')}}" data-toggle="modal">Logout</a></li>

              <?php }else{ ?>


                  <!-- <li class="hidden-xs"><a href="wishlist.html">Wishlist</a></li> -->
                  <li class="hidden-xs"><a href="{{URL::to('/show-cart')}}">My Cart</a></li>
                  <li class="hidden-xs"><a href="{{URL::to('/customer-registration')}}">Checkout</a></li>
                  <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>

              <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="{{URL::to('/')}}">
                  <span class="fa fa-shopping-cart"></span>
                  <p>daily<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="{{URL::to('/show-cart')}}">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                  <span class="aa-cart-notify">{{Cart::count()}}</span>
                </a>
                <div class="aa-cartbox-summary">
                  <ul>
                  <?php 
                          $content = Cart::content();
                          foreach ($content as $v_contents) {
                           
                  ?>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="{{$v_contents->options['image']}}" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">{{$v_contents->name}}</a></h4>
                        <p> {{$v_contents->qty}} x {{$v_contents->price}}</p>
                      </div>
                      <a class="aa-remove-product" href="{{URL::to('/remove-from-cart/'.$v_contents->rowId)}}"><span class="fa fa-times"></span></a>
                    </li>
                  <?php } ?> 
                     <li> 
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        BDT {{Cart::total()}}
                      </span>
                    </li>
                  </ul>
                 <?php if($customer_id!=null){ ?> 
                  <a class="aa-cartbox-checkout aa-primary-btn" href="{{URL::to('/payment')}}">Checkout</a>
                 <?php }else{ ?> 
                   <a class="aa-cartbox-checkout aa-primary-btn" href="{{URL::to('/customer-registration')}}">Checkout</a>
                 <?php } ?>
                </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="">
                  <input type="text" name="" id="" placeholder="Search here ex. 'man' ">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="{{URL::to('/')}}">Home</a></li>
              {{-- <li><a href="#">Men <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="#">Casual</a></li>
                  <li><a href="#">Sports</a></li>
                  <li><a href="#">Formal</a></li>
                  <li><a href="#">Standard</a></li>                                                
                  <li><a href="#">T-Shirts</a></li>
                  <li><a href="#">Shirts</a></li>
                  <li><a href="#">Jeans</a></li>
                  <li><a href="#">Trousers</a></li>
                  <li><a href="#">And more.. <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Sleep Wear</a></li>
                      <li><a href="#">Sandals</a></li>
                      <li><a href="#">Loafers</a></li>                                      
                    </ul>
                  </li>
                </ul>
              </li> --}}
              
              <?php 
                  $category_info = DB::table('tbl_category')
                     ->select('*')
                     ->where('publication_status',1)
                     ->get();
                  foreach ($category_info as $v_category) {
                      
              ?>
              <li><a href="{{URL::to('/category-product/'.$v_category->id)}}"><?php echo $v_category->category_name; ?></a></li>

              <?php } ?>
            
             
              <li><a href="{{URL::to('/contact-us')}}">Contact</a></li>
              <li><a href="#">Pages <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="product.html">Shop Page</a></li>
                  <li><a href="product-detail.html">Shop Single</a></li>                
                  <li><a href="404.html">404 Page</a></li>                
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->
  <!-- Start slider -->
  <section id="aa-slider">
    <div class="aa-slider-area">
      @yield('slider')
    </div>
  </section> 
  <!-- / slider -->
  <!-- Start Promo section -->
  <section id="aa-promo">
    <div class="container">
      <div class="row">
        @yield('promo')
      </div>
    </div>
  </section>
  <!-- / Promo section -->
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            @yield('content')
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- / Products section -->

<!--Category Products section -->

   <section id="aa-product-category">
    <div class="container">
      <div class="row">
            @yield('cat_content')
         
      </div>
    </div>
  </section>
  <!-- / Category Products section -->

  <!-- Product Details section -->

  <section id="aa-product-details">
    <div class="container">
      <div class="row">
            @yield('product_details_content')
         
      </div>
    </div>
  </section>
  <!-- / Products Details section -->
   @yield('cart_view')
   @yield('checkout_view')
   @yield('billing_view')
   @yield('register')
  <!-- banner section -->
  {{-- <section id="aa-banner">
    <div class="container">
      <div class="row">
          @yield('banner')
      </div>
    </div>
  </section> --}}
  <!-- popular section -->
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
         @yield('popular_product')
      </div>
    </div>
  </section>
  <!-- / popular section -->
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        @yield('support')
      </div>
    </div>
  </section>
  <!-- / Support section -->
  <!-- Testimonial -->
  <section id="aa-testimonial">  
    <div class="container">
      <div class="row">
          @yield('testimonial')
      </div>
    </div>
  </section>
  <!-- / Testimonial -->

  <!-- Latest Blog -->
  {{-- <section id="aa-latest-blog">
    <div class="container">
      <div class="row">
           @yield('blog')
      </div>
    </div>
  </section> --}}
  <!-- / Latest Blog -->

  <!-- Client Brand -->
  <section id="aa-client-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider">
              <li><a href="#"><img src="public/img/client-brand-java.png" alt="java img"></a></li>
              <li><a href="#"><img src="public/img/client-brand-jquery.png" alt="jquery img"></a></li>
              <li><a href="#"><img src="public/img/client-brand-html5.png" alt="html5 img"></a></li>
              <li><a href="#"><img src="public/img/client-brand-css3.png" alt="css3 img"></a></li>
              <li><a href="#"><img src="public/img/client-brand-wordpress.png" alt="wordPress img"></a></li>
              <li><a href="#"><img src="public/img/client-brand-joomla.png" alt="joomla img"></a></li>
              <li><a href="#"><img src="public/img/client-brand-java.png" alt="java img"></a></li>
              <li><a href="#"><img src="public/img/client-brand-jquery.png" alt="jquery img"></a></li>
              <li><a href="#"><img src="public/img/client-brand-html5.png" alt="html5 img"></a></li>
              <li><a href="#"><img src="public/img/client-brand-css3.png" alt="css3 img"></a></li>
              <li><a href="#"><img src="public/img/client-brand-wordpress.png" alt="wordPress img"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Client Brand -->

  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->

  <!-- footer -->  
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Our Products</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Knowledge Base</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Delivery</a></li>
                      <li><a href="#">Returns</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Discount</a></li>
                      <li><a href="#">Special Offer</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Useful Links</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Site Map</a></li>
                      <li><a href="#">Search</a></li>
                      <li><a href="#">Advanced Search</a></li>
                      <li><a href="#">Suppliers</a></li>
                      <li><a href="#">FAQ</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Contact Us</h3>
                    <address>
                      <p> 25 Astor Pl, NY 10003, USA</p>
                      <p><span class="fa fa-phone"></span>+1 212-982-4589</p>
                      <p><span class="fa fa-envelope"></span>dailyshop@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>Designed by <a href="http://www.markups.io/">MarkUps.io</a></p>
            <div class="aa-footer-payment">
              <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-visa"></span>
              <span class="fa fa-paypal"></span>
              <span class="fa fa-cc-discover"></span>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->

  <!-- Login Modal -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>

          <!-- {!! Form::open([ 'id' => 'cust_login', 'method' => 'post', 'class' => 'aa-login-form' ]) !!} -->
            <form method="post" class="aa-login-form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
           

            <label for="">Username<span>*</span></label>
             <input type="text" name="first_name" placeholder="Username" required>
            <label for="">Password<span>*</span></label>
            <input type="password" placeholder="Password" name="password" required>
            <button class="aa-browse-btn" type="submit"  id="login_btn">Login</button>
           
            <label for="rememberme" class="rememberme"><a id="lp">Lost your password?</a></label>
            <p class="aa-lost-password"></p>
            <div class="aa-register-now">
              Don't have an account?<a href="{{URL::to('/register')}}">Register now!</a>
            </div>
         <!--  {!! Form::close() !!} -->
         </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>    

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{asset('public/js/bootstrap.js')}}"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="{{asset('public/js/jquery.smartmenus.js')}}"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="{{asset('public/js/jquery.smartmenus.bootstrap.js')}}"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="{{asset('public/js/jquery.simpleGallery.js')}}"></script>
  <script type="text/javascript" src="{{asset('public/js/jquery.simpleLens.js')}}"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="{{asset('public/js/slick.js')}}"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="{{asset('public/js/nouislider.js')}}"></script>
  <!-- Custom js -->
  <script src="{{asset('public/js/custom.js')}}"></script> 

  
  <script type="text/javascript" >
   jQuery( document ).ready( function( $ ) {


      $('#lp').on('click', function (e) {
          var name='lll';
          swal({
            text: 'Search for a movie. e.g. "La La Land".',
            content: "input",
            button: {
              text: "Search!",
              closeModal: false,
            },
          })
          .then(name => {
            if (!name) throw null;
           
            return fetch('https://itunes.apple.com/search?term=${name}&entity=movie');
          })
          .then(results => {
            return results.json();
          })
          .then(json => {
            const movie = json.results[0];
           
            if (!movie) {
              return swal("No movie was found!");
            }
           
            const name = movie.trackName;
            const imageURL = movie.artworkUrl100;
           
            swal({
              title: "Top result:",
              text: name,
              icon: imageURL,
            });
          })
          .catch(err => {
            if (err) {
              swal("Oh noes!", "The AJAX request failed!", "error");
            } else {
              swal.stopLoading();
              swal.close();
            }
          });
      });  
        $('#login-modal form').on('submit', function (e) {
        
                if (!e.isDefaultPrevented()){
                    
                    url = "{{ url('/login-customer') }}";
                   
                    $.ajax({
                        url : url,
                        type : "POST",
                        dataType: "JSON",
                        //data : $('#login-modal form').serialize(),
                        data: new FormData($("#login-modal form")[0]),
                       contentType: false,
                       processData: false,
                        success : function(data) {
                            //alert(data.type);
                            
                            // table1.ajax.reload();
                            if(data.type=='done'){
                              $('#login-modal').modal('hide');
                              swal({
                                icon: 'success',
                                title: 'Welcome',
                                text: 'You are Logged in !',
                                buttons: false,
                                timer: 1500,
                              });
                              window.setTimeout(function(){location.reload()},2000);
                            }else{
                              swal({
                                icon: 'error',
                                title: 'Oops....',
                                text: 'Invalid Email or Password !',
                                buttons: false,
                                timer: 2000,
                              });
                            }
                            
                        },
                        error : function(data){
                            swal({
                                title: 'Oops...',
                                text: 'Something went Wrong !',
                                type: 'error',
                                timer: '1500'
                            })
                        }
                    });
                    return false;
                }
            });
 
  });
  </script> 
  

  </body>
</html>