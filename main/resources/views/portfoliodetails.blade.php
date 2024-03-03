@extends('layouts.welcome', ['welcome' => false])

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">Home</a></li>
                <li>Portfolio Details</li>
            </ol>
            <h2>Portfolio Details</h2>

        </div>
    </section><!-- End Breadcrumbs -->
    {{-- {{ $portfolio }} --}}
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            @foreach ($portfolio->images as $item)
                                <div class="swiper-slide">
                                    <img src="{{ url('assets/img/home/portfolio/' . $item->image_url) }}" alt="">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Project information</h3>
                        <ul>
                            <li><strong>Category</strong>: {{ $portfolio->category }}</li>
                            <li><strong>Client</strong>: {{ $portfolio->client }}</li>
                            {{-- <li><strong>Project date</strong>: {{ $portfolio->project_date->format('Y.m.d') }}</li> --}}
                            <li><strong>Project date</strong>: {{ Carbon\Carbon::parse($item->project_date)->format('d M, Y') }}</li>
                            <li><strong>Project URL</strong>: <a href="#">{{ $portfolio->project_url }}</a></li>
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2>{{ $portfolio->project_title }}</h2>
                        <p>{{ $portfolio->project_description }}
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
