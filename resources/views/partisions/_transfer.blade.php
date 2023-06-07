
 <main>
    <div class="custome-alert-box">
        <div class="exit-btn"><button class="exit2">&times;</button></div>
        <div class="alert-content">this is the message</div>
    </div>


    <!-- this is the form fild to input some filds and validate -->
    <div class="form-container">
        <fieldset>
            <legend><i><img src="{{ asset('image/bankDashbord/transfer3.png') }}" alt=""></i></legend>
            <form action="{{ route('user.makeTransfer',auth()->id()) }}" method="POST" id="form">
                @csrf
                <div class="form-cont">
                    <label for="destination Account" class="label">For Account:</label>
                    <div class="cont">
                        <i><img src="{{ asset('image/user-profile.png') }}" alt=""></i>
                        <input type="text" name="destinationAccount" placeholder="For Account" class="input input1" value="{{ old('destinationAccount') }}">
                        <p class="error-message-for-input">
                            @error('destinationAccount')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="form-cont">
                    <label for="ammount" class="label">Ammount:</label>
                    <div class="cont">
                        <i><img src="{{ asset('image/bankDashbord/balance.png') }}" alt=""></i>
                        <input type="number" name="ammount" placeholder="Ammount" class="input input2" value="{{ old('ammount') }}">
                        <p class="error-message-for-input">
                            @error('ammount')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="form-cont">
                    <div class="button">
                        <input type="submit" name="transfer" value="Transfer">
                    </div>
                </div>
            </form>
        </fieldset>
    </div>

</main>

