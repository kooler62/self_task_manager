@extends('layouts.app')

@section('content')

    <script src="https://api.fondy.eu/static_common/v1/checkout/ipsp.js"></script>
    <script>
        var button = $ipsp.get('button');
        button.setMerchantId(1396424);
       // button.AmyOwnParamete (555);
        button.setAmount('', 'USD');
        button.setHost('api.fondy.eu');
        button.setResponseUrl('http://demo.local/payment/callback');
        button.addField({
            label: 'user_id',
            value: '{{Auth::user()->id}}',
            readonly: true
        });
    </script>

    @include('modules.users.profile.edit_name_form')
    @include('modules.users.profile.edit_email_form')

    <img src="{{Auth::user()->avatar}}" alt="" width="50">
    @include('modules.users.profile.edit_avatar_form')

    balance {{ Auth::user()->points }} <button onclick="location.href=button.getUrl()">Пополнить баланс</button>
    <br>    Для проведения тестовой оплаты используйте карту номер 4444555511116666, срок действия (месяц, год) и cvv2 code - любые значения.
    @endsection
