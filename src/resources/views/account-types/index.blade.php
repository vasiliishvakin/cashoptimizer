@extends('layouts.app')

@section('content')
    <section class="row">
        <div class="col accounts account-types">
            {{--            <h1 class="text-center text-center text-uppercase display-4 mt-md-1 mb-md-3">Accounts Types</h1>--}}
            @include("parts.h1", ["title"=>"Accounts Types"])

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col" class="col-1 text-left">ID</th>
                            <th scope="col" class="col text-center">Title</th>
                            <th scope="col" class="col-sm-3 col-md-3 text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($accountTypes as $accountType)
                            <tr>
                                <th scope="row" class="col-1">{{$accountType->id}}</th>
                                <td>{{$accountType->title}}</td>
                                <td class="table-light col-sm-3 col-md-3 text-center">
                                    @include("parts.items.actions.sm", [
                                        'routes'=>(new \App\Helpers\BladeRoutesConfig($accountType))
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
                        <div class="col-md-12 text-align-right">
                            @include("parts.items.actions.lg", [
                                'routes'=>(new \App\Helpers\BladeRoutesConfig())
                                    ->create('account-types.create', 'Add Account Type')
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
