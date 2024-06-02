@extends('base')

@section('content')
    <form action="{{ route('auth.authenticate') }}" method="post">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Login</button>
    </form>
    <a href="{{ route('auth.register') }}">Register</a>
@endsection
