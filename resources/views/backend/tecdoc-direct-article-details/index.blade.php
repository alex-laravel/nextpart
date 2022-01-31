@extends('backend.layout.main')

@section('styles')
    <link href="{{ mix('/css/backend.datatable.css') }}" rel="stylesheet">
@endsection

@section('title', trans('labels.backend.direct-article-details.management'))

@section('header')
    <h1>
        <i class="fas fa-tools"></i>
        {{ trans('labels.backend.direct-article-details.management') }}
    </h1>
@endsection

@section('content')
    <div class="card card-accent-info mt-3">
        <div class="card-header">
            <h4 class="d-inline-block">{{ trans('labels.backend.direct-article-details.list') }}</h4>

            <div class="float-right">
                @include('backend.tecdoc-direct-article-details.partials.header-buttons')
            </div>
        </div>

        <div class="card-body">
            <table id="tecdoc-direct-article-details-table" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>articleId</th>
                    <th>articleName</th>
                    <th>articleNo</th>
                    <th>articleState</th>
                    <th>articleStateName</th>
                    <th>brandName</th>
{{--                    <th>brandNo</th>--}}
{{--                    <th>genericArticleId</th>--}}
                    <th>hasDocuments</th>
{{--                    <th>hasMarkLink</th>--}}
{{--                    <th>hasPartList</th>--}}
{{--                    <th>hasVehicleLink</th>--}}
{{--                    <th>mainArticle</th>--}}
{{--                    <th>replacedByNumber</th>--}}
{{--                    <th>replacedNumber</th>--}}
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
            $('#tecdoc-direct-article-details-table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                ajax: {
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    url: '{{ route('backend.ajax.direct-article-details.get') }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'td_direct_article_details.id'},
                    {data: 'articleId', name: 'td_direct_article_details.articleId'},
                    {data: 'articleName', name: 'td_direct_article_details.articleName'},
                    {data: 'articleNo', name: 'td_direct_article_details.articleNo'},
                    {data: 'articleState', name: 'td_direct_article_details.articleState'},
                    {data: 'articleStateName', name: 'td_direct_article_details.articleStateName'},
                    {data: 'brandName', name: 'td_direct_article_details.brandName'},
                    // {data: 'brandNo', name: 'td_direct_article_details.brandNo'},
                    // {data: 'genericArticleId', name: 'td_direct_article_details.genericArticleId'},
                    {data: 'hasDocuments', name: 'td_direct_article_details.hasDocuments'}
                    // {data: 'hasMarkLink', name: 'td_direct_article_details.hasMarkLink'},
                    // {data: 'hasPartList', name: 'td_direct_article_details.hasPartList'},
                    // {data: 'hasVehicleLink', name: 'td_direct_article_details.hasVehicleLink'},
                    // {data: 'mainArticle', name: 'td_direct_article_details.mainArticle'},
                    // {data: 'replacedByNumber', name: 'td_direct_article_details.replacedByNumber'},
                    // {data: 'replacedNumber', name: 'td_direct_article_details.replacedNumber'}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@endsection

