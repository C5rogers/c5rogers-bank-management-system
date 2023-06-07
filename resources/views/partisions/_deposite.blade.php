<div class="form-cont">
    <label for="companysAccount" class="label">Conform Account Number:</label>
    <div class="cont">
        <i><img src="{{ asset('image/key.png') }}" alt=""></i>
        <input type="text" name="accountNumber" placeholder="Account Number" class="input input1" id="account" value="{{ $user->accountNumber }}">
        <p class="error-message-for-input forinput1">
            @error('record')
                {{ $message }}
             @enderror
        </p>
    </div>
</div>
<div class="form-cont">
    <label for="Ammount" class="label">Amount:</label>
    <div class="cont">
        <i><img src="{{ asset('image/bankDashbord/balance.png') }}" alt=""></i>
        <input type="number" name="ammount" placeholder="Ammount" class="input input2" value="{{ old('ammount') }}">
        <p class="error-message-for-input forinput2">
            @error('ammount')
                {{ $message }}
            @enderror
        </p>
    </div>
</div>
<div class="form-cont">
    <div class="button">
        <input type="submit" name="deposite" value="Deposite">
    </div>
</div>