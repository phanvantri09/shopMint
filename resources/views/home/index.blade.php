<!DOCTYPE html>
<html lang="zxx">
    <?php
    use App\Models\Category; 
    use App\Models\Product;   
    use App\Models\Cart;
    $Category = Category::all();
        $Cart = Cart::all();
        $Product = Product::all();
    if(empty(Auth::User()->id)==false)    {
        if(isset(Auth::User()->id)){
            $cart = Cart::where('id_user','=',Auth::User()->id)->where('status','=',0)->get();
            $priceCart =0;
            foreach ($cart as $key => $ca) {
                foreach ($Product as $key => $pro) {
                    if($ca->id_product == $pro->id){
                        $priceCart += $ca->amount*$pro->price;
                    }
                }
            }
        $amountCart = count($cart);
        }
    }
    else{
        $amountCart =0;
        $priceCart =0;
    } 
?>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop Mint</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('./homepage/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('./homepage/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('./homepage/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('./homepage/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('./homepage/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('./homepage/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('./homepage/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('./homepage/css/style.css')}}" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css" rel="stylesheet">
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body>
    <!-- Page Preloder -->

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        @foreach ($Category as $item)
                            <li><a href="{{ route('category', ['id'=>$item->id]) }}">{{$item->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
                @auth
                <li><a href="{{ route('booknow') }}">emergency rescue</a></li>
                @else
                <li><a href="{{ route('login') }}">emergency rescue</a></li>
                @endauth
                

            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Run faster</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Run faster</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Việt Nam</a></li>

                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                @auth
                                <a href="{{ route('logout') }}"></i>Logout</a>  
                                @else
                                <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            
                            <li class="active"><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('home') }}">Pages</a>
                                <ul class="header__menu__dropdown">
                                    @foreach ($Category as $item)
                                    <li><a href="{{ route('category', ['id'=>$item->id]) }}">{{$item->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{ route('home') }}">Contact</a></li>
                            @auth
                            <li><a href="{{ route('booknow') }}">Emergency Rescue</a></li>
                            @else
                            <li><a href="{{ route('login') }}">Emergency Rescue</a></li>
                            @endauth
                            
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>

                            <li><a href="{{ route('checkout') }}"><i class="fa fa-shopping-bag"></i></a></li>
                            <li><a href="{{ route('home.mycart') }}"><i class="fa fa-shopping-cart"></i> <span>{{$amountCart}}</span></a></li>
                        </ul>
                        <div class="header__cart__price">Item: <span>${{$priceCart}}</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    @if (!Route::has('category'))
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            @foreach ($Category as $item)
                            <li><a href="{{ route('category', ['id'=>$item->id]) }}">{{$item->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{ route('search') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input name="key" type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="hero__item set-bg" data-setbg="{{ asset('./homepage/img/hero/banner.jpg')}}">
                        <div class="hero__text">
                            <span>My driver</span>
                            <h2>Happy <br />100% run</h2>
                            <p>Only 1 call will show up the fastest</p>
                            <a href="#" class="primary-btn">PHONE NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    <section class="hero" style="padding-bottom: 1px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero__search">
                        <div class="hero__search__form" style="width: 850px">
                            <form action="{{ route('search') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input name="key" type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>              
                </div>
            </div>
        </div>
    </section>
    @endif
    @yield('content')
    
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="{{ asset('./homepage/img/logo4.png')}}" alt=""></a>
                        </div>
                        <ul>
                            <li>Địa chỉ: 74B-Thu Bồn-Bình An-Nam Phước-Duy Xuyên-Quảng Nam</li>
                            <li>Phone  : 0931 452 452 | 0941 681 681</li>
                            <li>Email  : hungboss091289@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="{{ route('home') }}">About Us</a></li>
                            <li><a href="{{ route('home') }}">About Our Shop</a></li>
                            <li><a href="{{ route('home') }}">Secure Shopping</a></li>
                            <li><a href="{{ route('home') }}">Delivery infomation</a></li>
                            <li><a href="{{ route('home') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('home') }}">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="{{ route('home') }}">Who We Are</a></li>
                            <li><a href="{{ route('home') }}">Our Services</a></li>
                            <li><a href="{{ route('home') }}">Projects</a></li>
                            <li><a href="{{ route('home') }}">Contact</a></li>
                            <li><a href="{{ route('home') }}">Innovation</a></li>
                            <li><a href="{{ route('home') }}">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="{{ route('home') }}"><i class="fa fa-facebook"></i></a>
                            <a href="{{ route('home') }}"><i class="fa fa-instagram"></i></a>
                            <a href="{{ route('home') }}"><i class="fa fa-twitter"></i></a>
                            <a href="{{ route('home') }}"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
        @if(Session::has('success'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        @endif
                toastr.success("{{ session('success') }}");
        </script>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('./homepage/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('./homepage/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('./homepage/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('./homepage/js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('./homepage//jquery.slicknav.js')}}"></script>
    <script src="{{ asset('./homepage//mixitup.min.js')}}"></script>
    <script src="{{ asset('./homepage/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('./homepage/js/main.js')}}"></script>
    <script src="{{ asset('/viewAdmin/js/action.js')}}"></script>
</body>

</html>