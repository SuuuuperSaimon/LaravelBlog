<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $comment          = new Comment();
        $comment->user_id = $request->user()->id;
        $comment->post_id = $id;
        $comment->text    = $request->input('text');
        $comment->save();

        return redirect()->route('post.show', ['id' => $id])->with('success', 'Post has been create successfully!');
    }

    /**
     * @param $comment_id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit( $comment_id)
    {
        $comment = Comment::findOrFail($comment_id);

        return view('comments.edit', ['comment' => $comment]);
    }

    /**
     * @param Request $request
     * @param $id
     * @param $comment_id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, $comment_id)
    {
        $comment = Comment::findOrFail($comment_id);
        $comment->text = $request->request->get('content');
        $comment->save();

        return redirect()->route('post.show', ['id' => $comment->post_id])->with('success', 'Post has been update successfully!');
    }

    /**
     * @param $id
     * @param $comment_id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function destroy($comment_id)
    {
        $comment = Comment::findOrFail($comment_id);
        $comment->delete();

        return redirect()->route('post.show', ['id' => $comment->post_id])->with('success', 'Post has been delete successfully!');
    }
}
