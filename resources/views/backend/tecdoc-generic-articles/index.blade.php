@extends('backend.layout.main')

@section('styles')
    <link href="{{ mix('/css/backend.datatable.css') }}" rel="stylesheet">
@endsection

@section('title', trans('labels.backend.generic-articles.management'))

@section('header')
    <h1>
        <i class="fas fa-tools"></i>
        {{ trans('labels.backend.generic-articles.management') }}
    </h1>
@endsection

@section('content')
    <form class="form-horizontal" action="{{ route('backend.generic-articles.sync') }}" method="post">
        @csrf

        <div class="card card-accent-success mt-3">
            <div class="card-header">
                <h4 class="d-inline-block">{{ trans('labels.general.synchronize') }}</h4>

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
            <h4 class="d-inline-block">{{ trans('labels.backend.generic-articles.list') }}</h4>

            <div class="float-right">
                @include('backend.tecdoc-generic-articles.partials.header-buttons')
            </div>
        </div>

        <div class="card-body">
            <table id="tecdoc-generic-articles-table" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>genericArticleId</th>
                    <th>assemblyGroup</th>
                    <th>designation</th>
                    <th>masterDesignation</th>
                    <th>usageDesignation</th>
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
            $('#tecdoc-generic-articles-table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                ajax: {
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    url: '{{ route('backend.ajax.generic-articles.get') }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'td_generic_articles.id'},
                    {data: 'genericArticleId', name: 'td_generic_articles.genericArticleId'},
                    {data: 'assemblyGroup', name: 'td_generic_articles.assemblyGroup'},
                    {data: 'designation', name: 'td_generic_articles.designation'},
                    {data: 'masterDesignation', name: 'td_generic_articles.masterDesignation'},
                    {data: 'usageDesignation', name: 'td_generic_articles.usageDesignation'},
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@endsection

