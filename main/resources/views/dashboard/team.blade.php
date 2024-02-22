@extends('layouts.dashboard')
@section('title', 'Team')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

<li class="breadcrumb-item active">Team</li>
@endsection
@section('dashboardMain')
    <h2 class="text-center">Update Team Section </h2>
@endsection

