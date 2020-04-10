@extends('basic')
@section('content')
<table border="1px">
    @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>
                <a href="{{route('post.show', ['id' => $post->id])}}">{{$post->title}}</a>
            </td>
            <td>{{$post->created_at}}</td>
            @if(Auth::user() &&($post->user_id == Auth::user()->id))
                <td>
                    <a href="{{route('post.edit', ['id' => $post->id])}}">EDIT</a>
                </td>
                <td>
                    <a href="{{route('post.delete', ['id' => $post->id])}}">DELETE</a>
                </td>
            @endif
        </tr>
    @endforeach
</table>
@if (Auth::check())
    <a style="border: 1px solid darkred; padding: 2px; background: gray; margin: 5px;" href="{{route('post.create')}}">Add new post</a>
@endif
{{$posts->links()}}
@endsection
