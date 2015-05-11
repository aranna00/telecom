@extends('admin/layouts.master')

@section('content')

    <h3 class="page-title">
        Dashboard</h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{ action('Admin\HomeController@index') }}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="">Dashboard</a>
            </li>
        </ul>
    </div>

@endsection