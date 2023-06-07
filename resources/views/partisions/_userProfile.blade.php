<main>
    <!-- this is the alert box to show some error message -->
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

         
    <!-- this show the detail information that he have and he can edit -->
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Attributes</th>
                    <th>Attribute Values</th>
                    <th>Editable Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Name:</td>
                    <td>{{ $user->name }}</td>
                    <td><i><img src="{{ asset('image/ok.png') }}" alt=""></i></td>
                </tr>
                <tr>
                    <td>Account Number:</td>
                    <td>{{ $user->accountNumber }}</td>
                    <td><i><img src="{{ asset('image/wrong.png') }}" alt=""></i></td>
                </tr>
                <tr>
                    <td>Profile Image</td>
                    <td class="profile"><img src="{{ $user->profile ? asset('storage/users/'.$user->profile) : asset('image/user-profile.png') }}" alt=""></td>
                    <td><i><img src="{{ asset('image/ok.png') }}" alt=""></i></td>
                </tr>
                <tr>
                    <td>Location:</td>
                    <td>{{ $user->location }}</td>
                    <td><i><img src="{{ asset('image/ok.png') }}" alt=""></i></td>
                </tr>
                <tr>
                    <td>Sex:</td>
                    <td>{{ $user->sex }}</td>
                    <td><i><img src="{{ asset('image/wrong.png') }}" alt=""></i></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td>+{{ $user->phoneNumber }}</td>
                    <td><i><img src="{{ asset('image/ok.png') }}" alt=""></i></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>{{ $user->email }}</td>
                    <td><i><img src="{{ asset('image/ok.png') }}" alt=""></i></td>
                </tr>
                <tr class="edit-row">
                    <td>

                    </td>
                    <td></td>
                    <td colspan="3">
                        <a href="{{ route('user.profile.edit',$user->id) }}" class="edit-link"><img src="{{ asset('image/edit2.png') }}" alt=""><span>Edit</span></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
