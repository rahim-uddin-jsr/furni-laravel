@extends('layouts.dashboard')
@section('title', 'Services')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

<li class="breadcrumb-item active">Services</li>
@endsection
@section('dashboardMain')
    <h2 class="text-center">Update SERVICES</h2>
@endsection

