<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
class PostCommentController extends Controller
{
    //Style 1: jika mau di pakai hapus '_backup'
    Public function store_backup(Request $request, Post $post)
    {
      Comment::create([
        'post_id'=>$post->id,
        'user_id'=>auth()->id(),
        'message'=>$request->message
      ]);
      return redirect()->back();
    }

    //Style 2
    Public function store(Request $request, Post $post)
    {
      $this->validate(request(),[
        'message'    => 'required|min:10',
      ]);

      $post->comments()->create(array_merge(
          $request->only('message'),
          ['user_id' => auth()->id()]
      ));
      return redirect()->back();
    }

    Public function edit(Post $post, Comment $comment)
    {
      return view('post.comment.edit',compact('post','comment'));
    }

    Public function update(Post $post, Comment $comment)
    {
      $this->validate(request(),[
        'message' => 'required|min:10',
      ]);

      $comment->update([
        'message' => request('message')
      ]);
      return redirect()->route('post.show',$post)->with('success','Comment successfully change');
    }

    Public function destroy(Post $post, Comment $comment)
    {
      $comment->delete();
      return redirect()->route('post.show',$post)->with('danger','Comment successfully remove');
    }

    Public function destrox()
    {
      $id = request('_id');
      $comment = Comment::find($id);
      $comment->delete();
      $data['status'] = 'success';
      echo json_encode($data);
    }
}
