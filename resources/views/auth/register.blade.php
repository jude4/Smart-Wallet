@extends('layouts.app')

@section('content')
    @csrf
    <Register route="{{ route('register') }}" token="{{ csrf_token() }}" />
@endsection
