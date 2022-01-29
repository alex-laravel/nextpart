@extends('backend.layout.main')

@section('styles')
    <link href="{{ mix('/css/backend.datatable.css') }}" rel="stylesheet">
@endsection

@section('title', trans('labels.backend.direct-article-analogs.management'))

@section('header')
    <h1>
        <i class="fas fa-tools"></i>
        {{ trans('labels.backend.direct-article-analogs.management') }}
    </h1>
@endsection

@section('content')
    <div class="card card-accent-info mt-3">
        <div class="card-header">
            <h4 class="d-inline-block">{{ trans('labels.backend.direct-article-analogs.list') }}</h4>

            <div class="float-right">
                @include('backend.tecdoc-direct-article-analogs.partials.header-buttons')
            </div>
        </div>

        <div class="card-body">
            <table id="tecdoc-direct-article-analogs-table" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>originalArticleId</th>
                    <th>originalArticleNo</th>
                    <th>articleId</th>
                    <th>articleNo</th>
                    <th>articleSearchNo</th>
                    <th>articleName</th>
                    <th>articleStateId</th>
                    <th>brandNo</th>
                    <th>brandName</th>
                    <th>genericArticleId</th>
                    <th>numberType</th>
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
            $('#tecdoc-direct-article-analogs-table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                ajax: {
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    url: '{{ route('backend.ajax.direct-article-analogs.get') }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'td_direct_article_analogs.id'},
                    {data: 'originalArticleId', name: 'td_direct_article_analogs.originalArticleId'},
                    {data: 'originalArticleNo', name: 'td_direct_article_analogs.originalArticleNo'},
                    {data: 'articleId', name: 'td_direct_article_analogs.articleId'},
                    {data: 'articleNo', name: 'td_direct_article_analogs.articleNo'},
                    {data: 'articleSearchNo', name: 'td_direct_article_analogs.articleSearchNo'},
                    {data: 'articleName', name: 'td_direct_article_analogs.articleName'},
                    {data: 'articleStateId', name: 'td_direct_article_analogs.articleStateId'},
                    {data: 'brandNo', name: 'td_direct_article_analogs.brandNo'},
                    {data: 'brandName', name: 'td_direct_article_analogs.brandName'},
                    {data: 'genericArticleId', name: 'td_direct_article_analogs.genericArticleId'},
                    {data: 'numberType', name: 'td_direct_article_analogs.numberType'}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@endsection

