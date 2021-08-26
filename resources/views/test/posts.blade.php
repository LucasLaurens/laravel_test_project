@extends('layouts.main')

@section('title', 'Posts')

@section('content')

    @foreach ($posts as $post)
        <h3>{{ $post->title }}</h3>
    @endforeach

    {{ $posts->links() }}

@endsection