@extends('layouts.main')

@section('title', 'Upload File')

@section('content')

    @foreach ($images as $image)
        <img width="100" height="100" src="{{  Storage::url($image->path) }}" alt="{{ $image->name }}">
    @endforeach

    <x-upload-file-form />

@endsection