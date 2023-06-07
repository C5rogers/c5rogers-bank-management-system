
<div class="table">
    <div class="title">
        <h1>Deposite Requiests</h1>
    </div>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>User Name</th>
                <th>Account Number</th>
                <th>Balance</th>
                <th>status</th>
                <th>Profile</th>
                <th>Ammount</th>
                <th colspan="2" class="action-column">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count=1;
            @endphp
            @foreach ($deposites as $deposite)
            <tr>
                <td>{{ $count }}</td>
                @foreach ($users as $user)
                    @if ($user->id==$deposite->user_id)
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->accountNumber }}</td>
                        <td>{{ $user->balance }}</td>
                        <td>{{ $user->status }}</td>
                        <td><i><img src="{{$user->profile ? asset('storage/users/'.$user->profile) : asset('image/user-profile.png')  }}" alt=""></i></td>
                        @break
                    @endif
                @endforeach
                <td>{{ $deposite->ammount }}</td>
                <td>
                    <form action="/admin/{{ auth()->id() }}/grant/deposite/{{ $deposite->id }}" method="post">
                        @csrf
                        <button class="approve"><img src="{{ asset('image/ok.png') }}" alt=""></button>
                    </form>
                </td>
                <td>
                    <form action="/admin{{ auth()->id() }}/revock/deposite/{{ $deposite->id }}" method="POST">
                        @csrf
                        <button class="abort"><img src="{{ asset('image/wrong.png') }}" alt=""></button>
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