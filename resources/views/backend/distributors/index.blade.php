@extends('backend.layout.main')

@section('styles')
    <link href="{{ mix('/css/backend.datatable.css') }}" rel="stylesheet">
@endsection

@section('title', trans('labels.backend.distributors.management'))

@section('header')
    <h1>
        <i class="fas fa-warehouse"></i>
        {{ trans('labels.backend.distributors.management') }}
    </h1>
@endsection

@section('content')
    <div class="card card-accent-info mt-3">
        <div class="card-header">
            <h4 class="d-inline-block">{{ trans('labels.backend.distributors.list') }}</h4>

            <div class="float-right">
                @include('backend.distributors.partials.header-buttons')
            </div>
        </div>

        <div class="card-body">
            <table id="shop-distributors-table" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>{{ trans('labels.backend.distributors.table.id') }}</th>
                    <th>{{ trans('labels.backend.distributors.table.title') }}</th>
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
                    url: '{{ route('backend.ajax.distributors.get') }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'sh_distributors.id'},
                    {data: 'title', name: 'sh_distributors.title'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false, 'class': 'text-nowrap'}
                ],
                order: [[0, 'asc']],
                searchDelay: 500
            });
        });
    </script>
@endsection
