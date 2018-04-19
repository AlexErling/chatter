@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth
                        @if (Auth::user()->isVerified())

                            <chat-rooms></chat-rooms>

                        @else
                            Your E-Mail address "{{ Auth::user()->email }}"
                            has not been verified yet. <br>
                            Please check your email
                            or <a href="{{ route('sendVerifyEmail') }}">request the verification email</a> again.
                        @endif
                    @else
                        ChatterBox 2.0 - Please <a href="{{ route('login') }}">{{ __('log in') }}</a> 
                        or <a href="{{ route('register') }}">{{ __('register') }}</a> to participate
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
