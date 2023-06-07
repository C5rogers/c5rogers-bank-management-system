@php
    $routeName=Route::currentRouteName();
   
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- this will check if the page is loading it is the contact page --}}

    @if ($routeName=='user.transacation.histry')
        <title>histry page</title>
        <link rel="stylesheet" href="{{ asset('stylesheet/alert-box.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/forhistry.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/body.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/headerAndFooter.css') }}">
    @endif

    @if ($routeName=='user.login')
        <title>login page</title>
    @endif

    @if ($routeName=='user.signup')
        <title>signup page</title>
    @endif

    @if ($routeName=='user.withdraw')
        <title>wthdraw page</title>    
    @endif

    @if ($routeName=='user.transfer')
        <title>transfer page</title>    
    @endif

    @if ($routeName=='pay.dstv')
        <title>dstv payment page</title>    
    @endif

    @if ($routeName=='pay.electriccity')
        <title>electriccity payment page</title>    
    @endif

    @if ($routeName=='pay.school')
        <title>scool payment page</title>    
    @endif

    @if ($routeName=='pay.internet')
        <title>internet payment page</title>    
    @endif

    @if ($routeName=='pay.shoping')
        <title>shoping payment page</title>    
    @endif

    @if ($routeName=='pay.water')
        <title>water payment page</title>    
    @endif

    @if ($routeName=='user.deposite')
        <title>deposite page</title>
        <link rel="stylesheet" href="{{ asset('stylesheet/headerAndFooter.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/alert-box.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/form.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/body.css') }}">
    @endif



    @if ($routeName=='user.login'||$routeName=='user.signup'||$routeName=='user.contact'||$routeName=='user.withdraw'||$routeName=='user.transfer'||$routeName=='pay.dstv'||$routeName=='pay.electriccity'||
    $routeName=='pay.school'||$routeName=='pay.internet'||$routeName=='pay.shoping'||$routeName=='pay.water')
        <link rel="stylesheet" href="{{ asset('stylesheet/form.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/alert-box.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/headerAndFooter.css') }}">
    @endif

    @if ($routeName=='user.contact')
        <title>contact page</title>
        <link rel="stylesheet" href="{{ asset('stylesheet/alert-box.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/headerAndFooter.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/forContactPage.css') }}">
    @endif

    @if ($routeName=='pay.dstv'||$routeName=='pay.electriccity'||
    $routeName=='pay.school'||$routeName=='pay.internet'||$routeName=='pay.shoping'||$routeName=='pay.water')
        <link rel="stylesheet" href="{{ asset('stylesheet/body.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/back.css') }}">
    @endif

    @if ($routeName=='user.login'||$routeName=='user.signup')
        <link rel="stylesheet" href="{{ asset('stylesheet/forloginandsignup.css') }}">
    @endif

    @if ($routeName=='user.withdraw')
        <link rel="stylesheet" href="{{ asset('stylesheet/body.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/alert-box.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/headerAndFooter.css') }}">
    @endif



    @if ($routeName=='user.menu')
        <title>menu page</title>
        <link rel="stylesheet" href="{{ asset('stylesheet/alert-box.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/formain.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/headerAndFooter.css') }}">
    @endif

    @if ($routeName=='user.payment')
        <title>payment option page</title>
        <link rel="stylesheet" href="{{ asset('stylesheet/alert-box.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/forpaymentPage.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/body.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/headerAndFooter.css') }}">
    @endif

    @if ($routeName=='user.personalInfo')
        <title>personal information page</title>
        <link rel="stylesheet" href="{{ asset('stylesheet/alert-box.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/body.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/forPerosnalINfo.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/headerAndFooter.css') }}">
    @endif

    @if ($routeName=='user.transfer')
        <link rel="stylesheet" href="{{ asset('stylesheet/body.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/alert-box.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/headerAndFooter.css') }}">
    @endif

    @if ($routeName=='c5rogers.about')
        <title>about page</title>
        <link rel="stylesheet" href="{{ asset('stylesheet/forAboutpage.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/headerAndFooter.css') }}">
    @endif

    @if ($routeName=='user.profile.edit')
        <title>profile Edit page</title>
        <link rel="stylesheet" href="{{ asset('stylesheet/headerAndFooter.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/form.css') }}">
        <link rel="stylesheet" href="{{ asset('stylesheet/profileEdit.css') }}">
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&family=Courgette&display=swap" rel="stylesheet">
</head>

<body>
    <!-- this is the header and there will be some other too -->

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
            {{-- <div class="most-left" style="margin-left:5px">
                <div class="login-signup-buttons">
                    <a href="#" class="login"><img src="{{ asset('image/open.png') }}" alt=""><span>LOGIN</span></a>
                    <a href="#" class="signup"><img src="{{ asset('image/adduser.png') }}" alt=""><span>SIGNUP</span></a>
                </div>
            </div> --}}
        </div>
    </header>







    {{ $slot }}









    <!-- this is the footer part of the website -->
    <footer>
        <div class="footer-logo " id="first ">
            <div class="image ">
                @auth
                    @if ($routeName=='user.profile.edit')
                    <a href="#first"><img src="{{ auth()->user()->profile ? asset('storage/users/'.auth()->user()->profile) : asset('image/c5rogers.png')}}" alt=""></a>
                    @else
                        <a href="#first "><img src="{{ asset('image/c5rogers.png') }}" alt=" "></a>
                    @endif
                @else
                    <a href="#first "><img src="{{ asset('image/c5rogers.png') }}" alt=" "></a>
                @endauth
            </div>
        </div>
        <div class="footer-links ">
            <ul>
                <li>
                    <a href="# "><img src="{{ asset('image/facebook.png') }}" alt=" "></a>
                </li>
                <li>
                    <a href="# "><img src="{{ asset('image/eye.png') }}" alt=" "></a>
                </li>
                <li>
                    <a href="# "><img src="{{ asset('image/linkidin.png') }}" alt=" "></a>
                </li>
            </ul>
        </div>
        <div class="gotolanding ">
            <a href="{{ route('welcome') }}"><img src="{{ asset('image/back2.png') }}" alt=" "><span>START</span></a>
        </div>
    </footer>


    <!-- this will validte the form before it is sending to the serve! -->

    @if ($routeName=='user.contact')
        <script src="{{ asset('javascript/forContactpage.js') }}"></script>
        <!-- this is the event listener class -->
        <script>
            var menu = document.querySelector(".menu-btn");
            var exit = document.querySelector(".exit-btn");
            var navigation = document.querySelector(".navigation");
            menu.addEventListener("click", function() {
                document.querySelector(".hero").style.zIndex = "-1";
                navigation.style.left = "0";
            });
            exit.addEventListener("click", function() {
                navigation.style.left = "-100%";
                document.querySelector(".hero").style.zIndex = "0";
            });
        </script>
    @endif


    @if ($routeName=='user.login'||$routeName=='user.signup')
        <script src="{{ asset('javascript/eyetogle.js') }}"></script>
        <script src="{{ asset('javascript/forloginAndSignup.js') }}"></script>
            <!-- this is the event listener class -->
        <script>
            var menu = document.querySelector(".menu-btn");
            var exit = document.querySelector(".exit-btn");
            var navigation = document.querySelector(".navigation");
            menu.addEventListener("click", function() {
                document.querySelector(".hero").style.zIndex = "-1";
                navigation.style.left = "0";
            });
            exit.addEventListener("click", function() {
                navigation.style.left = "-100%";
                document.querySelector(".hero").style.zIndex = "0";
            });
        </script>
    @endif

    @if ($routeName=='user.profile.edit')
    <script>
        var menu = document.querySelector(".menu-btn");
        var exit = document.querySelector(".exit-btn");
        var navigation = document.querySelector(".navigation");
        menu.addEventListener("click", function() {
            document.querySelector(".hero").style.zIndex = "-1";
            navigation.style.left = "0";
        });
        exit.addEventListener("click", function() {
            navigation.style.left = "-100%";
            document.querySelector(".hero").style.zIndex = "0";
        });
    </script>
    @endif

    @if ($routeName=='user.withdraw')
        <script src="{{ asset('javascript/forwithdrawalpage.js') }}"></script>
    @endif


    @if ($routeName=='user.transfer')
        <script src="{{ asset('javascript/script.js') }}"></script>
         <!-- this is the event listener class -->
        <script>
            var menu = document.querySelector(".menu-btn");
            var exit = document.querySelector(".exit-btn");
            var navigation = document.querySelector(".navigation");
            menu.addEventListener("click", function() {
                document.querySelector(".form-container").style.zIndex = "-1";
                navigation.style.left = "0";
            });
            exit.addEventListener("click", function() {
                navigation.style.left = "-100%";
                document.querySelector(".form-container").style.transition = "all ease-in-out .33s";
                document.querySelector(".form-container").style.zIndex = "0";
            });


            // to exit alert box 
            var exitAlertBox = document.querySelector(".exit2");
            exitAlertBox.addEventListener("click", function(e) {
                document.querySelector(".custome-alert-box").style.left = "-100%";
            });
        </script>
    @endif


    @if ($routeName=='pay.dstv'||$routeName=='pay.electriccity'||
    $routeName=='pay.school'||$routeName=='pay.internet'||$routeName=='pay.shoping'||$routeName=='pay.water')
        <script src="{{ asset('javascript/forpayment.js') }}"></script>
    @endif

    @if ($routeName=='user.deposite')
        <script src="{{ asset('javascript/forDeposite.js') }}"></script>
    @endif
    

    @if ($routeName=='c5rogers.about')
    <script>
        var menu = document.querySelector(".menu-btn");
        var exit = document.querySelector(".exit-btn");
        var navigation = document.querySelector(".navigation");
        menu.addEventListener("click", function() {
            navigation.style.left = "0";
        });
        exit.addEventListener("click", function() {
            navigation.style.left = "-100%";
        });
    </script>
    @endif

    @if ($routeName=='user.transacation.histry')
            <!-- this is the event listener class -->
        <script>
            var menu = document.querySelector(".menu-btn");
            var exit = document.querySelector(".exit-btn");
            var navigation = document.querySelector(".navigation");
            menu.addEventListener("click", function() {
                document.querySelector("table").style.zIndex = "-1";
                navigation.style.left = "0";
            });
            exit.addEventListener("click", function() {
                navigation.style.left = "-100%";
                document.querySelector("table").style.zIndex = "0";
            });
        </script>
    @endif
    @if ($routeName=='user.menu')
        <!-- this is the event listener class -->
        <script>
            var menu = document.querySelector(".menu-btn");
            var exit = document.querySelector(".exit-btn");
            var navigation = document.querySelector(".navigation");
            menu.addEventListener("click", function() {
                navigation.style.left = "0";
            });
            exit.addEventListener("click", function() {
                navigation.style.left = "-100%";
            });
        </script>
    @endif


    @if ($routeName=='user.payment')
            <!-- this is the event listener class -->
        <script>
            var menu = document.querySelector(".menu-btn");
            var exit = document.querySelector(".exit-btn");
            var navigation = document.querySelector(".navigation");
            menu.addEventListener("click", function() {
                navigation.style.left = "0";
            });
            exit.addEventListener("click", function() {
                navigation.style.left = "-100%";
            });
        </script>
    @endif

    @if ($routeName=='user.personalInfo')
        <!-- this is the event listener class -->
        <script>
            var menu = document.querySelector(".menu-btn");
            var exit = document.querySelector(".exit-btn");
            var navigation = document.querySelector(".navigation");
            menu.addEventListener("click", function() {
                document.querySelector("table").style.zIndex = "-1";
                navigation.style.left = "0";
            });
            exit.addEventListener("click", function() {
                navigation.style.left = "-100%";
                document.querySelector("table").style.zIndex = "0";
            });
        </script>
    @endif
    <!-- this is the event listener class -->
    <script>
        var menu = document.querySelector(".menu-btn");
        var exit = document.querySelector(".exit-btn");
        var navigation = document.querySelector(".navigation");
        menu.addEventListener("click", function() {
            document.querySelector(".hero").style.zIndex = "-1";
            navigation.style.left = "0";
        });
        exit.addEventListener("click", function() {
            navigation.style.left = "-100%";
            document.querySelector(".hero").style.zIndex = "0";
        });
    </script>
</body>

</html>