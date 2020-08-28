@extends('layouts.app')

@section('content')

@if ($errors->has('email') || $errors->has('password'))
<Login route="{{ route('login') }}" token="{{ csrf_token() }}"  email-error-message="{{ $errors->first('email') }}" password-error-message="{{ $errors->first('password') }}" />

@else

<Login route="{{ route('login') }}" token="{{ csrf_token() }}" error-message="{{ $errors->first('email') }}" />

@endif
@endsection
