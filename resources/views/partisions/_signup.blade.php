<!-- this is the main page for the signup page -->
<main>
    <!-- this is the alert box -->
    <div class="custome-alert-box">
        <div class="exit-btn"><button class="exit2">&times;</button></div>
        <div class="alert-content">this is the message</div>
    </div>

    <div class="hero">
        <!-- this is the form we need for now -->
        <div class="form-container">
            <fieldset>
                <legend><i><img src="{{ asset('image/adduser.png') }}" alt=""></i></legend>
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" id="form">
                    @csrf
                    <div class="form-cont">
                        <label for="userName" class="label">User Name:</label>
                        <div class="cont">
                            <i><img src="{{ asset('image/user-profile.png') }}" alt=""></i>
                            <input type="text" name="name" placeholder="User Name" class="input input1" value="{{ old('name') }}">
                            <p class="error-message-for-input forinput1">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="form-cont">
                        <label for="email" class="label">Email:</label>
                        <div class="cont">
                            <i><img src="{{ asset('image/email.png') }}" alt=""></i>
                            <input type="email" name="email" placeholder="Email" class="input input2" value="{{ old('email') }}">
                            <p class="error-message-for-input forinput2">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="form-cont">
                        <label for="phone" class="label">Phone Number:</label>
                        <div class="cont">
                            <i><img src="{{ asset('image/phone.png') }}" alt=""></i>
                            <input type="number" placeholder="+1925.." name="phoneNumber" class="input input5" min="0" value="{{ old('phoneNumber') }}">
                            <p class="error-message-for-input forinput5">
                                @error('phoneNumber')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="form-cont">
                        <label for="password" class="label">Password:</label>
                        <div class="cont">
                            <i><img src="{{ asset('image/password.png') }}" alt=""></i>
                            <input type="password" name="password" placeholder="Password" id="password1" class="password1 input input3" value="{{ old('password') }}">
                            <p class="error-message-for-input forinput3">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </p>
                            <button class="visiblility1 eye-button"><img src="{{ asset('image/visible.png') }}" class="eye1"alt=""></button>
                        </div>
                    </div>
                    <div class="form-cont">
                        <label for="confirmpassword" class="label">Confirm Password:</label>
                        <div class="cont">
                            <i><img src="{{ asset('image/confirm.png') }}" alt=""></i>
                            <input type="password" name="password_confirmation" id="password2" class="input password2 input4" placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
                            <p class="error-message-for-input forinput4">
                                @error('password_confirmation')
                                    {{ $message }}
                                @enderror
                            </p>
                            <button class="visiblility2 eye-button"><img src="{{ asset('image/visible.png') }}" class="eye2" alt=""></button>
                        </div>
                    </div>
                    <div class="form-cont">
                        <label for="location" class="label">Location:</label>
                        <div class="cont">
                            <i><img src="{{ asset('image/location.png') }}" alt=""></i>
                            <input type="text" name="location" placeholder="Location" class="capitalaize input input6" value="{{ old('location') }}">
                            <p class="error-message-for-input forinput6">
                                @error('location')
                                   {{ $message }} 
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="form-cont">
                        <label for="sex" class="label">Sex:</label>
                        <div class="cont sex-cont">
                            <div class="male">
                                <input type="radio" name="sex" value="M" selected>
                                <i class="sex"><img src="{{ asset('image/male.png') }}" alt=""></i><label for="male" class="label">Male</label>
                            </div>
                            <div class="female">
                                <input type="radio" name="sex" value="F">
                                <i class="sex"><img src="{{ asset('image/femail.png') }}" alt=""></i><label for="" class="label">Femail</label>
                            </div>
                            <p class="error-message-for-input forinput7">
                                @error('sex')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="form-cont">
                        <label for="profile" class="label">Profile Picture:</label>
                        <div class="cont">
                            <i><img src="{{ asset('image/image.png') }}" alt=""></i>
                            <input type="file" name="profile" class="input" value="{{ old('profile') }}">
                            <p class="error-message-for-input">
                                @error('profile')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="form-cont">
                        <a href="{{ route('user.login') }}">i have account!</a>
                    </div>
                    <div class="form-cont">
                        <div class="button">
                            <input type="reset" name="reset" value="Reset">
                        </div>
                        <div class="button">
                            <input type="submit" name="signup" value="Sign Up">
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</main>
