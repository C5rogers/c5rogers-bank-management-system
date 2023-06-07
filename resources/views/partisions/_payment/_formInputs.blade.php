<div class="form-cont">
    <label for="companysAccount" class="label">Companys Account Number:</label>
    <div class="cont">
        <i><img src="{{ asset('image/key.png') }}" alt=""></i>
        <input type="text" name="companyAccount" placeholder="Companys Account" class="input input1" id="account" value="{{ $company->accountNumber }}">
        <p class="error-message-for-input forinput1"></p>
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
        <input type="submit" name="pay" value="Pay">
    </div>
</div>