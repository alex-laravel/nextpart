@extends('backend.layout.main')

@section('styles')
    <link href="{{ mix('/css/backend.datatable.css') }}" rel="stylesheet">
@endsection

@section('title', trans('labels.backend.distributor-products.management'))

@section('header')
    <h1>
        <i class="fas fa-barcode"></i>
        {{ trans('labels.backend.distributor-products.management') }}
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'backend.distributor-products.import', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST', 'files'=> true]) }}
    <div class="card card-accent-danger mt-3">
        <div class="card-header">
            <h4 class="d-inline-block">{{ trans('labels.backend.distributor-products.import') }}</h4>

            <div class="float-right">
                <button class="btn btn-block btn-primary" type="submit">{{ trans('buttons.general.import') }}</button>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group row">
                {{ Form::label('distributor_id', trans('menus.backend.shop.distributors.title'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-5">
                    {{ Form::select('distributor_id', $distributorsList, false, ['class' => 'form-control', 'required' => 'required']) }}
                </div>

                <div class="col-lg-5">
                    {!! Form::file('distributor_file') !!}
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}

    {{ Form::open(['route' => 'backend.distributor-products.sync', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST']) }}
    <div class="card card-accent-success mt-3">
        <div class="card-header">
            <h4 class="d-inline-block">{{ trans('labels.general.synchronize') }}</h4>

            <div class="float-right mr-2">
                <button class="btn btn-block btn-primary" type="submit">{{ trans('buttons.general.synchronize') }}</button>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group row">
                {{ Form::label('distributor_id', trans('menus.backend.shop.distributors.title'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-5">
                    {{ Form::select('distributor_id', $distributorsList, false, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
            </div>
        </div>

        <div class="card-body">
        </div>
    </div>
    {{ Form::close() }}

    <div class="card card-accent-info mt-3">
        <div class="card-header">
            <h4 class="d-inline-block">{{ trans('labels.backend.distributor-products.list') }}</h4>

            <div class="float-right">
                @include('backend.distributor-products.partials.header-buttons')
            </div>
        </div>

        <div class="card-body">
            <table id="shop-distributor-products-table" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>{{ trans('labels.backend.distributor-products.table.id') }}</th>
                    <th>{{ trans('labels.backend.distributor-products.table.distributor_storage') }}</th>
                    <th>{{ trans('labels.backend.distributor-products.table.product_original_no') }}</th>
                    <th>{{ trans('labels.backend.distributor-products.table.product_local_no') }}</th>
                    <th>{{ trans('labels.backend.distributor-products.table.product_local_name') }}</th>
                    <th>{{ trans('labels.backend.distributor-products.table.product_band_name') }}</th>
                    <th>{{ trans('labels.backend.distributor-products.table.quantity') }}</th>
                    <th>{{ trans('labels.backend.distributor-products.table.base_price') }}</th>
                    <th>{{ trans('labels.backend.distributor-products.table.percent') }}</th>
                    <th>{{ trans('labels.backend.distributor-products.table.retail_price') }}</th>
{{--                    <th>{{ trans('labels.general.actions') }}</th>--}}
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ mix('/js/backend.datatable.js') }}"></script>
    <script>
        $(function () {
            $('#shop-distributor-products-table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                ajax: {
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    url: '{{ route('backend.ajax.distributor-products.get') }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'sh_distributor_products.id'},
                    {data: 'distributor_storage', name: 'distributor_storage'},
                    {data: 'product_original_no', name: 'sh_distributor_products.product_original_no'},
                    {data: 'product_local_no', name: 'sh_distributor_products.product_local_no'},
                    {data: 'product_local_name', name: 'sh_distributor_products.product_local_name'},
                    {data: 'product_band_name', name: 'sh_distributor_products.product_band_name'},
                    {data: 'quantity', name: 'sh_distributor_products.quantity'},
                    {data: 'price', name: 'sh_distributor_products.price'},
                    {data: 'percent', name: 'percent', searchable: false, sortable: false},
                    {data: 'retail_price', name: 'sh_distributor_products.retail_price', searchable: false, sortable: false}
                    // {data: 'actions', name: 'actions', searchable: false, sortable: false, 'class': 'text-nowrap'}
                ],
                order: [[0, 'asc']],
                searchDelay: 500
            });
        });
    </script>
@endsection
