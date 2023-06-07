<!-- thsi is the main displayed contents! -->
<div class="hero">
    <div class="some-description">
        <article>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod nibh vitae euismod varius. Proin tempor, est sed malesuada gravida, dolor ex aliquam leo, et cursus diam velit ut mauris. Fusce maximus tortor vel consectetur
                rhoncus. Nulla nec urna bibendum, luctus nunc sit amet, congue libero. Etiam non molestie ante, vitae suscipit risus. </p>
        </article>
    </div>
    <div class="form-container">
        <fieldset>
            <legend><i><img src="{{ asset('image/sending.png') }}" alt=""></i></legend>
            <form action="{{ route('user.contact.send') }}" method="POST" id="form">
                @csrf
                <div class="form-cont">
                    <label for="issueType" class="label">Issue Title:</label>
                    <div class="cont">
                        <i><img src="{{ asset('image/title.png') }}" alt=""></i>
                        <input type="text" name="title" class="input input1" placeholder="Issue Title" value="{{ old('title') }}">
                        <p class="error-message-for-input forinput1">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="form-cont">
                    <label for="full Name" class="label">Full Name:</label>
                    <div class="cont">
                        <i><img src="{{ asset('image/user-profile.png') }}" alt=""></i>
                        <input type="text" name="userName" class="input input2" placeholder="Full Name"  value="{{ old('userName') }}">
                        <p class="error-message-for-input forinput2">
                            @error('userName')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="form-cont">
                    <label for="email" class="label">Email</label>
                    <div class="cont">
                        <i><img src="{{ asset('image/email.png') }}" alt=""></i>
                        <input type="email" name="email" class="input input3" placeholder="Email" value="{{ old('email') }}">
                        <p class="error-message-for-input forinput3">
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
                        <input type="number" placeholder="+1925.."  name="phoneNumber" class="input input4" min="0" value="{{ old('phoneNumber') }}">
                        <p class="error-message-for-input forinput4">
                            @error('phoneNumber')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="form-cont">
                    <label for="issue" class="label">Issue:</label>
                    <div class="description">
                        <i class="description-icon"><img src="{{ asset('image/description.png') }}" alt=""></i>
                        <textarea name="issue" id=" " cols="30 " rows="10 " placeholder="the issue is.... " class="input5">{{ old('issue') }}</textarea>
                        <p class="error-message-for-input forinput5">
                            @error('issue')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="form-cont">
                    <div class="button">
                        <button class="send"><img src="{{ asset('image/sending.png') }}" alt=""></button>
                    </div>
                </div>
            </form>
        </fieldset>
    </div>
</div>