@extends('layouts.app')

@section('title') Job Dashboard @endsection

@section('content')

    <div>
        <h1>Welcome, {{auth()->user()->name}}</h1>
        
    </div>

@endsection