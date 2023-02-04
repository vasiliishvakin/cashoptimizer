@extends('layouts.app')

@section('content')
    <section class="row accounts">
        <div class="col accounts account-types">
            @include("parts.h1", ["title"=>"Account Types"])

            <div class="row justify-content-center">
                @yield("module-content")
            </div>
        </div>
    </section>
@endsection
