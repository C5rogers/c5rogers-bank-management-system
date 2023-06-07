<div class="adminLogin">
    <div class="form-container">
        <fieldset>
            <div class="form-exit">
                <button class="formExit"><div>&times;</div></button>
            </div>
            <legend><i><img src="{{ asset('image/adminLog.png') }}" alt=""></i></legend>
            <form action="{{ route('admin.authonticate') }}" method="POST" id="form">
                @csrf
                <div class="form-cont">
                    <label for="id" class="label">Admin Id:</label>
                    <div class="cont">
                        <i><img src="{{ asset('image/key.png') }}" alt=""></i>
                        <input type="email" name="email" class="input input1" placeholder="email">
                        <p class="error-message-for-input forinput1">
                            @error('adminId')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="form-cont">
                    <label for="password" class="label">Password:</label>
                    <div class="cont">
                        <i><img src="{{ asset('image/password.png') }}" alt=""></i>
                        <input type="password" name="password" class="input input2" placeholder="Password">
                        <p class="error-message-for-input forinput2">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="form-cont">
                    <div class="button">
                        <input type="submit" name="login" value="Login">
                    </div>
                </div>
            </form>
        </fieldset>
    </div>
</div>
