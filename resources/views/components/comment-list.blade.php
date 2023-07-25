<div class="border-orange bg-transparent card p-3 mb-2 shadow-sm">

    <h3 class="text-center text-orange mb-0">Comments</h3>
    <br>

    @forelse($comments as $comment)

        <div class="ps-1 mt-0 text-orange h6">
            {{ $comment->content }}
        </div>

        <div class="fs-7 opacity-50 mb-1">
            @tags(['tags' => $comment->tags])
            @endtags
            @updated(['date' => $comment->created_at, 'name' => $comment->user->name, 'userId' => $comment->user->id])
            @endupdated
        </div>

        <hr class="text-orange">

    @empty
        <h4 class="mt-0 fs-5 text-bold text-center">No comments yet!</h4>
    @endforelse