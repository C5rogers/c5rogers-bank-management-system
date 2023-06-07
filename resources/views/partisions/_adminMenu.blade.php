<!-- users tableright here -->
<div class="table">
    <div class="title">
        <h1>Available Users</h1>
    </div>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>User Name</th>
                <th>Account NO</th>
                <th>Sex</th>
                <th>Balance</th>
                <th>Location</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Status</th>
                <th colspan="2" class="action-column">Action</th>
                <!-- <th></th> -->
            </tr>
        </thead>
        <tbody>
            @php
                $count=1;
            @endphp
            @foreach ($users as $user)
                <tr>
                    <td>{{ $count }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->accountNumber }}</td>
                    <td>{{ $user->sex }}</td>
                    <td>{{ $user->balance }}</td>
                    <td>{{ $user->location }}</td>
                    <td>{{ $user->email }}</td>
                    <td>+{{ $user->phoneNumber }}</td>
                    <td>{{ $user->status }}</td>
                    @if ($user->status=='active')
                            <td>
                                <form action="/admin/{{ auth()->id() }}/ban/{{ $user->id }}" method="POST">
                                    @csrf
                                    <button type="submit" name="ban"><span class="ban">Ban</span></button>
                                </form>
                            </td>
                    @endif
                    @if ($user->status=='baned')
                        <td>
                            <form action="/admin/{{ auth()->id() }}/allow/{{ $user->id }}" method="POST">
                                @csrf
                                <button type="submit" name="activate"><span class="acivate">Allow</span></button>
                            </form>
                        </td>
                    @endif
                    @php
                        $count++;
                    @endphp
                </tr>
            @endforeach
        </tbody>
    </table>
</div>