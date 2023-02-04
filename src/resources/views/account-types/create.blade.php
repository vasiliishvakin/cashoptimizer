@extends('account-types.layout')

@section('content')
    @include('parts.validation.alert')

    <div class="col-md-6">
        <div class="card border border-info">
            <div class="card-header bg-info">
                Create <span class="text-muted"> account type element</span>
            </div>
            <form method="post" action="{{route('account-types.store')}}" enctype="multipart/form-data">
                @include('account-types.parts.form')
            </form>

        </div>
    </div>
@endsection
