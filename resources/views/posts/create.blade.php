@extends('basic')
@section('content')
<form action="{{route('post.store')}}" method="POST">
    @csrf
    @method('POST')
    <div>
        <input type="text" name="title" value="">
    </div>
    <div>
        <textarea name="content" cols="30" rows="10"></textarea>
    </div>
    <button type="submit">Create post</button>
</form>
@endsection
