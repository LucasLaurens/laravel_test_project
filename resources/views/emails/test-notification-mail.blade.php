@extends('layouts.main')

@section('title', 'Mon super mail')

@section('content')
    @parent
    
    <div>
        <h1>Hi, {{ $user->name }}</h1>
    </div>
@endsection


