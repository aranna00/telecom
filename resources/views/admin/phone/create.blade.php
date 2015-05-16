@extends('admin.layouts.master')

@section('content')

    <h3 class="page-title">
        List View
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
                <a href="">Add Phone</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['action'=>'Admin\PhoneController@store','class'=>'form-horizontal form-row-seperated']) !!}
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            {!! FA::icon('basket font-green-sharp') !!}
                            <span class="caption-subject font-green-sharp bold uppercase">
                                Create Phone
                            </span>
                            <span class="caption-helper">

                            </span>
                        </div>
                        <div class="actions btn-set">
                            <button type="button" name="back" class="btn btn-default btn-circle">
                                {!! FA::icon('angle-left') !!} back
                            </button>
                            <button class="btn btn-default btn-circle">
                                {!!  FA::icon('reply') !!} Reset
                            </button>
                            <button class="btn green-haze btn-circle">
                                {!! Fa::icon('check') !!} Save
                            </button>
                            <button class="btn green-haze btn-circle">
                                {!! FA::icon('check-circle') !!} Save & Continue Edit
                            </button>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="tabbable">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_general" data-toggle="tab">
                                        General
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab_images" data-toggle="tab">
                                        Images
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content no-space">
                                <div class="tab-pane active" id="tab_general">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <div class="form-group">
                                                {!! Html::decode(Form::label('product[brand]','Brand: <span class="required">* </span>',['class'=>'col-md-2 control-label'])) !!}
                                                <div class="col-md-10">
                                                    {!! Form::text('product[brand]','',['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {!! Html::decode(Form::label('product[model]','Model: <span class="required">* </span>',['class'=>'col-md-2 control-label'])) !!}
                                                <div class="col-md-10">
                                                    {!! Form::text('product[model]','',['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                            {!! Html::decode(Form::label('product[description]','Description: <span class="required">* </span>',['class'=>'col-md-2 control-label'])) !!}
                                            <div class="col-md-10">
                                                {!! Form::textarea('product[description]','',['class'=>'form-control','id'=>'editor1'])  !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('product[costs]','Price: <span class="required">* </span>',['class'=>'col-md-2 control-label'])) !!}
                                            <div class="col-md-10">
                                                {!! Form::number('product[costs]','',['class'=>'form-control','step'=>'0.01']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_images">
                                    Please Add the images after the adding of the Phone.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    <script>
        jQuery(document).ready(function() {
            CKEDITOR.replace( 'editor1' );
        });
    </script>
@endsection