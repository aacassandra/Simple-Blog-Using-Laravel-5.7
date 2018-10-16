@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="card-header">Edit Post</div>

            <div class="card-body">
              <form action="{{ route('post.update', $post) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group has-feedback{{ $errors->has('title') ? ' has-error' :'' }}">
                  <label for="">Title</label>
                  <input type="text" class="form-control" value="{{ $post->title }}" name="title" placeholder="Post Title" value="{{ old('title') }}">
                  @if ($errors->has('title'))
                    <span class="help-block">
                      <p>{{ $errors->first('title') }}</p>
                    </span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="">Category</label>
                  <select class="form-control" name="category_id">
                    @foreach ($categories as $category)
                      <option
                        value="{{ $category->id }}"
                        @if($category->id === $post->category_id)
                          selected
                        @endif
                      >
                      {{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group has-feedback{{ $errors->has('content') ? ' has-error' :'' }}">
                  <label for="">Content</label>
                  <textarea name="content" rows="5" class="form-control" placeholder="Post Content">{{ $post->content }}</textarea>
                  @if ($errors->has('content'))
                    <span class="help-block">
                      <p>{{ $errors->first('content') }}</p>
                    </span>
                  @endif
                </div>
                <div class="form-group">
                  <input type="submit" value="Save" class="btn btn-primary">
                  <input type="button" value="Cancel" class="btn btn-danger" onclick="window.location.href='{{ route('post.index') }}'" />
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
