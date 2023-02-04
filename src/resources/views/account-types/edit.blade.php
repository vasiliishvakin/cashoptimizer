@extends('account-types.layout')

<?php /** @var \App\Models\AccountType $accountType */ ?>

@section('content')
    @include('parts.validation.alert')

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
@endsection
