@extends('layouts.main')

@section('content')

@php
    $title = 'User List'
@endphp

    <h1>{{ $title }}</h1>
        <button type="button" class="btn-submit" onclick="window.location.href='/users/create'">Create New User</button>
    <ul>
    @foreach($users as $user)
        @if($loop->index > 0)
        <li>{{  $user->name }}</li>
        @endif
    @endforeach
    </ul>

@endsection

