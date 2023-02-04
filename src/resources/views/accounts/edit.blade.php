@extends('accounts.layout')

<?php /** @var \App\Models\Account $account */ ?>

@section('module-content')

    @include('parts.validation.alert')

    <div class="col-md-6">
        <div class="card border border-info">
            <div class="card-header bg-info">
                Edit <span class="text-muted"> account </span>
            </div>
            <form method="post" action="{{route('accounts.update', $account)}}" enctype="multipart/form-data">
                @method('PUT')
                @include('accounts.parts.form')
            </form>
        </div>
    </div>
@endsection
