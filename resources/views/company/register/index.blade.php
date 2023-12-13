@extends('layouts.app')

@section('title') Company Registration @endsection

@section('content')

    <form action="{{ route('store.employer') }}" method="POST">
        <h1>Register</h1>

        <h3>Looking For Employees?</h3>
        <h4>Please create an account</h4>

        @csrf

        <div>
            <label for="name">Company Name</label>
            <input type="text" name="name" id="name" />

            @if($errors->has('name'))
                <span>{{ $errors->first('name') }}</span>
            @endif
        </div>
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

        <button type="submit">Register</button>

    </form>

@endsection