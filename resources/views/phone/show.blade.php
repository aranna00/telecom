@extends('layouts.master')

@section('content')

    <div id="single-product">
        <div class="container">
            <div class="no-margin col-xs-12 col-sm-6 col-md-5 gallery-holder">
                <div class="product-item-holder size-big single-product-gallery small-gallery">
                    <div id="owl-single-product">
                        @foreach($pictures as $key => $picture)
                            <div class="single-product-gallery-item" id="slide{{ $key }}">
                                <a data-rel="prettyphoto" href="{{ asset($picture) }}">
                                    <img class="img-responsive" alt="" src="{{ asset('images/blank.gif') }}" data-echo="{{ asset($picture) }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="single-product-gallery-thumbs gallery-thumbs">
                        <div id="owl-single-product-thumbnails">
                            @foreach($pictures as $key=>$picture)
                                <a class="horizontal-thumb @if($key === 1) active @endif" data-target="#owl-single-product" data-slide="{{ $key }}" href="#slide{{ $key }}">
                                    <img width="67" alt="" src="{{ asset('images/blank.gif') }}" data-echo="{{ asset($picture) }}">
                                </a>
                            @endforeach
                        </div>
                        <div class="nav-holder left hidden-xs">
                            <a class="prev-btn slider-prev" data-target="#owl-single-product-thumbnails" href="#prev"></a>
                        </div>
                        <div class="nav-holder right hidden-xs">
                            <a class="next-btn slider-next" data-target="#owl-single-product-thumbnails" href="#next"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="no-margin col-xs-12 col-sm-7 body-holder">
                <div class="body">
                    <div class="star-holder inline"><div class="start" data-score="4"></div></div>
                    <div class="availability"><label>Availability:</label><span class="available"> In stock</span></div>

                    <div class="title"><a href="#">{{ $phone->brand." ".$phone->model }}</a></div>
                    <div class="brand">{{ $phone->brand }}</div>

                    <div class="excerpt">
                        <p>{!! $phone->excerpt !!}</p>
                    </div>

                    <div class="prices">
                        <div class="price-current">${{ $phone->costs }}</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <section id="single-product-tab">
        <div class="container">
            <div class="tab-holder">
                <ul class="nav nav-tabs simple">
                    <li class="active"><a href="#description" data-toggle="tab">Description</a> </li>
                    <li><a href="#specifications" data-toggle="tab">Specifications</a> </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="description">
                        {!! $phone->description !!}
                    </div>
                    <div class="tab-pane" id="specifications">
                        <ul class="tabled-data">
                            @foreach($phone->spec as $spec)
                                <li>
                                    <label>{{ $spec->spec }}</label>
                                    <div class="value">{{ $spec->value }}</div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
