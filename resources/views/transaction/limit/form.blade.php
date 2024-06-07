@extends('base')

@section('content')
    <form method="POST" action="{{ route('transaction.limit.add') }}">
        @csrf
        <x-select-field
            name="transaction_category_id"
            :options="$transactionCategories"
            :required="true"
            label="Transactions type"
        />
        <x-input-field
            label="Limit"
            type="number"
            name="limit"
            :required="true"
        />

        <button class="btn">Add</button>
    </form>
@endsection
