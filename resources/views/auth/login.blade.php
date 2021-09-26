@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label col-form-label-sm">{{__('Email')}}</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="{{__('Email')}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">{{__('Password')}}</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="{{__('Password')}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="remember_me" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Log in') }}
                    </button>
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endsection