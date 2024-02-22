@extends('layouts.dashboard')
@section('title', 'Portfolio')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

<li class="breadcrumb-item active">Portfolio</li>
@endsection
@section('dashboardMain')
    <h2 class="text-center">Update Portfolio Section </h2>
@endsection
