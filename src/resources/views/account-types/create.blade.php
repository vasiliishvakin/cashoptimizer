@extends('layouts.app')

@section('content')
    <section class="row">
        <div class="col accounts account-types">
            @include("parts.h1", ["title"=>"Accounts Types"])

            @include('parts.validation.alert')

            <div class="row justify-content-center">
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
            </div>
        </div>
    </section>
@endsection
