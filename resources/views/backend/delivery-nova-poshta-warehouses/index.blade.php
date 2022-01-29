@extends('backend.layout.main')

@section('styles')
    <link href="{{ mix('/css/backend.datatable.css') }}" rel="stylesheet">
@endsection

@section('title', trans('labels.backend.nova_poshta_warehouses.management'))

@section('header')
    <h1>
        <i class="fas fa-shipping-fast"></i>
        {{ trans('labels.backend.nova_poshta_warehouses.management') }}
    </h1>
@endsection

@section('content')
    <form class="form-horizontal" action="{{ route('backend.delivery.nova-poshta.warehouses.sync') }}" method="post">
        @csrf

        <div class="card card-accent-success mt-3">
            <div class="card-header">
                <h4 class="d-inline-block">{{ trans('labels.general.synchronize_nova_poshta') }}</h4>

                <div class="float-right">
                    <button class="btn btn-block btn-primary" type="submit">{{ trans('buttons.general.synchronize') }}</button>
                </div>
            </div>

            <div class="card-body">
            </div>
        </div>
    </form>

    <div class="card card-accent-info mt-3">
        <div class="card-header">
            <h4 class="d-inline">{{ trans('labels.backend.nova_poshta_warehouses.list') }}</h4>
        </div>

        <div class="card-body">
            <table id="delivery-nova-poshta-warehouses-table" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Description</th>
                    <th>ShortAddress</th>
                    <th>CityDescription</th>
                    <th>SettlementAreaDescription</th>
                    <th>isVisible</th>
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
            $('#delivery-nova-poshta-warehouses-table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                ajax: {
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    url: '{{ route('backend.delivery.nova-poshta.ajax.warehouses.get') }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'de_nova_poshta_warehouses.id'},
                    {data: 'Description', name: 'de_nova_poshta_warehouses.Description'},
                    {data: 'ShortAddress', name: 'de_nova_poshta_warehouses.ShortAddress'},
                    {data: 'CityDescription', name: 'de_nova_poshta_warehouses.CityDescription'},
                    {data: 'SettlementAreaDescription', name: 'de_nova_poshta_warehouses.SettlementAreaDescription'},
                    {data: 'isVisible', name: 'de_nova_poshta_warehouses.isVisible'},
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@endsection
