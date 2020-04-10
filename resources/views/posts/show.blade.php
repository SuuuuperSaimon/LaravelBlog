@extends('basic')
@section('content')
<h1>{{$post->title}}</h1>
<span>{{$post->created_at}}</span>
<p>{{$post->content}}</p>
<a href="{{route('posts')}}">All Posts</a>
<hr>
<h3>COMMENTS:</h3>
@if (Auth::check())
    <form action="{{route('comment.store', ['id' => $post->id])}}" method="POST">
        @csrf
        @method('POST')
        <div>
            <textarea name="text" cols="30" rows="10" placeholder="Enter your comment"></textarea>
        </div>
        <button type="submit">Save</button>
    </form>
@else
    <span>Login to comment</span>
@endif
<ul>

@foreach($post->comment as $comment)
    <li>
        <p>{{$comment->text}}</p>
        <p>{{$comment->user->name}}</p>
        <span>{{$comment->created_at}}</span>
        @if(Auth::check() && (Auth::user()->id == $comment->user_id))
            <a href="{{route('comment.edit', ['comment_id' => $comment->id])}}">Edit comment</a>
            <a href="{{route('comment.delete', ['comment_id' => $comment->id])}}">Delete comment</a>
        @endif
    </li>
@endforeach
</ul>
@endsection

