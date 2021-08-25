@extends('layouts.main')

@section('title', 'Home')

@section('content')
    @parent
    
    <div>
        <h3>Home</h3>

        <div>
            @foreach ($categories as $category)
                <div><strong>{{ $category->title }}</strong></div>
                @foreach ($category->posts as $post)
                    <div>{{ $post->title }}</div>
                    <div>{{ $post->description }}</div>
                    <div>{{ $post->created_at }}</div>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection


