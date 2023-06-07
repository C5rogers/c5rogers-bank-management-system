<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main</title>
    @if (Request::is('c5rogers'))
     <link rel="stylesheet" href="{{ asset('stylesheet/formainpage.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('stylesheet/headerAndFooter.css') }}">
    <link rel="stylesheet" href="{{ asset('stylesheet/alert-box.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&family=Courgette&display=swap" rel="stylesheet">
</head>

<body>

    <!-- this is the header with its contents -->
    <header>
        <div class="name">
            @php
                $date=date('Y-m-d');
            @endphp
            <span>&copy {{ $date }} c5rogers bank.</span>
        </div>
        <div class="header-content">
            <div class="menu">
                <button class="menu-btn"><img src="{{ asset('image/menu.png') }}" alt=""></button>
            </div>
            <div class="logo" id="first">
                <div class="image">
                    <a href="{{ route('c5rogers') }}"><img src="{{ asset('image/c5rogers.png') }}" alt=""></a>
                </div>
            </div>
            <div class="navigation">
                <nav>
                    <div class="exit">
                        <button class="exit-btn"><img src="{{ asset('image/exit.png') }}" alt=""></button>
                    </div>
                    <ul>
                        <li><a href="{{ route('user.menu') }}">MENU</a></li>
                        <li><a href="{{ route('c5rogers.about') }}">ABOUT</a></li>
                        <li><a href="{{ route('user.contact') }}">CONTACT</a></li>
                        @auth
                            <li>
                                <form action="{{ route('user.logout') }}" method="POST" class="logout-button">
                                    @csrf
                                    <button type="submit" name="logout"><img src="{{ asset('image/close.png') }}" alt=""><span>LOGOUT</span></button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                    <div class="search-bar">
                        <form action="#" method="GET">
                            <div class="form-cont">
                                <div class="cont">
                                    <i><img src="{{ asset('image/search.png') }}" alt=""></i>
                                    <input type="text" name="search" placeholder="Search any thing u want...">
                                    <button type="sbumit" name="find" class="serch-btn"><img src="{{ asset('image/search.png') }}" alt=""></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </nav>
            </div>
            @guest
                <div class="most-left" style="margin-left:5px">
                    <div class="login-signup-buttons">
                        <a href="{{ route('user.login') }}" class="login"><img src="{{ asset('image/open.png') }}" alt=""><span>LOGIN</span></a>
                        <a href="{{ route('user.signup') }}" class="signup"><img src="{{ asset('image/adduser.png') }}" alt=""><span>SIGNUP</span></a>
                    </div>
                </div>
            @endguest
        </div>
    </header>


    {{-- this is where everty things is going down --}}
        {{ $slot }}

    <!-- this is the footer part of the website -->
    <footer>
        <div class="footer-logo" id="first">
            <div class="image">
                <a href="#first"><img src="{{ asset('image/c5rogers.png') }}" alt=""></a>
            </div>
        </div>
        <div class="footer-links">
            <ul>
                <li>
                    <a href="#"><img src="{{ asset('image/facebook.png') }}" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="{{ asset('image/eye.png') }}" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="{{ asset('image/linkidin.png') }}" alt=""></a>
                </li>
            </ul>
        </div>
        <div class="gotolanding">
            <a href="{{ route('welcome') }}"><img src="{{ asset('image/back2.png') }}" alt=""><span>START</span></a>
        </div>
    </footer>

    <script>
        var menu = document.querySelector(".menu-btn");
        var exit = document.querySelector(".exit-btn");
        var navigation = document.querySelector(".navigation");
        menu.addEventListener("click", function() {
            document.querySelector(".image12").style.zIndex = "-1";
            navigation.style.left = "0";
        });
        exit.addEventListener("click", function() {
            navigation.style.left = "-100%";
            document.querySelector(".image12").style.transition = "all ease-in-out .33s";
            document.querySelector(".image12").style.zIndex = "0";
        });
    </script>
</body>

</html>