@extends('layouts.main')

@section('title', 'Mon super mail')

@section('content')
    @parent
    
    <div>
        <h3>Mon super mail</h3>
        <p>Bonjour, {{ $user['name'] }}</p>
    </div>
@endsection


