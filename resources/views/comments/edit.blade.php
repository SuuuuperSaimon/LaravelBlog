@extends('basic')
@section('content')
    <form action="{{route('comment.update', ['id' => $comment->post_id, 'comment_id' => $comment->id])}}" method="POST">
        @csrf
        @method('PUT')
        <textarea name="content" cols="30" rows="10">{{$comment->text}}</textarea>
        <button type="submit">Update comment</button>
    </form>
@endsection
