@extends('account-types.layout')

@section('content')
    <div class="col-md-6">
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col" class="col-1 text-left">ID</th>
                <th scope="col" class="col text-center">Name</th>
                <th scope="col" class="col-sm-3 col-md-3 text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($accountTypes as $accountType)
                <tr>
                    <th scope="row" class="col-1">{{$accountType->id}}</th>
                    <td>{{$accountType->name}}</td>
                    <td class="table-light col-sm-3 col-md-3 text-center">
                        @include("parts.items.actions.sm", [
                            'routes'=>(new \App\Utils\BladeRoutesConfig($accountType))
                                ->view('account-types.show')
                                ->edit('account-types.edit')
                                ->destroy('account-types.destroy'),
                        ])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col text-align-right">
                {{ $accountTypes->links() }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-align-right">
                @include("parts.items.actions.lg", [
                    'routes'=>(new \App\Utils\BladeRoutesConfig())
                        ->create('account-types.create', 'Add Account Type')
                ])
            </div>
        </div>
    </div>
@endsection
