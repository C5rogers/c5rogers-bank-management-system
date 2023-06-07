<main>
    <div class="hero">
        <div class="form-container">
            <fieldset>
                <legend><i><img src="{{ asset('image/edit2.png') }}" alt=""></i></legend>
                <form action="{{ route('user.profile.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-cont">
                        <label for="userName" class="label">User Name:</label>
                        <div class="cont">
                            <i><img src="{{ asset('image/user-profile.png') }}" alt=""></i>
                            <input type="text" name="name" placeholder="User Name" class="input input1" value="{{ $user->name }}">
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
                            <input type="email" name="email" placeholder="Email" class="input input2" value="{{ $user->email }}">
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
                            <input type="number" placeholder="+1925.." name="phoneNumber" class="input input4" min="0" value="{{ $user->phoneNumber }}">
                            <p class="error-message-for-input forinput5">
                                @error('phoneNumber')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="form-cont">
                        <label for="location" class="label">Location:</label>
                        <div class="cont">
                            <i><img src="{{ asset('image/location.png') }}" alt=""></i>
                            <input type="text" name="location" placeholder="Location" class="capitalaize input" value="{{ $user->location }}">
                            <p class="error-message-for-input forinput6">
                                @error('location')
                                   {{ $message }} 
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="form-cont">
                        <label for="profile" class="label">Profile Picture:</label>
                        <div class="cont">
                            <i><img src="{{ asset('image/image.png') }}" alt=""></i>
                            <input type="file" name="profile" class="input" >
                            <p class="error-message-for-input">
                                @error('profile')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="form-cont">
                        <div class="button">
                            <input type="reset" name="reset" value="Reset">
                        </div>
                        <div class="button">
                            <input type="submit" name="edit" value="Edit">
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</main>