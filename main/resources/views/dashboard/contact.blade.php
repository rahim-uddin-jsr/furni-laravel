@extends('layouts.dashboard')
@section('title', 'Contact')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

<li class="breadcrumb-item active">Contact</li>
@endsection
@section('dashboardMain')
    <h2 class="text-center">Update Contact Section </h2>
@endsection

