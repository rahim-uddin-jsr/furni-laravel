@extends('layouts.dashboard')
@section('title', 'About')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

<li class="breadcrumb-item active">About</li>
@endsection
@section('dashboardMain')
    <h2 class="text-center">Update About Section </h2>
@endsection

