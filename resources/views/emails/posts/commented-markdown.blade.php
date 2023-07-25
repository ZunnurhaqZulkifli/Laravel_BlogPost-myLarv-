@component('mail::message')
# Comment Was Posted on Your Blog Post!

Hi There {{ $comment->commentable->user->name }} !

Post Title : {{ $comment->commentable->title }}

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
