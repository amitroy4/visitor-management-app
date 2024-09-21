@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body max-w-xl">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    <div class="card my-4">
        <div class="card-body">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    <!--<div class="card my-4">-->
    <!--    <div class="card-body">-->
    <!--        @include('profile.partials.delete-user-form')-->
    <!--    </div>-->
    <!--</div>-->
</div>
@endsection
