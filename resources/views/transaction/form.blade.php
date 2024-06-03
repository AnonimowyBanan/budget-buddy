@extends('base')

@section('content')
    <form action="{{ isset($transaction) ? route('transaction.edit', ['transactionID' => $transaction->id]) : route('transaction.add') }}" method="POST">
        @csrf
        <x-select-field
            name="transaction_category_id"
            :options="$transactionCategories"
            :required="true"
            :selected="$transaction->category_id ?? 0"
        />
        <x-select-field
            name="transaction_type_id"
            :options="$transactionTypes"
            :required="true"
            :selected="$transaction->type_id ?? 0"
        />
        <x-input-field
            label="Amount"
            type="number"
            name="amount"
            :required="true"
            :value="$transaction->amount ?? null"
        />
        <x-input-field
            label="Transaction date"
            type="date"
            name="transaction_date"
            :required="true"
            :value="$transaction->transaction_date ?? null"
        />

        <button class="btn">{{ isset($transaction) ? __('messages.edit') : __('messages.add') }}</button>
    </form>
@endsection
