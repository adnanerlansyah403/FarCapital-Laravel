<header class="header container" id="home">

    <div class="logo">
        <h1><a href="#home">Rondovision</a></h1>
    </div>

    <nav>
        <ul class="nav__list">
            <li class="nav__item">
                <a href="#home">Home</a>
            </li>
            <li class="nav__item">
                <a href="#arrivals">Best Seller Sale</a>
            </li>
            <li class="nav__item">
                <a href="#banner">All Under 30%</a>
            </li>
            <li class="nav__item">
                <a href="#store">Reviews</a>
            </li>
        </ul>
        <div class="nav__buttons">
            <button class="btn btn__primary">Sign Up</button>
        </div>
    </nav>

    <div class="nav_menu_mobile">

        <button class="btn nav__button" data-nav-open>
            <i class="uil uil-bars" id="nav__action"></i>
        </button>

        <ul class="nav__menu__list">
            <li>
                <a href="{{ url('/') }}" class="nav__menu__link">
                    Home
                    <img src="{{ asset('assets/images/arrow-right.png') }}" height="15" alt="">
                </a>
            </li>
            <li>
                <a href="#best" class="nav__menu__link">
                    Best Seller Sale
                    <img src="{{ asset('assets/images/arrow-right.png') }}" height="15" alt="">
                </a>
            </li>
            <li>
                <a href="#under" class="nav__menu__link">
                    All Under 30%
                    <img src="{{ asset('assets/images/arrow-right.png') }}" height="15" alt="">
                </a>
            </li>
            <li>
                <a href="#home" class="nav__menu__link">
                    Reviews
                    <img src="{{ asset('assets/images/arrow-right.png') }}" height="15" alt="">
                </a>
            </li>
            <li class="nav__menu__button">
                <button class="btn btn__primary">
                    Sign Up
                </button>
            </li>
        </ul>

    </div>

</header>