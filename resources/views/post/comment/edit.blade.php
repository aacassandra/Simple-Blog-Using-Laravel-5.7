@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-md-offset-2">
        <!-- Box for Edit Comments -->
        <div class="card">
            <div class="card-header">
              Edit comment
            </div>
            <div class="card-body">
                <form action="{{ route('post.comment.update', [$post,$comment]) }}" method="post" class="form-horizontal">
                  {{ csrf_field() }}
                  {{ method_field('PATCH') }}
                  <div class="form-group has-feedback{{ $errors->has('message') ? ' has-error' :'' }}">
                    <textarea name="message" rows="5" cols="30" class="form-control" placeholder="What's on your mind?">{{ $comment->message }}</textarea>
                    @if ($errors->has('message'))
                      <span class="help-block">
                        <p>{{ $errors->first('message') }}</p>
                      </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <input type="button" value="Cancel" class="btn btn-danger" onclick="window.location.href='{{ route('post.index') }}'" />
                    <input type="submit" class="btn btn-primary" value="REPLACE COMMENT">
                  </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
