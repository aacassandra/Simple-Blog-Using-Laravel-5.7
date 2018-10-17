@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-md-offset-2">
        <!-- Box Detail Post -->
        <div class="card">
            <div class="card-header">
              {{ $post->title }}</small>
              <div class="btn-group float-right" role="group">
                <button type="submit" class="btn btn-sm btn-danger" onclick="window.location.href='{{ route('post.index') }}'"><i class="fa fa-chevron-left"></i> Back</button>
              </div>
            </div>
            <div class="card-body">
                <p>{!! $post->content !!}</p><br>
                <small><i class="fa fa-tag"></i> {{ $post->category->name }}, Post by <b>{{ $post->user->name }}</b> @ {{ $post->created_at->diffForHumans() }}</small>
            </div>
        </div><br/>
        <!-- Box for Show Comments -->
        @foreach ($post->comments()->get() as $comment)
          <div class="card">
              <div class="card-header">
                {{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}
                @if ($comment->user_id == auth()->id())
                  <div class="btn-group float-right" role="group">
                    <form action="" id="btn-comment-delete" onsubmit="return comment_destrox()">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <input type="hidden" name="_id" value="{{ $comment->id }}">
                      <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                    </form>
                  </div>
                  <div class="btn-group mr-2 float-right" role="group">
                    <form action="{{ route('post.comment.edit',[$post,$comment]) }}" method="post">
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-sm btn-success">Edit</button>
                    </form>
                  </div>
                @endif
              </div>
              <div class="card-body">
                {!! $comment->message !!}
              </div>
          </div>
          <br/>
        @endforeach
        <!-- Box for Add Comments -->
        <div class="card">
            <div class="card-header">
              Leave a Reply
            </div>
            <div class="card-body">
                <form action="{{ route('post.comment.store',$post) }}" method="post" class="form-horizontal">
                  {{ csrf_field() }}
                  <div class="form-group has-feedback{{ $errors->has('message') ? ' has-error' :'' }}">
                    <textarea name="message" rows="5" cols="30" class="form-control" placeholder="What's on your mind?"></textarea>
                    @if ($errors->has('message'))
                      <span class="help-block">
                        <p>{{ $errors->first('message') }}</p>
                      </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">POST COMMENT <i class="fa fa-paper-plane"></i></button>
                  </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
