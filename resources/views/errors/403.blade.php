@extends('layouts.layout')

@section('title')
Error 403
@endsection

@section('content')
<div class="container my-5 text-center">
    <img src="{{ asset('img/403-error.gif') }}" alt="error 403">
</div>
@endsection
