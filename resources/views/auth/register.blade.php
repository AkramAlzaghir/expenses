@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label col-form-label-sm">{{__('Name')}}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="{{__('Name')}}" value="{{old('name')}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label col-form-label-sm">{{__('Email')}}</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="{{__('Email')}}" value="{{old('email')}}">
                </div>
            </div>
            <div class=" form-group row">
                <label for="password" class="col-sm-2 col-form-label">{{__('Password')}}</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="{{__('Password')}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="password_confirmation" class="col-sm-2 col-form-label">{{__('Confirm Password')}}</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="{{__('Confirm Password')}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    @if (Route::has('login'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    @endif
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection