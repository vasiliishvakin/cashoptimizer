@extends('layouts.app')

@section('content')
    <article class="markdown-body entry-content container-lg" itemprop="text">
        @include("parts.h1", ["title"=>"Cash Optimizer"])

        <p dir="auto">CashOptimizer is a web application that helps users manage their expenses and optimize their cash flow. The application allows users to track their expenses, set budgets, and find the best deals and lowest prices on
            products.</p>
        <h2 dir="auto"><a id="user-content-features" class="anchor" aria-hidden="true" href="#features">

            </a>Features
        </h2>
        <ul dir="auto">
            <li>Expense tracking</li>
            <li>Budget setting</li>
            <li>Price comparison</li>
            <li>Shopping list</li>
            <li>Shopping history</li>
            <li>Reports and analytics</li>
        </ul>

        <h2 dir="auto"><a id="user-content-contributions" class="anchor" aria-hidden="true" href="#contributions">

            </a>Contributions
        </h2>
        <p dir="auto">We welcome contributions to CashOptimizer. <a href="https://github.com/vasiliishvakin/cashoptimizer">Github Repository</a>.</p>
        <h2 dir="auto"><a id="user-content-license" class="anchor" aria-hidden="true" href="#license">

            </a>License
        </h2>
        <p dir="auto">CashOptimizer is licensed under the <a href="https://github.com/vasiliishvakin/cashoptimizer/blob/main/LICENSE">Apache License 2.0</a>.</p>
    </article>
@endsection
