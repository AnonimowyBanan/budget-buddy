@extends('base')

@section('content')
    <form action="{{ route('transaction.store') }}" method="POST">
        @csrf
        <x-select-field
            name="transaction_category_id"
            :options="$transactionCategories"
            :required="true"
        />
        <x-select-field
            name="transaction_type_id"
            :options="$transactionTypes"
            :required="true"
        />
        <input type="number" placeholder="Type here" class="input w-full max-w-xs" />
        <input type="date" placeholder="Type here" class="input w-full max-w-xs" />
        <button class="btn">Button</button>
    </form>
@endsection
