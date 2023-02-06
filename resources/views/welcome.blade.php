@extends('layouts.app')
@section('content')
Welcome

@php
    $user = Auth::user();
@endphp
@if($user)
    @include('admin_home')
@else 
    ciaoaoaooaoaao
@endif
@endsection

    
