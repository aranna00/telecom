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
            {!! Form::model($phone, ['action'=>['Admin\PhoneController@update',$phone->id],'class'=>'form-horizontal form-row-seperated','files'=>true]) !!}
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
                        <a class="btn btn-default btn-circle" href="{{ action('Admin\PhoneController@all') }}">
                            {!!  FA::icon('reply') !!} Back
                        </a>
                        <button class="btn green-haze btn-circle">
                            {!! Fa::icon('check') !!} Save
                        </button>
                        <button class="btn green-haze btn-circle" name="continue" value="continue">
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
                                            {!! Html::decode(Form::label('brand','Brand: <span class="required">* </span>',['class'=>'col-md-2 control-label'])) !!}
                                            <div class="col-md-10">
                                                {!! Form::text('brand',$phone->brand,['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Html::decode(Form::label('model','Model: <span class="required">* </span>',['class'=>'col-md-2 control-label'])) !!}
                                            <div class="col-md-10">
                                                {!! Form::text('model',$phone->model,['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                        {!! Html::decode(Form::label('description','Description: <span class="required">* </span>',['class'=>'col-md-2 control-label'])) !!}
                                        <div class="col-md-10">
                                            {!! Form::textarea('description',$phone->description,['class'=>'form-control','id'=>'editor1'])  !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Html::decode(Form::label('costs','Price: <span class="required">* </span>',['class'=>'col-md-2 control-label'])) !!}
                                        <div class="col-md-10">
                                            {!! Form::number('costs',$phone->costs,['class'=>'form-control','step'=>'0.01']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_images">
                                <div id="tab_images_uploader_container" class="text-align-reverse margin-bottom-10">
                                    <a id="tab_images_uploader_pickfiles" href="javascript:;" class="btn yellow">
                                        {!! FA::icon('plus') !!} Select Files </a>
                                    <a id="tab_images_uploader_uploadfiles" href="javascript:;" class="btn green">
                                        {!! FA::icon('share') !!} Upload Files </a>
                                </div>
                                <div class="row">
                                    <div id="tab_images_uploader_filelist" class="col-md-6 col-sm-12">
                                    </div>
                                </div>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr role="row" class="heading">
                                        <th width="10%">
                                            Image
                                        </th>
                                        <th>
                                            location
                                        </th>
                                        <th width="10%">
                                            Main Image
                                        </th>
                                        <th width="10%"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pictures as $key => $picture)
                                            <tr>
                                                <td>
                                                    <a href="{{ asset($picture) }}" class="fancybox-button" data-rel="fancybox-button">
                                                        <img class="img-responsive" src="{{ asset($picture) }}" alt="">
                                                    </a>
                                                </td>
                                                <td>
                                                    {!! Form::text('label',$picture,['class'=>'form-control']) !!}
                                                </td>
                                                <td>
                                                    <label>
                                                        {!! Form::radio('main_pic', $key) !!}
                                                    </label>
                                                </td>
                                                <td>
                                                    <a href="javascript:;" class="btn btn-default btn-sm">
                                                        {!! FA::icon('times') !!} Remove
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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