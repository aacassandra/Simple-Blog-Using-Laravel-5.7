<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
class PostController extends Controller
{
    Public function index()
    {
      $posts = Post::all();
      return view('post.index',compact('posts'));
    }

    Public function create()
    {
      $categories = Category::all();
      return view('post.create',compact('categories'));
    }

    Public function store()
    {
      $this->validate(request(),[
        'title'       => 'required',
        'content'     => 'required|min:10',
      ]);

      Post::create([
        'title'       => request('title'),
        'user_id'     =>auth()->id(),
        'slug'        => str_slug(request('title')),
        'content'     => request('content'),
        'category_id' => request('category_id')
      ]);

      return redirect()->route('post.index')->with('success','Post successfully added');
    }

    Public function edit_backup($id)
    {
      $post = Post::find($id);
      $categories = Category::all();
      return view('post.edit',compact('post','categories'));
    }

    Public function update_backup($id)
    {
      $post = Post::find($id);
      $post->update([
        'title' => request('title'),
        'content' => request('content'),
        'category_id' => request('category_id')
      ]);
      return redirect()->route('post.index');
    }

    //update data with model binding by Laravel Future

    Public function edit(Post $post)
    {
      $categories = Category::all();
      return view('post.edit',compact('post','categories'));
    }

    Public function edit_onButton(Post $post)
    {
      $categories = Category::all();
      return view('post.edit',compact('post','categories'));
    }

    Public function update(Post $post)
    {
      $this->validate(request(),[
        'title'       => 'required',
        'content'     => 'required|min:10',
      ]);

      $post->update([
        'title' => request('title'),
        'content' => request('content'),
        'category_id' => request('category_id')
      ]);
      return redirect()->route('post.index')->with('info','Post successfully change');
    }

    Public function destroy(Post $post)
    {
      $post->delete();
      return redirect()->route('post.index')->with('danger','Post successfully remove');
    }

    Public function show(Post $post){
      $categories = Category::all();
      return view('post.show',compact('post','categories'));
    }
}
