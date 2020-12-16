
  <!--=========== Header Section Begin ============-->
  <header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                            <li>Free Shipping for all Order of $99</li>
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
                            <img src="{{asset('frontend')}}/img/language.png" alt="">
                            <div>English</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">Spanis</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>
                        <div class="header__top__right__language">
                            <i class="fa fa-user"></i>
                            <div>Settings</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                @auth 
                                <li><a href="{{route('home')}}"><i class="fa fa-user"></i> Profile</a></li>
                                <li>
                                    <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i>&nbsp; Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                @else 
                                <li><a href="{{route('login')}}"><i class="fa fa-user"></i> Login</a></li>
                                <li><a href="{{route('register')}}"><i class="fa fa-user"></i> Register</a></li>
                                @endauth
                            </ul>
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
                    <a href="{{url('/')}}"><img src="{{asset('frontend')}}/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="@yield('home')"><a href="{{url('/')}}">Home</a></li>
                        <li class="@yield('shop')"><a href="{{route('shop.page')}}">Shop</a></li>
                        <li class="@yield('pages')"><a href="#">Pages</a>
                            @auth
                            <ul class="header__menu__dropdown">
                                <li><a href="./shop-details.html">Shop Details</a></li>
                                <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                            @else
                            @endauth
                        </li>
                        <li class="@yield('blog')"><a href="./blog.html">Blog</a></li>
                        <li class="@yield('contact')"><a href="./contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                @auth
                    @php
                    $total = App\Models\Cart::all()->where('user_ip', Request()->ip())->sum(function($t){
                    return $t->price * $t->qty;
                    });

                    $quantity = App\Models\Cart::all()->where('user_ip', Request()->ip())->sum('qty');
                    $wishquantity = App\Models\Wishlist::where('user_id', Auth::id())->get();
                    @endphp 
                <div class="header__cart">
                    <ul>
                        @auth
                        <li><a href="{{url('/user/wishlist')}}"><i class="fa fa-heart"></i> <span>{{count($wishquantity)}}</span></a></li>
                        <li><a href="{{url('/user/cart')}}"><i class="fa fa-shopping-bag"></i> <span>{{$quantity}}</span></a></li>
                        @else
                        @endauth
                    </ul>
                    <div class="header__cart__price">item: <span>${{$total}}</span></div>
                </div>
                @else
                <div class="header__cart">
                    <ul>
                        <li><i class="fa fa-heart"></i></li>
                        <li><i class="fa fa-shopping-bag"></i></li>
                    </ul>
                    <div class="header__cart__price">item: <span>$0</span></div>
                </div>
                @endauth
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!--=========== Header Section End ============-->