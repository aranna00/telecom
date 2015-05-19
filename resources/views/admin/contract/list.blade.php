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
                <a href="">Contracts</a>
                {!! FA::icon('angle-right') !!}
            </li>
            <li>
                <a href="">List View</a>
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
                        <span class="caption-helper">Manage contracts...</span>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatable_products">
                        <thead>
                        <tr role="row" class="heading">
                            <th width="7%">
                                ID
                            </th>
                            <th width="12%">
                                Name
                            </th>
                            <th width="12%">
                                Price
                            </th>
                            <th width="12%">
                                Length
                            </th>
                            <th width="12%">
                                Phone
                            </th>
                            <th width="12%">
                                Phone Price
                            </th>
                            <th width="12%">
                                Date Created
                            </th>
                            <th width="12%">
                                Actions
                            </th>
                        </tr>
                        <tr role="row" class="filter">
                            <td>
                                <input type="number" step="1" class="form-control form-filter input-sm" name="id">
                            </td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="name">
                            </td>
                            <td>
                                <div class="margin-bottom-5">
                                    <input type="number" step="0.01" class="form-control form-filter input-sm" name="price_from" placeholder="from">
                                </div>
                                <input type="number" step="0.01" class="form-control form-filter input-sm" name="price_to" placeholder="to">
                            </td>
                            <td>
                                <div class="margin-bottom-5">
                                    <input type="number" class="form-control form-filter input-sm" name="length_from" placeholder="from">
                                </div>
                                <input type="number" class="form-control form-filter input-sm" name="length_to" placeholder="to">
                            </td>
                            <td>
                                <input type="text" class="form-control form-filter inpit-sm" name="phone">
                            </td>
                            <td>
                                <div class="margin-bottom-5">
                                    <input type="number" step="0.01" class="form-control form-filter input-sm" name="phone_price_from" placeholder="from">
                                </div>
                                <input type="number" step="0.01" class="form-control form-filter input-sm" name="phone_price_to" placeholder="to">
                            </td>
                            <td>
                                <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                                    <input type="text" class="form-control form-filter input-sm" readonly name="created_from" placeholder="From">
                                        <span class="input-group-btn">
                                            <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
                                        </span>
                                </div>
                                <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                                    <input type="text" class="form-control form-filter input-sm" readonly name="created_to" placeholder="To">
                                        <span class="input-group-btn">
                                            <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
                                        </span>
                                </div>
                            </td>
                            <td>
                                <div class="margin-bottom-5">
                                    <button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
                                </div>
                                <button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Reset</button>
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function remove(url) {
            if (confirm('Are you sure?'))
            {
                location = url;
            }
        }
    </script>

@endsection