@extends('layouts.main')

@section('title', 'Home')

@section('content')
    @parent
    
    <div>
        <h3>Home</h3>

        @foreach ($categories as $category)
            <div class="card-category">
                <div class="card-category-title"><strong>{{ $category->title }}</strong></div>
            </div>
        @endforeach
        
        <div class="cards">
            @foreach ($categories as $category)
                @foreach ($category->posts as $post)
                <div class="card-post">
                        <div class="card-post-title"><strong>{{ $post->title }}</strong></div>
                        @if(isset($post->deleted_at))
                            <div><strong style="color: #FF5555;">Has been deleted</strong></div>
                        @endif
                        <div class="card-post-description">
                            {{ Str::limit($post->description, 100, ' ...') }}
                        </div>
                        <div class="card-post-time">
                            <time>The post was created on {{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}</time>
                        </div>
                        <form method="POST" action="{{ route('post.delete', ['id' => $post->id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                    
                            <div class="form-group">
                                <input type="submit" class="btn btn-danger delete-post" value="Delete post">
                            </div>
                        </form>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection


