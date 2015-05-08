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
                        <h2 class="section-title">Contracts</h2>
                    </div>
                    <div class="products-list">
                        @foreach($contracts as $contract)
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
                                                <a href="{{ action('ContractController@show',$contract->id) }}">{{ $contract->name }}</a>
                                            </div>
                                            <div class="brand">
                                                {{ $phone->brand }}
                                            </div>
                                            <div class="excerpt">
                                                {!! $contract->excerpt !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="no-margin col-xs-12 col-sm-3 price-area">
                                        <div class="right-clmn">
                                            <div class="price-current">{{ $contract->cost }} p/mth</div>
                                            <a class="le-button" href="{{ action('ContractController@show',$phone->id) }}">View Item</a>
                                            <div>Phone price: {{ $contract->phone_price }}</div>
                                            <div class="small">Contract lenght: {{ $contract->length }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
