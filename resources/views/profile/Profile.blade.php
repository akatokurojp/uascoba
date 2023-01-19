@extends('layouts.app')
@section('title', 'EasyTrip | Profile')

@section('content')
    <div class="container" style="min-height: 85vh">
        <div class="display-6 playfair fw-bold text-center mb-3">
            My Profile
        </div>
        @auth
        <div class="container">
            <div class="text4">
                <br>@if (Auth::check() && Auth::user()->role==('member'))
                <div class="btn btn-primary p-3 mb-2 bg-secondary text-white">member</div>
                @endif
                <br>@if (Auth::check() && Auth::user()->role==('admin'))
                <div class="btn btn-primary p-3 mb-2 bg-secondary text-white">admin</div>
                @endif <br>
                Username: {{Auth::user()->name}} <br>
                
                {{Auth::user()->email}} <br>
                
                <br><a class="btn btn-primary" href="/editprofile">Edit Profile</a> @if (Auth::check() && Auth::user()->role==('member'))<a class="btn btn-outline-primary text-primary" href="/changepassword">Edit Password</a>@endif
                </div>
                @endif
        </div>

    </div>
@endsection


