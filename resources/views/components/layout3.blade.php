@php
    $routeName=Route::currentRouteName();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @if ($routeName=='admin.menu')
        <title>admin menu panal</title>
    @endif

    @if ($routeName=='admin.showTransaction')
        <title>admin show transaction</title>
    @endif

    @if ($routeName=='admin.showDeposite')
        <title>admin show deposite</title>
    @endif

    @if ($routeName=='admin.showWithdraw')
        <title>admin show withdraw page</title>
    @endif

    @if ($routeName=='admin.issues')
        <title>show issue pages</title>
    @endif

    @if ($routeName=='admin.show.comment.details')
        <title>comment detail page</title>
    @endif

    <link rel="stylesheet" href="{{ asset('stylesheet/headerAndFooter.css') }}">
    <link rel="stylesheet" href="{{ asset('stylesheet/forAdminPanal.css') }}">
    <link rel="stylesheet" href="{{ asset('stylesheet/alert-box.css') }}">
    <link rel="stylesheet" href="{{ asset('stylesheet/form.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&family=Courgette&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="name">
            <span>&copy 2015-5-6 c5rogers bank.</span>
        </div>
        <div class="header-content">
            <div class="menu">
                <button class="menu-btn"><img src="{{ asset('image/menu.png') }}" alt=""></button>
            </div>
            <div class="logo" id="first">
                <div class="image">
                    <a href="{{ route('admin.menu',auth()->id()) }}"><img src="{{ asset('image/c5rogers.png') }}" alt=""></a>
                </div>
            </div>
            <div class="navigation">
                <nav>
                    <div class="exit">
                        <button class="exit-btn"><img src="{{ asset('image/exit.png') }}" alt=""></button>
                    </div>
                    <ul>
                        @if ($routeName=='admin.showTransaction')
                                <li><a href="{{ route('admin.showTransaction',auth()->id()) }}" class="active">TRANSACTION</a></li>
                            @else
                                <li><a href="{{ route('admin.showTransaction',auth()->id()) }}">TRANSACTION</a></li>
                        @endif
                        <li><a href="{{ route('admin.issues',auth()->user()->id) }}">ISSUES</a></li>
                        @if ($routeName=='admin.showDeposite')
                                <li><a href="{{ route('admin.showDeposite',auth()->id()) }}">DEPOSITE</a></li>
                            @else 
                                <li><a href="{{ route('admin.showDeposite',auth()->id()) }}">DEPOSITE</a></li>  
                        @endif

                        @if ($routeName=='admin.showWithdraw')    
                                <li><a href="{{ route('admin.showWithdraw',auth()->id()) }}" class="active">WITHDRAW</a></li>
                            @else
                                <li><a href="{{ route('admin.showWithdraw',auth()->id()) }}">WITHDRAW</a></li>  
                        @endif
                        <li>
                            <form action="{{ route('admin.logout',auth()->id()) }}" method="get" class="logout-button">
                                @csrf
                                <button type="submit" name="logout"><img src="{{ asset('image/close.png') }}" alt=""><span>LOGOUT</span></button>
                            </form>
                        </li>
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
        </div>
    </header>

    <main>
        @if (session()->has('warning'))
        @include('partisions._warning')
        <script>
            var alert1=document.querySelector(".custome-alert-box");
            alert1.style.left="1em";
            var time= setTimeout(()=>{
                document.querySelector(".alert-content").innerHTML="";
                alert1.style.left="-100%";
            },10000);
            var alertExit=document.querySelector(".exit2");
            alertExit.addEventListener('click',function(e){
                alert1.style.left='-100%';
            });
        </script>
    @endif

    {{-- this is the success box --}}
    @if (session()->has('success'))
       @include('partisions._success')
        <script>
            var alert=document.querySelector(".cusome-success-box");
            alert.style.left="1em";
            var time=setTimeout(()=>{
            document.querySelector(".success-content").innerHTML="";
            alert.style.left="-100%";
            },10000);
            var alertExit=document.querySelector(".exit3");
            alertExit.addEventListener('click',function(e){
                alert.style.left='-100%';
            });
        </script>
     @endif


     {{ $slot }}

    </main>


    <!-- this is the footer page -->
    <footer>
        <div class="footer-logo" id="first">
            <div class="image">
                <a href="#" class="admin-pannerl"><img src="{{ asset('image/adminLog.png') }}" alt=""></a>
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
            <a href="{{ route('admin.logout',auth()->id()) }}"><img src="{{ asset('image/back2.png') }}" alt=""><span>START</span></a>
        </div>
    </footer>
    <script>
        var menu = document.querySelector(".menu-btn");
        var exit = document.querySelector(".exit-btn");
        var navigation = document.querySelector(".navigation");
        menu.addEventListener("click", function(e) {
            navigation.style.left = "0";
        });
        exit.addEventListener("click", function(e) {
            navigation.style.left = "-100%";
        });
    </script>
</body>

</html>   