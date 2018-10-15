@extends('layouts.app')

@section('content')

    @include('modules.users.profile.edit_name_form')
    @include('modules.users.profile.edit_email_form')

    <img src="{{Auth::user()->avatar}}" alt="" width="50">
    @include('modules.users.profile.edit_avatar_form')

    balance {{ Auth::user()->points }} <a href="">rise balance</a>

    @endsection
