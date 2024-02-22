@extends('layouts.dashboard')
@section('title', 'Home')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Home</li>
@endsection
@section('dashboardMain')
    <h2 class="text-center">Home</h2>
@endsection

