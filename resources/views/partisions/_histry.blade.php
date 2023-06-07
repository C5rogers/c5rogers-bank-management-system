<main>

    {{-- this the success message for the deleted histry --}}
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

    <div class="table">
        <div class="title">
            <h1>Account Report</h1>
        </div>
        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Account NO</th>
                    <th>Date</th>
                    <th>Ammount</th>
                    <th>Type</th>
                    <th>Destination Account</th>
                    <th colspan="2" class="action-column">Action</th>
                    <!-- <th></th> -->
                </tr>
            </thead>
            <tbody>
                @php
                    $number=1;
                @endphp
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $number }}</td>
                        <td>{{ $user->accountNumber }}</td>
                        <td>{{ $transaction->transactionTime }}</td>
                        <td>{{ $transaction->ammount }}</td>
                        <td>{{ $transaction->type }}</td>
                        <td>{{ $transaction->destinationOrFrom }}</td>
                        <td>
                            <form action="{{route('user.transaction.delete',$transaction->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="delete"><img src="{{ asset('image/delete.png') }}" alt="" class="action-images"></button>
                            </form>
                        </td>
                        @php
                            $number++;
                        @endphp
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>