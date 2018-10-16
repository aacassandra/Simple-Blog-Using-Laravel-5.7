@extends('layouts.app')

@section('content')
<div class="container">
  <form action="{{ route('post.store') }}" method="post">
    {{ csrf_field() }}
    <div class="form-group has-feedback{{ $errors->has('title') ? ' has-error' :'' }}">
      <label for="">Title</label>
      <input type="text" class="form-control" name="title" placeholder="Post Title" value="{{ old('title') }}">
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
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group has-feedback{{ $errors->has('content') ? ' has-error' :'' }}">
      <label for="">Content</label>
      <textarea name="content" rows="5" class="form-control" placeholder="Post Content">{{ old('content') }}</textarea>
      @if ($errors->has('content'))
        <span class="help-block">
          <p>{{ $errors->first('content') }}</p>
        </span>
      @endif
    </div>
    <div class="form-group">
      <input type="submit" value="Save" class="btn btn-primary">
    </div>
  </form>
</div>
@endsection
