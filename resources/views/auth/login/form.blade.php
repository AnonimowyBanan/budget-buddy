@extends('base')

@section('content')
    <form action="{{ route('auth.authenticate') }}" method="post">
        @csrf
        <x-input-field
            :label="__('messages.email')"
            type="email"
            name="email"
            :required="true"
        />
        <x-input-field
            :label="__('messages.password')"
            type="password"
            name="password"
            :required="true"
        />

        <button type="submit" class="btn btn-primary">{{ __('messages.login') }}</button>
    </form>
    <a href="{{ route('auth.register') }}">Login</a>
@endsection
