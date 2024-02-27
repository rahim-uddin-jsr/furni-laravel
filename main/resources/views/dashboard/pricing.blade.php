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
                    <textarea name="section_description" class="form-control border-secondary" placeholder="Description" id="floatingTextarea" style="height: 100px;">{{ $item->description}}</textarea>
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
                        <input name="{{ 'feature'.$key }}" type="text" class="form-control border-secondary" value="{{ $item->feature_name }}" id="inputAddres5s"
                            >
                    </div>
                    <div class="col-4 d-flex">
                        <div class="row col-12 align-items-center">
                            <input name="{{ ($item->isBasic == 'on' || $item->isBasic == 'off') ? 'basic'.$key : ''  }}" @if ($item->isBasic == 'on') checked @endif
                                class="form-check-input border-2 border-primary mx-auto col-4" type="checkbox" id="{{ 'gridCheck'.$key }}">
                            <input name="{{ ($item->business == 'on' || $item->business == 'off') ? 'business'.$key   : ''  }}" @if ($item->business == 'on') checked @endif
                                class="form-check-input border-2 border-primary mx-auto col-4" type="checkbox" id="{{ 'gridCheck'.$key }}">
                            <input name="{{ ($item->developer == 'on' || $item->developer == 'off') ? 'developer'.$key : ''  }}" @if ($item->developer == 'on') checked @endif
                                class="form-check-input border-2 border-primary mx-auto col-4" type="checkbox" id="{{ 'gridCheck'.$key }}">
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
                    <input name="free_plan_price" type="text" value="{{ $free_plan_price }}" class="form-control border-secondary" id="floatingEmail">
                </div>
                <div class="col-md-4">
                    <input name="business_plan_price" type="text" value="{{$business_plan_price  }}" class="form-control border-secondary" id="floatingPassword">
                </div>
                <div class="col-md-4">
                    <input name="developer_plan_price" type="text" value="{{ $developer_plan_price}}" class="form-control border-secondary" id="floatingPassword">
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg mx-auto w-25 my-4">Update</button>
        </div>
    </form>
@endsection
