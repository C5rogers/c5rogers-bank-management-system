
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>c5rogers bank</title>
    <link rel="stylesheet" href="{{ asset('stylesheet/form.css') }}">
    <link rel="stylesheet" href="{{ asset('stylesheet/alert-box.css') }}">
    <link rel="stylesheet" href="{{ asset('stylesheet/forlanding.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&family=Courgette&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="header-content">
            <div class="logo" id="first">
                <div class="image">
                    <a href="{{ route("c5rogers") }}"><img src="{{ asset('image/c5rogers.gif') }}" alt=""></a>
                </div>
            </div>
            <div class="most-left">
                <div class="login-signup-buttons">
                    <a href="{{ route('user.login') }}" class="login"><img src="{{ asset('image/open.png') }}" alt=""><span>LOGIN</span></a>
                    <a href="{{ route('user.signup') }}" class="signup"><img src="{{ asset('image/adduser.png') }}" alt=""><span>SIGNUP</span></a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="absolute">
            <button class="showAdminLogin"><img src="{{ asset('image/adminLog.png') }}" alt=""></button>
        </div>

        @include('partisions._error-popup')

        <!-- this is the admin login page -->
        @include('partisions._adminLogin')


        <div class="main-content">
            <div class="description">
                <article>
                    <h1>c5rogers bank:</h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                        specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                        passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </article>
            </div>
            <div class="from-layout">
                <a href="{{ route('c5rogers') }}"><img src="{{ asset('image/rocket1.png') }}" alt=""><span>GET STARTED</span></a>
            </div>
        </div>
    </main>

    <script src="{{ asset('javascript/forAdminLogin.js') }}"></script>
    <script>
        var admin = document.querySelector(".showAdminLogin");
        admin.addEventListener("click", function(e) {
            document.querySelector(".adminLogin").classList.add('activeForm');

        });
        var adminRemove = document.querySelector(".formExit");
        adminRemove.addEventListener("click", function(e) {
            document.querySelector(".adminLogin").classList.remove('activeForm');
        });
    </script>
</body>

</html>