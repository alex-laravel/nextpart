@extends('backend.layout.main')

@section('styles')
    <link href="{{ mix('/css/backend.datatable.css') }}" rel="stylesheet">
@endsection

@section('title', trans('labels.backend.version.management'))

@section('header')
    <h1>
        <i class="fas fa-code-branch"></i>
        {{ trans('labels.backend.version.management') }}
    </h1>
@endsection

@section('content')
    <form class="form-horizontal" action="{{ route('backend.version.sync') }}" method="post">
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
            <h4 class="d-inline-block">{{ trans('labels.backend.version.list') }}</h4>

            <div class="float-right">
                @include('backend.tecdoc-version.partials.header-buttons')
            </div>
        </div>

        <div class="card-body">
            <table id="tecdoc-version-table" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>build</th>
                    <th>major</th>
                    <th>minor</th>
                    <th>revision</th>
                    <th>date</th>
                    <th>dataVersion</th>
                    <th>refDataVersion</th>
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
                    url: '{{ route('backend.ajax.version.get') }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'td_version.id'},
                    {data: 'build', name: 'td_version.build'},
                    {data: 'major', name: 'td_version.major'},
                    {data: 'minor', name: 'td_version.minor'},
                    {data: 'revision', name: 'td_version.revision'},
                    {data: 'date', name: 'td_version.date'},
                    {data: 'dataVersion', name: 'td_version.dataVersion'},
                    {data: 'refDataVersion', name: 'td_version.refDataVersion'}
                ],
                order: [[0, 'desc']],
                searchDelay: 500
            });
        });
    </script>
@endsection
