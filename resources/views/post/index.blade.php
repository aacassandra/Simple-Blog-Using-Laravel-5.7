@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
          @foreach ($posts as $post)
            <div class="card">
                <div class="card-header">
                  {{ $post->title }}
                  @if ($post->user_id == auth()->id())
                    <div class="btn-group float-right" role="group">
                        <form action="{{ route('post.destroy',$post) }}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Remove</button>
                        </form>
                    </div>
                    <div class="btn-group mr-2 float-right" role="group">
                      <form action="{{ route('post.edit_onButton',$post) }}" method="post">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</button>
                      </form>
                    </div>
                  @endif
                </div>
                <div class="card-body">
                  <small><i class="fa fa-tag"></i> {{ $post->category->name }}, Post by <b>{{ $post->user->name }}</b> @ {{ $post->created_at->diffForHumans() }}</small>
                  @if (strlen($post->content) >= 500)
                    <p>{!! str_limit($post->content, 500, '...') !!} <a href="{{ route('post.show',$post) }}"><b>(Read more)</b></a></p>
                  @else
                    <p>{!! $post->content !!} <a href="{{ route('post.show',$post) }}"><br><b>(Read more)</b></a></p>
                  @endif
                </div>
            </div>
            <br/>
          @endforeach
        </div>
    </div>
</div>
@endsection
