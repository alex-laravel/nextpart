@extends('backend.layout.main')

@section('styles')
    <link href="{{ mix('/css/backend.datatable.css') }}" rel="stylesheet">
@endsection

@section('title', trans('labels.backend.manufacturers.management'))

@section('header')
    <h1>
        <i class="fas fa-car"></i>
        {{ trans('labels.backend.manufacturers.management') }}
    </h1>
@endsection

@section('content')
    <form action="{{ route('backend.manufacturers.sync') }}" method="post">
        @csrf

        <div class="card card-accent-warning mt-3">
            <div class="card-header">
                <h4 class="d-inline-block">{{ trans('labels.general.synchronize') }}</h4>

                <div class="float-right">
                    <button class="btn btn-block btn-primary" type="submit">{{ trans('buttons.general.synchronize') }}</button>
                </div>
            </div>

            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-3">
                        <strong>{{ trans('menus.backend.tecdoc.countries.title') }}</strong>
                    </div>

                    <div class="col-md-9">
                        @if (count($countries))
                            <select class="form-control" id="country" name="country">
                                <option value="">Please select</option>
                                @foreach ($countries as $country)
                                    @if (!old('country') && $country->countryCode === $defaultLanguage)
                                        <option value="{{ $country->countryCode }}" selected>{{ $country->countryCode }} - {{ $country->countryName }}</option>
                                    @elseif (old('country') === $country->countryCode)
                                        <option value="{{ $country->countryCode }}" selected>{{ $country->countryCode }} - {{ $country->countryName }}</option>
                                    @else
                                        <option value="{{ $country->countryCode }}">{{ $country->countryCode }} - {{ $country->countryName }}</option>
                                    @endif
                                @endforeach
                            </select>
                        @else
                            <small class="d-block">нет вариантов для стран</small>
                        @endif
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3">
                        <strong>{{ trans('menus.backend.tecdoc.country-groups.title') }}</strong>
                    </div>

                    <div class="col-md-9">
                        @if (count($countryGroups))
                            <select class="form-control" id="countryGroup" name="countryGroup">
                                <option value="">Please select</option>
                                @foreach ($countryGroups as $countryGroup)
                                    @if ($countryGroup->tecdocCode == old('countryGroup'))
                                        <option value="{{ $countryGroup->tecdocCode }}" selected>{{ $countryGroup->tecdocCode }} - {{ $countryGroup->countryName }}</option>
                                    @else
                                        <option value="{{ $countryGroup->tecdocCode }}">{{ $countryGroup->tecdocCode }} - {{ $countryGroup->countryName }}</option>
                                    @endif
                                @endforeach
                            </select>
                        @else
                            <small class="d-block">нет вариантов для групп стран</small>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="card card-accent-info mt-3">
        <div class="card-header">
            <h4 class="d-inline-block">{{ trans('labels.backend.manufacturers.list') }}</h4>
        </div>

        <div class="card-body">
            <table id="tecdoc-manufacturers-table" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>slug</th>
                    <th>manuId</th>
                    <th>manuName</th>
                    <th>favorFlag</th>
                    <th>isPopular</th>
                    <th>isVisible</th>
                    <th>Models</th>
                    <th>Vehicles</th>
                    <th>{{ trans('buttons.general.actions') }}</th>
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
            $('#tecdoc-manufacturers-table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                ajax: {
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    url: '{{ route('backend.ajax.manufacturers.get') }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'td_manufacturers.id'},
                    {data: 'slug', name: 'td_manufacturers.slug'},
                    {data: 'manuId', name: 'td_manufacturers.manuId'},
                    {data: 'manuName', name: 'td_manufacturers.manuName'},
                    {data: 'favorFlag', name: 'td_manufacturers.favorFlag'},
                    {data: 'isPopular', name: 'td_manufacturers.isPopular'},
                    {data: 'isVisible', name: 'td_manufacturers.isVisible'},
                    {data: 'modelsTotal', name: 'td_manufacturers.modelsTotal'},
                    {data: 'vehiclesTotal', name: 'td_manufacturers.vehiclesTotal'},
                    {data: 'actions', name: 'actions', sortable: false, searchable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@endsection
