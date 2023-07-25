<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

    <p>Hi There, {{ $comment->commentable->user->name }}.</p>

    <p>
        Someone has commented on one of your Blog Post, 
        <a href="{{ route('posts.show', ['post' => $comment->commentable->id]) }}">
            Title : {{ $comment->commentable->title }}
        </a>
    </p>
    
    <hr>

    <div>
        <img src="{{ $message->embed($comment->user->image->url()) }}"/>
    </div>

    <p>
        <a href="{{ route('users.show' , ['user' => $comment->user->id]) }}">{{ $comment->user->name }}</a>
        said :  <br> "{{ $comment->content }}."
    </p>

    <p>Thank You and Have a Nice Day</p>