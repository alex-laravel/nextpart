@extends('backend.layout.main')

@section('styles')
    <link href="{{ mix('/css/backend.datatable.css') }}" rel="stylesheet">
@endsection

@section('title', trans('labels.backend.distributor-storages.management'))

@section('header')
    <h1>
        <i class="fas fa-pallet"></i>
        {{ trans('labels.backend.distributor-storages.management') }}
    </h1>
@endsection

@section('content')
    <div class="card card-accent-info mt-3">
        <div class="card-header">
            <h4 class="d-inline-block">{{ trans('labels.backend.distributor-storages.list') }}</h4>

            <div class="float-right">
                @include('backend.distributor-storages.partials.header-buttons')
            </div>
        </div>

        <div class="card-body">
            <table id="shop-distributor-storages-table" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>{{ trans('labels.backend.distributor-storages.table.id') }}</th>
                    <th>{{ trans('labels.backend.distributor-storages.table.title') }}</th>
                    <th>{{ trans('labels.backend.distributor-storages.table.distributor') }}</th>
                    <th>{{ trans('labels.backend.distributor-storages.table.delivery_days') }}</th>
                    <th>{{ trans('labels.backend.distributor-storages.table.import_sequence_number') }}</th>
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
            $('#shop-distributor-storages-table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                ajax: {
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    url: '{{ route('backend.ajax.distributor-storages.get') }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'sh_distributor_storages.id'},
                    {data: 'title', name: 'sh_distributor_storages.title'},
                    {data: 'distributor', name: 'distributor'},
                    {data: 'delivery_days', name: 'sh_distributor_storages.delivery_days'},
                    {data: 'import_sequence_number', name: 'sh_distributor_storages.import_sequence_number'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false, 'class': 'text-nowrap'}
                ],
                order: [[0, 'asc']],
                searchDelay: 500
            });
        });
    </script>
@endsection
