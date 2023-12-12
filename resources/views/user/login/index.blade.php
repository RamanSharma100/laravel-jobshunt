@extends('layouts.app')

@section('title') Login @endsection

@section('content')

    <form action="{{route('login.post')}}" method="POST">
        <h1>Login</h1>
        <p>Welcome Back!</p>
        @csrf

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" />
            @if($errors->has('email'))
                <span>{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" />
            @if($errors->has('password'))
                <span>{{ $errors->first('password') }}</span>
            @endif
        </div>

        <button type="submit">Login</button>

    </form>

@endsection