@extends('account-types.layout')
<?php /** @var \App\Models\AccountType $accountType */ ?>

@section('content')

    <div class="col-md-2 offset-md-1">
        @include("parts.items.actions.lg", [
                            'routes'=>(new \App\Utils\BladeRoutesConfig())
                                ->return('account-types.index', 'Return')
                        ])
    </div>
    <div class="col-md-6">
        <div class="card border border-info">
            <div class="card-header bg-info">
                properties <span class="text-muted">of account type element</span>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody class="table-hover">
                    <tr>
                        <th scope="row" class="col-3 text-left">ID</th>
                        <td class="col-9 text-left pl-3">{{$accountType->id}}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="col-3 text-left">Name</th>
                        <td class="col-9 text-left pl-3">{{$accountType->title}}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="col-3 text-left">Created</th>
                        <td class="col-9 text-left pl-3">{{$accountType->created_at->format("d.m.Y")}}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="col-3 text-left">Updated</th>
                        <td class="col-9 text-left pl-3">{{$accountType->updated_at->format("d.m.Y")}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex justify-content-between">
                @include("parts.items.actions.lg", [
                            'routes'=>(new \App\Utils\BladeRoutesConfig($accountType->id))
                                ->edit('account-types.edit', 'Edit')
                                ->destroy('account-types.destroy', 'Delete'),
                        ])
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
@endsection
