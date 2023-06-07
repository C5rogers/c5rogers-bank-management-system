 <!-- this is the main show button -->
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


    {{-- this is the success box --}}
    @if (session()->has('withdrawMessage'))
    @include('partisions._withdrawMSG')
    <script>
        var alert=document.querySelector(".cusome-success-box");
        alert.style.left="1em";
        var time=setTimeout(()=>{
        document.querySelector(".success-content").innerHTML="";
        alert.style.left="-100%";
        },12000);
        var alertExit=document.querySelector(".exit3");
        alertExit.addEventListener('click',function(e){
            alert.style.left='-100%';
        });
    </script>
    @endif

    <div class="grid">
        <div class="left">
            <div class="account-detail">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">Current account summery.</th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Account Number</td>
                            <td>:{{ $user->accountNumber }}</td>
                        </tr>
                        <tr>
                            <td>User Name</td>
                            <td>:{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>Current Balance</td>
                            @php
                                if(empty($user->balance)){
                                    $balance='0.0';
                                }else{
                                    $balance=$user->balance;
                                }
                            @endphp
                            <td>:${{ $balance }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="activity-description">
                <a href="{{ route('user.payment') }}"><img src="{{ asset('image/bankDashbord/balance.png') }}" alt=""><span>PAY SERVICES</span></a>
                <a href="{{ route('user.deposite',auth()->id()) }}"><img src="{{ asset('image/bankDashbord/saving.png') }}" alt=""><span>DEPOSITE CASH</span></a>
                <a href="{{ route('user.withdraw',auth()->id()) }}"><img src="{{ asset('image/bankDashbord/cashout2.png') }}" alt=""><span>WITHDRAW CASH</span></a>
                <a href="{{ route('user.transfer',auth()->id()) }}"><img src="{{ asset('image/bankDashbord/transfer3.png') }}" alt=""><span>TRANSFER CASH</span></a>
                <a href="{{ route('user.transacation.histry',auth()->id()) }}"><img src="{{ asset('image/bankDashbord/history.png') }}" alt=""><span>TRANSACTION HISTORY</span></a>
                <a href="{{ route('user.personalInfo',auth()->id()) }}"><img src="{{ asset('image/bankDashbord/user.png') }}" alt=""><span>MY ACCOUNT DETAILS</span></a>
            </div>
        </div>
        <div class="main-dashboard">
            <div class="dashboard-title">
                <h2>MAIN ACTIVITYS</h2>
            </div>
            <div class="activity">
                <a href="{{ route('user.payment') }}">
                    <div class="cont">
                        <div class="img">
                            <img src="{{ asset('image/bankDashbord/balance.png') }}" alt="">
                        </div>
                        <div class="small-caption">
                            <h4>Pay</h4>
                        </div>
                    </div>
                </a>
                <a href="{{ route('user.deposite',auth()->id()) }}">
                    <div class="cont">
                        <div class="img">
                            <img src="{{ asset("image/bankDashbord/saving.png") }}" alt="">
                        </div>
                        <div class="small-caption">
                            <h4>Deposite</h4>
                        </div>
                    </div>
                </a>
                <a href="{{ route('user.withdraw',auth()->id()) }}">
                    <div class="cont">
                        <div class="img">
                            <img src="{{ asset('image/bankDashbord/cashout2.png') }}" alt="">
                        </div>
                        <div class="small-caption">
                            <h4>Withdrawal</h4>
                        </div>
                    </div>
                </a>

                <a href="{{ route('user.transfer',auth()->id()) }}">
                    <div class="cont">
                        <div class="img">
                            <img src="{{ asset('image/bankDashbord/transfer3.png') }}" alt="">
                        </div>
                        <div class="small-caption">
                            <h4>Transfer</h4>
                        </div>
                    </div>
                </a>
                <a href="{{ route('user.transacation.histry',auth()->id()) }}">
                    <div class="cont">
                        <div class="img">
                            <img src="{{ asset('image/bankDashbord/history.png') }}" alt="">
                        </div>
                        <div class="small-caption">
                            <h4>Transaction history</h4>
                        </div>
                    </div>
                </a>
                <a href="{{ route('user.personalInfo',auth()->id()) }}">
                    <div class="cont">
                        <div class="img">
                            <img src="{{ asset('image/bankDashbord/user.png') }}" alt="">
                        </div>
                        <div class="small-caption">
                            <h4>My Information</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</main>
