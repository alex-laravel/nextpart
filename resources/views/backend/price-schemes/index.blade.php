@extends('backend.layout.main')

@section('styles')
    <link href="{{ mix('/css/backend.datatable.css') }}" rel="stylesheet">
@endsection

@section('title', trans('labels.backend.price_schemes.management'))

@section('header')
    <h1>
        <i class="far fa-money-bill-alt"></i>
        {{ trans('labels.backend.price_schemes.management') }}
    </h1>
@endsection

@section('content')
    <div class="card card-accent-info mt-3">
        <div class="card-header">
            <h4 class="d-inline-block">{{ trans('labels.backend.price_schemes.list') }}</h4>

            <div class="float-right">
                @include('backend.price-schemes.partials.header-buttons')
            </div>
        </div>

        <div class="card-body">
            <table id="shop-price-schemes-table" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>{{ trans('labels.backend.price_schemes.table.id') }}</th>
                    <th>{{ trans('labels.backend.price_schemes.table.price_from') }}</th>
                    <th>{{ trans('labels.backend.price_schemes.table.price_to') }}</th>
                    <th>{{ trans('labels.backend.price_schemes.table.percentage') }}</th>
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
            $('#shop-price-schemes-table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                paging: false,
                searching: false,
                ajax: {
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    url: '{{ route('backend.ajax.price-schemes.get') }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'sh_price_schemes.id'},
                    {data: 'price_from', name: 'sh_price_schemes.price_from', 'class': 'text-center'},
                    {data: 'price_to', name: 'sh_price_schemes.price_to', 'class': 'text-center'},
                    {data: 'percentage', name: 'sh_price_schemes.percentage', 'class': 'text-center'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false, 'class': 'text-nowrap'}
                ],
                order: [[0, 'asc']],
                searchDelay: 500
            });
        });
    </script>
@endsection
