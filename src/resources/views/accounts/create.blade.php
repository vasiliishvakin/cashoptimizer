@extends('accounts.layout')

@section('module-content')

    @include('parts.validation.alert')

    <div class="col-md-6">
        <div class="card border border-info">
            <div class="card-header bg-info">
                Create <span class="text-muted"> new account </span>
            </div>
            <form method="post" action="{{route('accounts.store')}}" enctype="multipart/form-data">
                @include('accounts.parts.form')
            </form>

        </div>
    </div>
@endsection
