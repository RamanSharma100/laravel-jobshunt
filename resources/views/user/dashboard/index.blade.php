@extends('layouts.app')

@section('title') Job Dashboard @endsection

@section('content')

    @include('components.message')
    <div>
        <h1>Welcome, {{auth()->user()->name}}</h1>
        @if(auth()->user()->role == "employer")
            <p>Your trial will expire on {{ auth()->user()->user_trial }}</p>
        @endif

        <div>
            <a href="#">User profile</a> | 
            <a href="#">Post Job</a> |
            <a href="#">All Jobs</a>
        </div>
    </div>

@endsection