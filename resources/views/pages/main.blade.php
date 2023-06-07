<x-layout1>
    <!-- this  the main part of the website -->
    <main>

        <!-- this must be shown if there is invalid searach form the user -->
        {{-- @include('partisions._empty') --}}

        {{-- this is the alert box --}}

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


        <!-- this is the main content of the main page -->

        <div class="grid">
            <div class="image image12">
                {{-- <a href="about.html"><img src="image/E-Wallet-amico.png" alt=""></a> --}}
                <a href="{{ route('c5rogers.about') }}"><img src="{{ asset('image/E-Wallet-amico.png') }}" alt=""></a>
            </div>
            <div class="title">
                <h2>c5rogers bank</h2>
            </div>
            <div class="some-description">
                <article>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti sit dicta fuga explicabo distinctio excepturi, veritatis reiciendis dignissimos ipsa necessitatibus itaque sed temporibus inventore. Ratione eligendi id neque voluptas
                        obcaecati! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate maiores beatae unde iste magnam. Reiciendis qui ipsum nobis nisi doloremque, excepturi incidunt modi eligendi id totam, quisquam reprehenderit alias
                        corporis?
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta iste, unde dicta exercitationem, esse perferendis repudiandae quos voluptatem numquam sapiente dignissimos iusto amet ipsa optio fugiat! Mollitia, numquam obcaecati! Harum!
                    </p>
                </article>
            </div>
            <div class="serviceses-list">
                <ul>
                    <li>
                        <a href="{{ route('user.payment') }}"><img src="{{ asset('image/paymentSystem.png') }}" alt=""><span>Online Payment Systems</span></a>
                    </li>
                    <li>
                        {{-- <a href="main.html"><img src="image/deposite.png" alt=""><span>Online Deposite System</span></a> --}}
                        <a href="#"><img src="{{ asset('image/deposite.png') }}" alt=""><span>Online Deposite System</span></a>
                    </li>
                    @auth
                        <li>
                            <a href="{{ route('user.transacation.histry',auth()->id()) }}"><img src="{{ asset('image/statusreport.png') }}" alt=""><span>Online Status Report</span></a>
                        </li>
                    @endauth
                    <li>
                        {{-- <a href="main.html"><img src="image/curency in hand.png" alt=""><span>Online Currency Reports </span></a> --}}
                        <a href="#"><img src="{{ asset('image/curency in hand.png') }}" alt=""><span>Online Currency Reports </span></a>
                    </li>
                </ul>
            </div>
        </div>

    </main>

    {{-- message pops up --}}

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


    @if (session()->has('success'))
    <script>
        var alert=document.querySelector(".custome-alert-box");
        var messageContainer=document.querySelector(".alert-content");
        messageContainer.innerHTML={{ session('success') }};
        alert.style.left="1em";
       
    </script>
    @endif
</x-layout1>