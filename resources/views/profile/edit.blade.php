@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <div class="space-y-8 pt-20">
            <h1 class="mb-6 text-2xl font-bold">My Profile</h1>


        @include('profile.partials.update-profile-information-form')
        @include('profile.partials.update-password-form')
        @include('profile.partials.delete-user-form')
        </div>
    </div>
@endsection
