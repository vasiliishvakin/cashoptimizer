@extends('accounts.layout')
<?php /** @var \App\Models\Account[] $accounts */ ?>

@section('module-content')
    <div class="col-md-10">
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col" class="col-md-3 text-left">Name</th>
                <th scope="col" class="col-md-2 text-center">Type</th>
                <th scope="col" class="col-md-1 text-center">Currency</th>
                <th scope="col" class="col-md-2 text-center">User</th>
                <th scope="col" class="col-md-2 text-align-right">Balance</th>
                <th scope="col" class="col-md-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($accounts as $account)
                <tr>
                    <th scope="row" class="col-md-3 text-left">{{$account->name}}</th>
                    <td class="col-md-2 text-center">{{$account->accountType->name}}</td>
                    <td class="col-md-1 text-center">{{$account->currency->id}}</td>
                    <td class="col-md-2 text-center">{{$account->user->name}}</td>
                    <td @class(
                                    [
                                        'col',
                                        'text-align-right',
                                        'accounts-balance-cell',
                                        'table-success' => $account->balance->isPositive(),
                                        'table-danger' => $account->balance->isNegative(),
                                        'table-secondary' => $account->balance->isZero(),
                                    ])>
                        {{\App\Facades\MoneyFormatterServiceFacade::format($account->balance)}}
                    </td>
                    <td class="table-light col-md-2 col-md-3 text-center">
                        @include("parts.items.actions.sm", [
                            'routes'=>(new \App\Utils\BladeRoutesConfig($account))
                                ->view('accounts.show')
                                ->edit('accounts.edit')
                                ->destroy('accounts.destroy'),
                        ])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col text-align-right">
                {{ $accounts->links() }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-align-right">
                @include("parts.items.actions.lg", [
                    'routes'=>(new \App\Utils\BladeRoutesConfig())
                        ->create('accounts.create', 'Add Account')
                ])
            </div>
        </div>
    </div>
@endsection
