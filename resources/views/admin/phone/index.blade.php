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
                <a href="">Phones</a>
                {!! FA::icon('angle-right') !!}
            </li>
            <li>
                <a href="">Dashboard</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
            <div class="dashboard-stat blue-madison">
                <div class="visual">
                    {!! FA::icon('money') !!}
                </div>
                <div class="details">
                    <div class="number">
                        {{ $revenue }}
                    </div>
                    <div class="desc">
                        Phone Revenue
                    </div>
                </div>
                <a class="more" href="#">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
            <div class="dashboard-stat purple-soft">
                <div class="visual">
                    {!! FA::icon('mobile-phone') !!}
                </div>
                <div class="details">
                    <div class="number">
                        {{ count($phoneSales) }}
                    </div>
                    <div class="desc">
                        Phone Sales
                    </div>
                </div>
                <a class="more" href="#">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
    </div>



@endsection