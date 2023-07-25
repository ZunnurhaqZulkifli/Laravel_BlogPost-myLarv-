@component('mail::message')
# Comment was posted on the post you're watching

Hi There {{ $user->name }} !

@component('mail::button', ['url' =>  route('posts.show', ['post' => $comment->commentable->id])])
Go To This Post
@endcomponent

@component('mail::button', ['url' => route('users.show' , ['user' => $comment->user->id])])
{{ $comment->user->name }}'s Profile
@endcomponent

@component('mail::panel')
{{ $comment->user-> name }}, said : {{ $comment->content }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
