<main>
    <div class="custome-alert-box" style="top:20%;">
        <div class="exit-btn"><button class="exit2">&times;</button></div>
        <div class="success-content"></div>
    </div>
    <div class="form-container">
        <fieldset>
            <legend><i><img src="{{ asset('image/bankDashbord/cashout2.png') }}" alt=""></i></legend>
            <form action="{{ route('user.cashOut',$user->id) }}" method="POST" id="form">
                @csrf
                <div class="form-cont">
                    <label for="account-number" class="label">Confirm Account Number:</label>
                    <div class="cont">
                        <i><img src="{{ asset('image/user-profile.png') }}" alt=""></i>
                        <input type="text" name="accountNumber" placeholder="Account Number" min="0" class="input accountNumber" value="{{ $user->accountNumber }}">
                        <p class="error-message-for-input">
                            @error('accountNumber')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="form-cont">
                    <label for="ammount" class="label">Ammount:</label>
                    <div class="cont">
                        <i><img src="{{ asset('image/bankDashbord/balance.png') }}" alt=""></i>
                        <input type="number" name="ammount" placeholder="Ammount" min="0" class="input ammount">
                        <p class="error-message-for-input">
                            @error('ammount')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="form-cont">
                    <div class="button">
                        <input type="submit" name="withdraw" value="Withdraw">
                    </div>
                </div>
            </form>
        </fieldset>
    </div>
</main>
