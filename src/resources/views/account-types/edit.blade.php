@extends('layouts.app')

<?php /** @var \App\Models\AccountType $accountType */ ?>

@section('content')
    <section class="row">
        <div class="col accounts account-types">
            {{--            <h1 class="text-center text-center text-uppercase display-4 mt-md-1 mb-md-3">Accounts Types</h1>--}}
            @include("parts.h1", ["title"=>"Accounts Types"])

            @include('parts.validation.alert')

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card border border-info">
                        <div class="card-header bg-info">
                            Edit <span class="text-muted">of account type element</span> # {{$accountType->id}}
                        </div>
                        <form method="post" action="{{route('account-types.update', $accountType)}}" enctype="multipart/form-data">
                            @method('PUT')
                            @include('account-types.parts.form')
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
