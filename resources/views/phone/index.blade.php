@extends('layouts.master')

@section('content')
    <div class="col-xs-12 col-sm-3 no-margin sidebar narrow">
        <div class="widget">
            <h1>Filters</h1>
            <div class="body bordered">
                <h2>brands</h2>
                <hr>
                <ul>
                    @foreach($brands as $brand => $model)
                        <li><input class="le-checkbox" type="checkbox"><label>{{ $brand }}</label> <span class="pull-right">({{ count($brands[$brand]) }})</span></li>
                    @endforeach
                </ul>
            </div>

            <div class="price-filter">
                <h2>Price</h2>
                <hr>
                <div class="price-range-holder">
                    <input type="text" class="price-slider" value="">

                    <span class="min-max">
                        price: ${{ $priceLowest }} - ${{ $priceHighest }}
                    </span>
                    <span class="filter-button">
                        <a href="#">Filter</a>
                    </span>
                </div>
            </div>
        </div>
        <div class="widget">
            <h1 class="border">information</h1>
            <div class="body">
                <ul class="le-links">
                    <li><a href="#">delivery</a></li>
                    <li><a href="#">secure payment</a></li>
                    <li><a href="#">our stores</a></li>
                    <li><a href="#">contact</a></li>
                </ul>
            </div>
        </div>
    </div>



    <section id="Phones">
        <div class="grid-list-products">
            <h2 class="section-title">Phones</h2>
            <div class="control-bar">
                <div id="popularity-sort" class="le-select">
                    <select data-placeholder="sort by popularity">
                        <option value="1">1-100</option>
                        <option value="1">101-200</option>
                        <option value="1">200+</option>
                    </select>
                </div>
                <div class="le-select" id="item-count">
                    <select>
                        <option value="1">24 per page</option>
                        <option value="2">32 per page</option>
                        <option value="3">48 per page</option>
                    </select>
                </div>
                <div class="grid-list-buttons">
                    <ul>
                        <li class="grid-list-button-item"><a data-toggle="tab" href="#grid-view">{!! FA::icon('th-large') !!} Grid</a></li>
                        <li class="grid-list-button-item"><a data-toggle="tab" href="#list-view">{!! FA::icon('th-list') !!} List</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="tab-content">
            <div id="grid-view" class="products-grid fade tab-pane in active">

                <div class="product-grid-holder">
                    <div class="row no-margin">

                        @foreach($phones as $phone)

                            <div class="col-xs-12 col-sm-3 col-md-3 no-margin product-item-holder hover">
                                <div class="product-item">
                                    <div class="image">
                                        <img alt="" src="{{ asset('images/blank.gif') }}" data-echo="{{ $phone->main_pic }}" />
                                    </div>
                                    <div class="body">
                                        <div class="title">
                                            <a href="{{ action('PhoneController@show',$phone->id) }}">{{ $phone->brand." ".$phone->model }}</a>
                                        </div>
                                        <div class="brand">{{ $phone->brand }}</div>
                                    </div>
                                    <div class="prices">
                                        <div class="price-current pull-right">${{ $phone->costs }}</div>
                                    </div>
                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a href="{{ action('PhoneController@show',$phone->id) }}" class="le-button">View item</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
