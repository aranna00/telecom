@extends('admin.layouts.master')

@section('content')

    <h3 class="page-title">
        Add contract
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
                <a href="">Create new contract</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="rom-md-12">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        {!! FA::icon('newspaper-o font-green-sharp') !!}
                        <span class="caption-subject font-green-sharp bold uppercase">Contracts</span>
                        <span class="caption-helper">Add contracts...</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    {!! Form::open(['action'=>'Admin\ContractController@store','role'=>'form','class'=>'form-horizontal']) !!}
                        <div class="form-body">
                            <div class="form-group">
                                {!! Html::decode(Form::label('name','Name: <span class="required">* </span>',['class'=>'control-label col-md-3'])) !!}
                                <div class="input-group col-md-9">
                                    {!! Form::text('name','',['class'=>'form-control','placeholder'=>'Displayed name']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Html::decode(Form::label('description','Description: <span class="required">* </span>',['class'=>'control-label col-md-3'])) !!}
                                <div class="input-group col-md-9">
                                    {!! Form::textarea('description','',['class'=>'form-control','placeholder'=>'Displayed name','id'=>'editor1']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Html::decode(Form::label('cost','Contract cost: <span class="required">* </span>',['class'=>'control-label col-md-3'])) !!}
                                <div class="input-group col-md-9">
                                    {!! Form::number('cost','',['min'=>'0','step'=>'0.01','class'=>'form-control','placeholder'=>'Contract cost']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Html::decode(Form::label('length','Length in years: <span class="required">* </span>',['class'=>'control-label col-md-3'])) !!}
                                <div class="input-group col-md-9">
                                    {!! Form::number('length','',['min'=>'0','class'=>'form-control','placeholder'=>'Contract length']) !!}
                                </div>
                            </div>
                            <div class="form-group form-group-multiple-selects">
                                {!! Html::decode(Form::label('phone','Corresponding phone(s): <span class="required">* </span>',['class'=>'control-label col-md-3'])) !!}
                                <div class="input-group input-group-multiple-select col-md-9">
                                    {!! Form::select('phone[]',$phones_array,'',['class'=>'form-control','show-tick'=>'true','data-live-search'=>'true']) !!}
                                    {!! Form::number('phone_cost[]','',['min'=>'0','class'=>'form-control','placeholder'=>'Phone Cost']) !!}
                                    <span class="input-group-addon input-group-addon-remove">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    {!! Form::submit('Add',['class'=>'btn green']) !!}
                                    <a href="{{ action('Admin\ContractController@index') }}" class="btn default">Cancel</a>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <script>
        jQuery(document).ready(function() {
            CKEDITOR.replace( 'editor1' );
        });
    </script>

@endsection