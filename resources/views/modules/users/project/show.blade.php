@extends('layouts.app')

@section('content')
    @if ($errors->has('error'))
        {{ $errors->first('error') }}
    @endif

<h1>{{$project->title}}</h1>


@endsection

