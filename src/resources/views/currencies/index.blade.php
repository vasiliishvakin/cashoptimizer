@extends('layouts.app')
<?php /** @var \App\Models\Currency[] $currencies */ ?>

@section('content')
    <section class="row accounts">
        <div class="col accounts account-types">
            @include("parts.h1", ["title"=>"Currencies", "icon"=>"bi bi-table"])

            <div class="row justify-content-center">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="col-md-3 text-left">ID</th>
                                <th scope="col" class="col text-center">Description</th>
                                <th scope="col" class="col-md-2 text-align-right">Accounts Count</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($currencies as $currency)
                                <tr>
                                    <th scope="row" class="col-md-3 text-left">{{$currency->id}}</th>
                                    <td class="col text-center">{{$currency->description}}</td>
                                    <td class="col-md-2 text-align-right">{{$currency->accounts->count()}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col text-align-right">
                                {{ $currencies->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
