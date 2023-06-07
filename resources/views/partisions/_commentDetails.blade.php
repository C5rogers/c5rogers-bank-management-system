<main>
    <div class="commentDetails">
        <div class="title">
            <h1>{{ $comment->title }}</h1>
        </div>
        <article>
            <p>{{ $comment->issue }}</p>
        </article>
        <div class="userName">
            <p>{{ $comment->userName }}</p>
        </div>
        <div class="form">
            <form action="/admin/{{ auth()->user()->id }}/addresses/issue/{{ $comment->id }}" method="POST">
                @csrf
                <button class="activate">Seen</button>
            </form>
        </div>
    </div>
</main>