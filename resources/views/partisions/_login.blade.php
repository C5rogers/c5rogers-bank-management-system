<!-- this contain the main part -->
<main>
    <!-- this is the alert box -->
    <div class="custome-alert-box">
        <div class="exit-btn"><button class="exit2">&times;</button></div>
        <div class="alert-content"></div>
    </div>


    <!-- this is the content that we need -->
    <div class="hero">
        <div class="form-container">
            <fieldset>
                <legend><i><img src="{{ asset('image/locked.png') }}" alt=""></i></legend>
                <form action="{{route('user.authonticate')}}" method="POST" id="form">
                    @csrf
                    <div class="form-cont">
                        <label for="email" class="label">Email:</label>
                        <div class="cont">
                            <i><img src="{{ asset('image/email.png') }}" alt=""></i>
                            <input type="email" name="email" placeholder="Email" class="input input1" value="{{ old('email') }}">
                            <p class="error-message-for-input forinput1">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="form-cont">
                        <label for="password" class="label">Passwrod:</label>
                        <div class="cont">
                            <i><img src="{{ asset('image/password.png') }}" alt=""></i>
                            <input type="password" placeholder="Password" name="password" class="password1 input input2" value="{{ old('password') }}">
                            <button class="visiblility1 eye-button"><img src="{{ asset('image/visible.png') }}" class="eye1" alt=""></button>
                            <p class="error-message-for-input forinput2">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="form-cont">
                        <a href="{{ route('user.signup') }}">I don't have account</a>
                    </div>
                    <div class="form-cont">
                        <div class="button">
                            <input type="reset" name="reset" value="Reset">
                        </div>
                        <div class="button">
                            <input type="submit" name="login" value="Login">
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</main>
