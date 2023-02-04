@extends('layouts.app')

@section('content')
    <section class="row accounts">
        <div class="col accounts account-types">
            {{--            <h1 class="text-center text-center text-uppercase display-4 mt-md-1 mb-md-3">Accounts Types</h1>--}}
            @include("parts.h1", ["title"=>"Dashboard", "icon"=>"bi bi-tablet-landscape"])

            <div class="row justify-content-center">
                <div class="col-md-8 mt-1 mb-5">
                    <div class="card">
                        <img src="/images/dashboard/poster-sm-01.jpg" class="card-img-top">
                        <div class="card-body">
                            <h1 class="card-title">Hello, {{Auth::user()->name}}</h1>
                            <p class="card-text">Welcome to CacheOptimizer!</p>
                            <p class="card-text">Your personal finance management tool. Start tracking your expenses, setting budgets, and finding the best deals to optimize your cash flow.</p>
                            <p class="card-text">Let's get started!</p>
                            <a class="btn btn-primary btn-lg mt-3 mb-3 ms-auto me-auto" type="button" href="{{route('accounts.index')}}">View Accounts</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer-inside')
    <div class="row">
        <div class="col  text-center">
            <a class="link-dark" href="https://www.freepik.com/free-photo/businesspeople-working-finance-accounting-analyze-financi_16068554.htm#query=money&position=17&from_view=search&track=sph">Image by our-team</a> on Freepik
        </div>
    </div>
@endsection
