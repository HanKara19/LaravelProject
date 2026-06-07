<!-- HEADER -->
<header>
    <div id="top-header">
        <div class="container">
            <div class="pull-left">
                <span>Welcome to Tech E-Shop!</span>
            </div>
            <div class="pull-right">
                <ul class="header-top-links">
                    <li><a href="{{ route('home') }}">Store</a></li>
                    <li><a href="{{ route('products') }}">Products</a></li>
                    <li><a href="{{ route('cart.index') }}">Cart</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div id="header">
        <div class="container">
            <div class="pull-left">
                <div class="header-logo">
                    <a class="logo" href="{{ route('home') }}">
                        <img src="{{ asset('assets') }}/img/logo.png" alt="">
                    </a>
                </div>

                <div class="header-search">
                    <form>
                        <input class="input search-input" type="text" placeholder="Search technology products">
                        <select class="input search-categories">
                            <option value="0">All Categories</option>
                            <option value="1">Smart Phones</option>
                            <option value="2">Computers & Office</option>
                            <option value="3">Headsets</option>
                            <option value="4">Smart Watches</option>
                        </select>
                        <button class="search-btn" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="pull-right">
                <ul class="header-btns">

                    <li class="header-account dropdown default-dropdown">
                        <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-user-o"></i>
                            </div>

                            @auth
                                <strong class="text-uppercase">
                                    {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                                </strong>
                            @else
                                <strong class="text-uppercase">
                                    My Account <i class="fa fa-caret-down"></i>
                                </strong>
                            @endauth
                        </div>

                        @guest
                            <a href="{{ route('login') }}" class="text-uppercase">Login</a> /
                            <a href="{{ route('register') }}" class="text-uppercase">Join</a>
                        @else
                            <span class="text-uppercase">Welcome</span>
                        @endguest

                        <ul class="custom-menu">
                            @guest
                                <li>
                                    <a href="{{ route('login') }}">
                                        <i class="fa fa-unlock-alt"></i> Login
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}">
                                        <i class="fa fa-user-plus"></i> Create An Account
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('cart.index') }}">
                                        <i class="fa fa-shopping-cart"></i> My Cart
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('checkout') }}">
                                        <i class="fa fa-check"></i> Checkout
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" style="padding: 8px 15px;">
                                        @csrf
                                        <button type="submit" style="border:none; background:none; padding:0;">
                                            <i class="fa fa-lock"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </li>

                    <li class="header-cart dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="qty">
                                    {{ \App\Models\Cart::where('user_id', Auth::id())->sum('quantity') }}
                                </span>
                            </div>

                            <strong class="text-uppercase">My Cart:</strong>
                            <br>

                            <span>
                                ${{ number_format(
                                    \App\Models\Cart::where('user_id', Auth::id())
                                        ->get()
                                        ->sum(fn($item) => $item->price * $item->quantity),
                                    2
                                ) }}
                            </span>
                        </a>

                        <div class="custom-menu">
                            <div id="shopping-cart">
                                <div class="shopping-cart-list">
                                    <p class="text-center p-3">
                                        Click "View Cart" to see your cart items.
                                    </p>
                                </div>

                                <div class="shopping-cart-btns">
                                    <a href="{{ route('cart.index') }}" class="main-btn">
                                        View Cart
                                    </a>

                                    <a href="{{ route('checkout') }}" class="primary-btn">
                                        Checkout
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-toggle">
                        <button class="nav-toggle-btn main-btn icon-btn">
                            <i class="fa fa-bars"></i>
                        </button>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</header>
<!-- /HEADER -->