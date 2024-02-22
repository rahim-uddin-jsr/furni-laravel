@extends('layouts.dashboard')
@section('title', 'Features')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

<li class="breadcrumb-item active">Feature</li>
@endsection
@section('dashboardMain')
    <h2 class="text-center">Why Us Section</h2>
@endsection

