@extends('base')

@section('content')
    <form action="{{ route('transaction.add') }}" method="POST">
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
        <x-input-field
            label="Amount"
            type="number"
            name="amount"
            :required="true"
        />
        <x-input-field
            label="Transaction date"
            type="date"
            name="transaction_date"
            :required="true"
        />

        <button class="btn">Add</button>
    </form>
@endsection
