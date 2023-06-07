    <!-- this is the main page  -->
    <main>

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


        <div class="grid">
            <div class="left">
                <div class="activity-description">
                    <a href="{{ route('pay.electriccity',auth()->id()) }}"><img src="{{ asset('image/payment/electriccity.png') }}" alt=""><span>ELECTRIC BILL</span></a>
                    <a href="{{ route('pay.school',auth()->id()) }}"><img src="{{ asset('image/payment/school.png') }}" alt=""><span>SCHOOL PAYMENT</span></a>
                    <a href="{{ route('pay.water',auth()->id()) }}"><img src="{{ asset('image/payment/water.png') }}" alt=""><span>WATTER BILL </span></a>
                    <a href="{{ route('pay.internet',auth()->id()) }}"><img src="{{ asset('image/payment/internet.png')}}" alt=""><span>INTERNET BILL</span></a>
                    <a href="{{ route('pay.shoping',auth()->id()) }}"><img src="{{ asset('image/payment/shoping1.png') }}" alt=""><span>SHOPING PAYMENT</span></a>
                    <a href="{{ route('pay.dstv',auth()->id()) }}"><img src="{{ asset('image/payment/tv.png') }}" alt=""><span>DSTV PAYMENT</span></a>
                </div>
            </div>
            <div class="dashbord">
                <div class="dashboard-title">
                    <h2>PAYMENT SERVICES</h2>
                </div>
                <div class="activity">
                    <a href="{{ route('pay.electriccity',auth()->id()) }}">
                        <div class="cont">
                            <div class="img">
                                <img src="{{ asset('image/payment/electriccity.png') }}" alt="">
                            </div>
                            <div class="small-caption">
                                <h4>ELECTRICCITY</h4>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('pay.school',auth()->id()) }}">
                        <div class="cont">
                            <div class="img">
                                <img src="{{ asset('image/payment/school.png') }}" alt="">
                            </div>
                            <div class="small-caption">
                                <h4>SCHOOL</h4>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('pay.water',auth()->id()) }}">
                        <div class="cont">
                            <div class="img">
                                <img src="{{ asset('image/payment/water.png') }}" alt="">
                            </div>
                            <div class="small-caption">
                                <h4>WATTER</h4>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('pay.internet',auth()->id()) }}">
                        <div class="cont">
                            <div class="img">
                                <img src="{{ asset('image/payment/internet.png')}}" alt="">
                            </div>
                            <div class="small-caption">
                                <h4>INTERNET</h4>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('pay.shoping',auth()->id()) }}">
                        <div class="cont">
                            <div class="img">
                                <img src="{{ asset('image/payment/shoping1.png') }}" alt="">
                            </div>
                            <div class="small-caption">
                                <h4>SHOPING</h4>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('pay.dstv',auth()->id()) }}">
                        <div class="cont">
                            <div class="img">
                                <img src="{{ asset('image/payment/tv.png') }}" alt="">
                            </div>
                            <div class="small-caption">
                                <h4>DSTV</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </main>