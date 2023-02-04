@extends(Auth::user() ? 'errors::minimal' : 'layouts.app');

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))

@section('content')
    @guest()
        <div class="container">
            <div class="row justify-content-center">
                <div class="row justify-content-center">
                    <div class="col alert alert-danger" role="alert">
                        <div class="h2 text-center">
                            @yield('code')
                        </div>
                        <div class="h3 text-center">
                            @yield('message')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('auth.form.login')
    @endguest
@endsection
