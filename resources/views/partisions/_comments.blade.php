<div class="table">
    <div class="title">
        <h1>Withdrawal Request</h1>
    </div>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>Title</th>
                <th>User Name</th>
                <th>Email</th>
                <th>PhoneNumber</th>
                <th colspan="2" class="action-column">Details</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($conmments as $comment)
                @php
                    $count=1;
                @endphp
                <tr>
                    <td>{{ $count }}</td>
                    <td>{{ $comment->title }}</td>
                    <td>{{ $comment->userName }}</td>
                    <td>{{ $comment->email }}</td>
                    <td>{{ $comment->phoneNumber }}</td>
                    <td>
                        <form action="/admin/{{ auth()->user()->id }}/see/comment/{{ $comment->id }}" method="POST">
                            @csrf
                            <button class="activate"><img src="{{ asset('image/detail.png') }}" alt=""></button>
                        </form>
                    </td>
                </tr>
                @php
                    $count++;
                @endphp
            @endforeach
        </tbody>
    </table>
</div>