@extends('backend.layout.main')

@section('styles')
    <link href="{{ mix('/css/backend.datatable.css') }}" rel="stylesheet">
@endsection

@section('title', trans('labels.backend.assembly-groups.management'))

@section('header')
    <h1>
        <i class="fas fa-tools"></i>
        {{ trans('labels.backend.assembly-groups.management') }}
    </h1>
@endsection

@section('content')
    <form class="form-horizontal" action="{{ route('backend.assembly-groups.sync') }}" method="post">
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
            <h4 class="d-inline-block">{{ trans('labels.backend.assembly-groups.list') }}</h4>

            <div class="float-right">
                @include('backend.tecdoc-assembly-groups.partials.header-buttons')
            </div>
        </div>

        <div class="card-body">
            <table id="tecdoc-version-table" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>shortCutId</th>
                    <th>shortCutName</th>
                    <th>assemblyGroupNodeId</th>
                    <th>assemblyGroupName</th>
                    <th>linkingTargetType</th>
                    <th>parentNodeId</th>
                    <th>hasChilds</th>
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
            $('#tecdoc-version-table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                ajax: {
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    url: '{{ route('backend.ajax.assembly-groups.get') }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'td_assembly_groups.id'},
                    {data: 'shortCutId', name: 'td_assembly_groups.shortCutId'},
                    {data: 'shortCutName', name: 'td_assembly_groups.shortCutName'},
                    {data: 'assemblyGroupNodeId', name: 'td_assembly_groups.assemblyGroupNodeId'},
                    {data: 'assemblyGroupName', name: 'td_assembly_groups.assemblyGroupName'},
                    {data: 'linkingTargetType', name: 'td_assembly_groups.linkingTargetType'},
                    {data: 'parentNodeId', name: 'td_assembly_groups.parentNodeId'},
                    {data: 'hasChilds', name: 'td_assembly_groups.hasChilds'},
                    {data: 'isVisible', name: 'td_assembly_groups.isVisible'}
                ],
                order: [[0, 'asc']],
                searchDelay: 500
            });
        });
    </script>
@endsection
