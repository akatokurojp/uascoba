@extends('layouts.app')

@section('page_title', 'Edit Password')

@section('background')
    style="background-image: url({{asset('images/background-img.png')}})""
@endsection

@section('content')
<div class="d-flex justify-content-center align-items-center">

    <div class="container d-flex align-items-center" style="min-height: 85vh;">
        <div class="row justify-content-center w-100">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Password') }}</div>
        @if($errors->any())
            {!! implode('', $errors->all('<div style="color:red">:message</div>')) !!}
            @endif
            @if(Session::get('error') && Session::get('error') != null)
            <div style="color:red">{{ Session::get('error') }}</div>
            @php
            Session::put('error', null)
            @endphp
            @endif
            @if(Session::get('success') && Session::get('success') != null)
            <div style="color:green">{{ Session::get('success') }}</div>
            @php
            Session::put('success', null)
            @endphp
            @endif
        <div class="card-body">
            <form method="POST" action="/passwordupdate">
                @csrf
                <div class="row mb-3">
                    <label for="old_password" class="col-md-4 col-form-label">Old Password</label>
                    <div class="col-md-6">
                        <input id="current_password" type="password" class="form-control"  name="current_password" placeholder="(5-20 letters)">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="new_password" class="col-md-4 col-form-label">New Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="(5-20 letters)">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="new_password_confirmation" class="col-md-4 form-label">Confirm New Password</label>
                    <div class="col-md-6">
                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" placeholder="(5-20 letters)">
                </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Save Update') }}
                        </button>
                        <a href="/profile" class="btn btn-outline-danger">Back</a>
                    </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
