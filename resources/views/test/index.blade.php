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
                        <div class="card-post-description">
                            {{ Str::limit($post->description, 100, ' ...') }}
                        </div>
                        <div class="card-post-time">
                            <time>The post was created on {{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}</time>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection


