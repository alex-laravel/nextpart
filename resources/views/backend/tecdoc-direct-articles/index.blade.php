@extends('backend.layout.main')

@section('styles')
    <link href="{{ mix('/css/backend.datatable.css') }}" rel="stylesheet">
@endsection

@section('title', trans('labels.backend.direct-articles.management'))

@section('header')
    <h1>
        <i class="fas fa-tools"></i>
        {{ trans('labels.backend.direct-articles.management') }}
    </h1>
@endsection

@section('content')
    <div class="card card-accent-info mt-3">
        <div class="card-header">
            <h4 class="d-inline-block">{{ trans('labels.backend.direct-articles.list') }}</h4>

            <div class="float-right">
                @include('backend.tecdoc-direct-articles.partials.header-buttons')
            </div>
        </div>

        <div class="card-body">
            <table id="tecdoc-direct-articles-table" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>ID</th>
{{--                    <th>genericArticleId</th>--}}
{{--                    <th>assemblyGroup</th>--}}
{{--                    <th>designation</th>--}}
{{--                    <th>masterDesignation</th>--}}
{{--                    <th>usageDesignation</th>--}}
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ mix('/js/backend.datatable.js') }}"></script>
    <script>
        {{--$(function () {--}}
        {{--    $('#tecdoc-direct-articles-table').DataTable({--}}
        {{--        processing: true,--}}
        {{--        serverSide: true,--}}
        {{--        pageLength: 25,--}}
        {{--        ajax: {--}}
        {{--            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},--}}
        {{--            url: '{{ route('backend.ajax.direct-articles.get') }}',--}}
        {{--            type: 'post'--}}
        {{--        },--}}
        {{--        columns: [--}}
        {{--            {data: 'id', name: 'td_direct_articles.id'},--}}
        {{--            // {data: 'genericArticleId', name: 'td_direct_articles.genericArticleId'},--}}
        {{--            // {data: 'assemblyGroup', name: 'td_direct_articles.assemblyGroup'},--}}
        {{--            // {data: 'designation', name: 'td_direct_articles.designation'},--}}
        {{--            // {data: 'masterDesignation', name: 'td_direct_articles.masterDesignation'},--}}
        {{--            // {data: 'usageDesignation', name: 'td_direct_articles.usageDesignation'},--}}
        {{--        ],--}}
        {{--        order: [[0, "asc"]],--}}
        {{--        searchDelay: 500--}}
        {{--    });--}}
        {{--});--}}
    </script>
@endsection

