@extends('admin.layouts.master')

@section('content')

    <h3 class="page-title">
        Dashboard
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{ action('Admin\HomeController@index') }}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="">Contracts</a>
                {!! FA::icon('angle-right') !!}
            </li>
            <li>
                <a href="">Dashboard</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
            <div class="dashboard-stat green-haze">
                <div class="visual">
                    {!! FA::icon('newspaper-o') !!}
                </div>
                <div class="details">
                    <div class="number">
                        {{ count($userContracts) }}
                    </div>
                    <div class="desc">
                        Amount of Contracts
                    </div>
                </div>
                <a class="more" href="#">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
            <div class="dashboard-stat red-intense">
                <div class="visual">
                    {!! FA::icon('money') !!}
                </div>
                <div class="details">
                    <div class="number">
                        @if(empty($revenuePM)) 0 @else {{ $revenuePM }} @endif
                    </div>
                    <div class="desc">
                        Revenue Per Month
                    </div>
                </div>
                <a class="more" href="#">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
    </div>

@endsection