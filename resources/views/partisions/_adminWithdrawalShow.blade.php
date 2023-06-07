<div class="table">
    <div class="title">
        <h1>Withdrawal Request</h1>
    </div>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>User AccountNumber</th>
                <th>User Name</th>
                <th>Ammount</th>
                <th>Tokens</th>
                <th colspan="2" class="action-column">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count=1;
            @endphp
            @foreach ($withdraws as $withdraw)
                <tr>
                    <td>{{ $count }}</td>
                    @foreach ($users as $user)
                        @if ($user->id==$withdraw->user_id)
                            <td>{{ $user->accountNumber }}</td>
                            <td>{{ $user->name }}</td>
                            @break
                        @endif
                    @endforeach
                    <td>{{ $withdraw->ammount }}</td>
                    <td>{{ $withdraw->token }}</td>
                    <td>
                        <form action="/admin/{{ auth()->id() }}/delete/withdraw/{{ $withdraw->id }}" method="POST">
                            @csrf
                            <button class="abort delete"><img src="{{ asset('image/delete.png') }}" alt=""></button>
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