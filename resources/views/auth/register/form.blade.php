@extends('base')

@section('content')
    <h2 class="text-center">Register Form</h2>
    <form action="{{ route('auth.register') }}" method="POST">
        @csrf
        <div class="flex flex-col">

            <x-input-field
                label="Name"
                type="text"
                name="name"
                :required="true"
            />

            <x-input-field
                label="Email"
                type="email"
                name="email"
                :required="true"
            />

            <x-input-field
                label="Password"
                type="password"
                name="password"
                :required="true"
            />

            <x-input-field
                label="Repeat password"
                type="password"
                name="repeated_password"
                :required="true"
            />

        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
@endsection
