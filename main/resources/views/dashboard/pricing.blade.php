@extends('layouts.dashboard')
@section('title', 'Pricing')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

    <li class="breadcrumb-item active">Pricing</li>
@endsection
@section('dashboardMain')
    <h2 class="text-center mb-5">Update Pricing Section</h2>
    <form action="{{ route('dashboardUpdatePricing') }}" method="POST">
        @method('PUT')
        @csrf
        <div class="col-12">
            <div class="form-floating">
                @foreach ($sectionDescriptions as $item)
                    @if ($item->title == 'pricing')
                        <textarea name="section_description" class="form-control border-secondary" placeholder="Description"
                            id="floatingTextarea" style="height: 100px;">{{ $item->description }}</textarea>
                        <input type="hidden" name="section_id" value="{{ $item->id }}">
                        <label for="floatingTextarea">Description</label>
                    @endif
                @endforeach
            </div>
            <div class="row my-3">
                <div class="col-8"><strong>Features List</strong></div>
                <div class="col-4 row">
                    <div class="col-4 px-0"><strong>Free Plan</strong></div>
                    <div class="col-4 px-0"><strong>Business Plan</strong></div>
                    <div class="col-4 px-0"><strong>Developer Plan</strong></div>
                </div>
            </div>
            @foreach ($features as $key => $item)
                <div class="d-flex">
                    <div class="col-8">
                        <div class="d-flex gap-2 my-1">
                            <input name="{{ 'feature' . $key }}" type="text" class="form-control border-secondary"
                                value="{{ $item->feature_name }}" id="inputAddres5s">
                            <a class="btn btn-danger btn-sm" href="{{ route('deleteFeature', [$item->id]) }}">Delete</a>
                        </div>
                    </div>
                    <div class="col-4 d-flex">
                        <div class="row col-12 align-items-center">
                            <input name="{{ $item->isBasic == 'on' || $item->isBasic == 'off' ? 'basic' . $key : '' }}"
                                @if ($item->isBasic == 'on') checked @endif
                                class="form-check-input border-2 border-primary mx-auto col-4" type="checkbox"
                                id="{{ 'gridCheck' . $key }}">
                            <input
                                name="{{ $item->business == 'on' || $item->business == 'off' ? 'business' . $key : '' }}"
                                @if ($item->business == 'on') checked @endif
                                class="form-check-input border-2 border-primary mx-auto col-4" type="checkbox"
                                id="{{ 'gridCheck' . $key }}">
                            <input
                                name="{{ $item->developer == 'on' || $item->developer == 'off' ? 'developer' . $key : '' }}"
                                @if ($item->developer == 'on') checked @endif
                                class="form-check-input border-2 border-primary mx-auto col-4" type="checkbox"
                                id="{{ 'gridCheck' . $key }}">
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="row mt-4 mb-2">
                <div class="col-4 px-0 text-center"><strong>Free Plan</strong></div>
                <div class="col-4 px-0 text-center"><strong>Business Plan</strong></div>
                <div class="col-4 px-0 text-center"><strong>Developer Plan</strong></div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <input name="free_plan_price" type="text" value="{{ $free_plan_price }}"
                        class="form-control border-secondary" id="floatingEmail">
                </div>
                <div class="col-md-4">
                    <input name="business_plan_price" type="text" value="{{ $business_plan_price }}"
                        class="form-control border-secondary" id="floatingPassword">
                </div>
                <div class="col-md-4">
                    <input name="developer_plan_price" type="text" value="{{ $developer_plan_price }}"
                        class="form-control border-secondary" id="floatingPassword">
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg mx-auto w-25 my-4">Update</button>
        </div>
    </form>


    <form action="{{ route('addFeature') }}" method="post">
        @csrf
        <div class="div">
            <h2 class="text-center my-3">Add features</h2>

            <div class="row my-1">
                <div class="col-6"><strong>Feature Name</strong></div>
                <div class="col-4 text-center row">
                    <div class="col-4 px-0"><strong>Free Plan</strong></div>
                    <div class="col-4 px-0"><strong>Business Plan</strong></div>
                    <div class="col-4 px-0"><strong>Developer Plan</strong></div>
                </div>
                <div class="col-2 px-0 text-center"><strong>Action</strong></div>
            </div>
            <div class="d-flex">
                <div class="col-6">
                    <div class="d-flex gap-2">
                        <input name="feature_name" placeholder="feature name here" type="text" class="form-control border-secondary" id="inputAddres5s">
                    </div>
                </div>
                <div class="col-4 d-flex">
                    <div class="row col-12 align-items-center justify-content-evenly">
                        <input name="isBasic" class="form-check-input border-2 border-primary col-4" type="checkbox"
                            id="">
                        <input name="isBusiness" class="form-check-input border-2 border-primary col-4" type="checkbox"
                            id="">
                        <input name="isDeveloper" class="form-check-input border-2 border-primary col-4" type="checkbox"
                            id="">
                    </div>
                </div>

                <button class="btn btn-primary btn-sm w-100 text-center" type="submit">Add</button>
            </div>
        </div>
    </form>
    </div>

@endsection
