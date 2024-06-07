@extends('base')

@section('content')

    <div class="flex gap-6">
        <div class="rounded border-solid border-2 border-sky-500 p-3 w-1/3 mt-3 mb-3">
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
                        chartId="budget"
                        :labels="['Available funds', 'Expenses']"
                        :data="[(float) $budget->amount, $transactions->where('type_id', \App\Models\TransactionType::EXPENSE)->sum('amount')]"
                    />
                </div>
            </div>
        </div>
        <div class="rounded border-solid border-2 border-sky-500 p-3 w-2/3 mt-3 mb-3">
            <x-chart
                name="Budget History"
                type="line"
                chartId="budget_history"
                :labels="[$transactions->pluck('transaction_date')->toArray()]"
                :data="$transactions->pluck('amount')->toArray()"
            />
        </div>
    </div>
    <div class="rounded border-solid border-2 border-sky-500 p-3 mt-3 mb-3">
        <p class="text-2xl text-center">{{ __('messages.transactions') }}</p>
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
                            <td>
                                <a class="btn btn-square btn-outline" href="{{ route('transaction.viewEdit', ['transactionID' => $transaction->id]) }}"><x-eva-edit-outline /></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex gap-6">
        <div class="rounded border-solid border-2 border-sky-500 p-3 w-2/3 mt-3 mb-3">
            <p class="text-2xl text-center">{{ __('messages.transactions_limits') }}</p>
            <a class="btn btn-square btn-outline" href="{{ route('transaction.limit.viewAdd') }}"><x-css-add /></a>
            <table class="table">
                <thead>
                    <th></th>
                    <th>{{ __('messages.transaction_category') }}</th>
                    <th>{{ __('messages.transactions_limit') }}</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($transactions_limits as $transactions_limit)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td></td>
                            <td>{{ $transactions_limit->limit }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="rounded border-solid border-2 border-sky-500 p-3 w-1/3 mt-3 mb-3">
            <p class="text-2xl text-center">{{ __('messages.saving_goals') }}</p>
        </div>
    </div>

@endsection
