@extends('layouts.app')

@section('content')
    <Dashboard user="{{ auth()->user()->id }}" />
@endsection
