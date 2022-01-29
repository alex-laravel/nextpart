@extends('backend.layout.main')

@section('styles')
    <link href="{{ mix('/css/backend.datatable.css') }}" rel="stylesheet">
@endsection

@section('title', trans('labels.backend.short-cuts.management'))

@section('header')
    <h1>
        <i class="fas fa-tools"></i>
        {{ trans('labels.backend.short-cuts.management') }}
    </h1>
@endsection

@section('content')
    <form class="form-horizontal" action="{{ route('backend.short-cuts.sync') }}" method="post">
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
            <h4 class="d-inline">{{ trans('labels.backend.short-cuts.list') }}</h4>

            <div class="float-right">
                @include('backend.tecdoc-short-cuts.partials.header-buttons')
            </div>
        </div>

        <div class="card-body">
            <table id="tecdoc-short-cuts-table" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>shortCutId</th>
                    <th>shortCutName</th>
                    <th>linkingTargetType</th>
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
            $('#tecdoc-short-cuts-table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                ajax: {
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    url: '{{ route('backend.ajax.short-cuts.get') }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'td_short_cuts.id'},
                    {data: 'shortCutId', name: 'td_short_cuts.shortCutId'},
                    {data: 'shortCutName', name: 'td_short_cuts.shortCutName'},
                    {data: 'linkingTargetType', name: 'td_short_cuts.linkingTargetType'},
                    {data: 'isVisible', name: 'td_short_cuts.isVisible'}
                ],
                order: [[0, 'asc']],
                searchDelay: 500
            });
        });
    </script>
@endsection
