<div class="card-body">
    @foreach($comments as $comment)
    <div class="card card-flush shadow-sm">
        <div class="card-header">
            <p class="card-title fs-6">
                By: {{$comment->user->name}}&nbsp;<span class="text-muted">on {{$comment->created_at->diffForHumans()}}</span>
            </p>
        </div>
        <div class="card-body">
            <p class="text-muted font-size-sm">
                <span class="font-weight-bold">
                    {{ $comment->content }}
                </span>
            </p>
        </div>
        <div class="card-footer">
            @foreach ($comment->replies as $reply)
            <hr class="my-4">
            <p class="text-muted font-size-sm">
                <span class="font-weight-bold">
                    <p class="card-title text-muted fs-6">
                        Reply by: {{$reply->user->name}}
                    </p>
                    {{ $reply->content }}
                </span>
            </p>
            @endforeach
        </div>
    </div><br>
    @endforeach
</div>
{{ $comments->links('theme.app.pagination') }}