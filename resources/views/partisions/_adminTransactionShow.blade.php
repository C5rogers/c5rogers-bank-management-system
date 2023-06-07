<div class="table">
            <div class="title">
                <h1>Transaction Histry</h1>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>User Account NO</th>
                        <th>Date</th>
                        <th>Ammount</th>
                        <th>Type</th>
                        <th>Destination Account</th>
                        <th colspan="2" class="action-column">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count=1;
                    @endphp
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $count }}</td>
                            @foreach ($users as $user)
                                @if ($transaction->user_id==$user->id)
                                    <td>{{ $user->accountNumber }}</td>
                                    @break
                                @endif
                            @endforeach
                            <td>{{ $transaction->transactionTime }}</td>
                            <td>{{ $transaction->ammount }}</td>
                            <td>{{ $transaction->type }}</td>
                            <td>{{ $transaction->destinationOrFrom }}</td>
                            <td>
                                <form action="/admin/{{auth()->id()}}/delete/transaction/{{ $transaction->id }}" method="POST">
                                    @csrf
                                    <button type="submit" name="delete" class="abort delete"><img src="{{ asset('image/delete.png') }}" alt="" class="action-images"></button>
                                </form>
                            </td>
                            @php
                                $count++;
                            @endphp
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>