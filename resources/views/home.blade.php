@extends('base')

@section('content')
    <a href="{{ route('transaction.add') }}">Add transaction</a>
    <div class="rounded border-solid border-2 border-sky-500 p-3 w-1/2 mt-3 mb-3">
        <p class="text-2xl text-center">
            <span>{{ __('messages.budget') }}</span>
        </p>

        <div class="flex justify-between">
            <div>
                <p>Available: {{ $budget->amount }}</p>
                <a class="btn btn-square btn-outline" href="{{ route('transaction.viewDdd') }}"><x-css-add /></a>
            </div>
            <div>
                <x-chart
                    name="User Budget"
                    type="doughnut"
                    :labels="['Available funds', 'Expenses']"
                    :data="[(float) $budget->amount]"
                />
            </div>
        </div>
    </div>
    <div class="rounded border-solid border-2 border-sky-500 p-3 mt-3 mb-3">
        <p class="text-2xl text-center">
            <span>{{ __('messages.transactions') }}</span>
        </p>
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>{{ __('messages.transaction_type') }}</th>
                        <th>{{ __('messages.transaction_category') }}</th>
                        <th>{{ __('messages.transaction_date') }}</th>
                        <th>{{ __('messages.transaction_amount') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transaction->type->name }}</td>
                            <td>{{ $transaction->category->name }}</td>
                            <td>{{ $transaction->transaction_date }}</td>
                            <td>{{ $transaction->amount }}</td>
                            <td>
                                @if($transaction->type_id == \App\Models\TransactionType::EXPENSE)
                                    <x-ri-arrow-down-s-fill />
                                @else
                                    <x-ri-arrow-up-s-fill />
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <span>Budget</span>
        <span>Ava</span>
    </div>
@endsection
