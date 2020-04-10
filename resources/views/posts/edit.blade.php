@extends('basic')
@section('content')
<form action="{{route('post.update', ['id' => $post->id])}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{$post->title}}">
    <textarea name="content" cols="30" rows="10">{{$post->content}}</textarea>
    <button type="submit">Update post</button>
</form>
@endsection
