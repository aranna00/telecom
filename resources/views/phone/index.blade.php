@extends('layouts.master')

@section('content')
    <section id="category-grid">
        <div class="container">
            <div class="col-xs-12 col-sm-3 no-margin sidebar narrow">
                <div class="widget">
                    <h1 class="border">information</h1>
                    <div class="body">
                        <ul class="le-links">
                            <li><a href="#">delivery</a></li>
                            <li><a href="#">secure payment</a></li>
                            <li><a href="#">contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-xs-12 col-sm-9 no-margin wide sidebar">
                <section id="gaming">
                    <div class="grid-list-products">
                        <h2 class="section-title">Phones</h2>
                        <div class="control-bar">
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
                                        <div class="col-xs-12 col-sm-4 col-md-4 no-margin product-item-holder hover">
                                            <div class="product-item">
                                                <div class="image">
                                                    <img width="auto" height="146" alt="" src="{{ asset('images/blank.gif') }}" data-echo="{{ asset(json_decode($phone->pictures)[$phone->main_pic]) }}" />
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
                                                        <a href="{{ action('PhoneController@show',$phone->id) }}" class="le-button">View Item</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="list-view" class="product-grid fade tab-pane">
                            <div class="products-list">
                                @foreach($phones as $phone)
                                    <div class="product-item product-item-holder">
                                        <div class="row">
                                            <div class="no-margin col-xs-12 col-sm-4 image-holder">
                                                <div class="image">
                                                    <img src="{{ asset('images/blank.gif') }}" data-echo="{{ asset(json_decode($phone->pictures)[$phone->main_pic]) }}">
                                                </div>
                                            </div>
                                            <div class="no-margin col-xs-12 col-sm-5 body-holder">
                                                <div class="body">
                                                    <div class="title">
                                                        <a href="{{ action('PhoneController@show',$phone->id) }}">{{ $phone->brand }} {{ $phone->model }}</a>
                                                    </div>
                                                    <div class="brand">
                                                        {{ $phone->brand }}
                                                    </div>
                                                    <div class="excerpt">
                                                        {{ $phone->description }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="no-margin col-xs-12 col-sm-3 price-area">
                                                <div class="right-clmn">
                                                    <div class="price-current">{{ $phone->costs }}</div>
                                                    <div class="availability"><label>Availability:</label><span class="available">In stock</span> </div>
                                                    <a class="le-button" href="{{ action('PhoneController@show',$phone->id) }}">View Item</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
