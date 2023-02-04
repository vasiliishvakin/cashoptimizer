@extends('accounts.layout')

<?php /** @var \App\Models\Account $account */ ?>

@section('module-content')
    <div class="col-md-2 offset-md-1">
        @include("parts.items.actions.lg", [
                            'routes'=>(new \App\Utils\BladeRoutesConfig())
                                ->return('accounts.index', 'Return')
                        ])
    </div>
    <div class="col-md-6">
        <div class="card border border-info">
            <div class="card-header bg-info">
                properties <span class="text-muted">of account element</span>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody class="table-hover">
                    <tr>
                        <th scope="row" class="col-3 text-left">Name</th>
                        <td class="col-9 text-left pl-3">{{$account->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="col-3 text-left">Type</th>
                        <td class="col-9 text-left pl-3">{{$account->accountType->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="col-3 text-left">User</th>
                        <td class="col-9 text-left pl-3">{{$account->user->name}} ({{ $account->user->email }})</td>
                    </tr>
                    <tr>
                        <th scope="row" class="col-3 text-left">Currency</th>
                        <td class="col-9 text-left pl-3">{{$account->currency_id}}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="col-3 text-left">Balance</th>
                        <td class="col-9 text-left pl-3">{{ \App\Facades\MoneyFormatterServiceFacade::format($account->balance) }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="col-3 text-left">Created</th>
                        <td class="col-9 text-left pl-3">{{$account->created_at->format("d.m.Y")}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex justify-content-between">
                @include("parts.items.actions.lg", [
                            'routes'=>(new \App\Utils\BladeRoutesConfig($account->id))
                                ->edit('accounts.edit', 'Edit')
                                ->destroy('accounts.destroy', 'Delete'),
                        ])
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
@endsection
