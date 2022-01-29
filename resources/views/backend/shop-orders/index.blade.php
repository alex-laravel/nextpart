@extends('backend.layout.main')

@section('styles')
    <link href="{{ mix('/css/backend.datatable.css') }}" rel="stylesheet">
@endsection

@section('title', trans('labels.backend.orders.management'))

@section('header')
    <h1>
        <i class="fa fa-shopping-cart"></i>
        {{ trans('labels.backend.orders.management') }}
    </h1>
@endsection

@section('content')
    <div class="card card-accent-info mt-3">
        <div class="card-header">
            <h4 class="d-inline-block">{{ trans('labels.backend.orders.list') }}</h4>

            <div class="float-right">
                @include('backend.shop-orders.partials.header-buttons')
            </div>
        </div>

        <div class="card-body">
            <table id="shop-distributors-table" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>{{ trans('labels.backend.orders.table.id') }}</th>
                    <th>{{ trans('labels.backend.orders.table.number') }}</th>
                    <th>{{ trans('labels.backend.orders.table.cart_quantity') }}</th>
                    <th>{{ trans('labels.backend.orders.table.cart_total') }}</th>
                    <th>{{ trans('labels.backend.orders.table.status') }}</th>
                    <th>{{ trans('labels.backend.orders.table.delivery_method') }}</th>
                    <th>{{ trans('labels.backend.orders.table.created_at') }}</th>
                    <th>{{ trans('labels.backend.orders.table.updated_at') }}</th>
                    <th>{{ trans('labels.general.actions') }}</th>
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
            $('#shop-distributors-table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                ajax: {
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    url: '{{ route('backend.ajax.orders.get') }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'sh_orders.id'},
                    {data: 'number', name: 'sh_orders.number'},
                    {data: 'cart_quantity', name: 'sh_orders.cart_quantity'},
                    {data: 'cart_total', name: 'sh_orders.cart_total'},
                    {data: 'status', name: 'sh_orders.status'},
                    {data: 'delivery_method', name: 'sh_orders.delivery_method'},
                    {data: 'created_at', name: 'sh_orders.created_at'},
                    {data: 'updated_at', name: 'sh_orders.updated_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false, class: 'text-nowrap'}
                ],
                order: [[0, 'asc']],
                searchDelay: 500
            });
        });
    </script>
@endsection
