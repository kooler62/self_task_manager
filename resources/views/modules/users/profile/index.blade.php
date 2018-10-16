@extends('layouts.app')

@section('content')

    @include('modules.users.profile.edit_name_form')
    @include('modules.users.profile.edit_email_form')

    <img src="{{Auth::user()->avatar}}" alt="" width="50">
    @include('modules.users.profile.edit_avatar_form')

    balance {{ Auth::user()->points }} @include('users::profile.rise_button')
    <br>
    Для проведения тестовой оплаты используйте карту номер 4444555511116666, срок действия (месяц, год) и cvv2 code - любые значения.
    @endsection
