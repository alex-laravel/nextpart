@extends('backend.layout.main')

@section('styles')
    <link href="{{ mix('/css/backend.datatable.css') }}" rel="stylesheet">
@endsection

@section('title', trans('labels.backend.models.management'))

@section('header')
    <h1>
        <i class="fas fa-car"></i>
        {{ trans('labels.backend.models.management') }}
    </h1>
@endsection

@section('content')
{{--    <form class="form-horizontal" action="{{ route('backend.models.sync') }}" method="post">--}}
{{--        @csrf--}}

{{--        <div class="card card-accent-success mt-3">--}}
{{--            <div class="card-header">--}}
{{--                <h4 class="d-inline-block">{{ trans('labels.general.synchronize') }}</h4>--}}

{{--                <div class="float-right">--}}
{{--                    <button class="btn btn-block btn-primary" type="submit">{{ trans('buttons.general.synchronize') }}</button>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="card-body">--}}
{{--                <div class="row mb-2">--}}
{{--                    <div class="col-md-3">--}}
{{--                        <strong>{{ trans('menus.backend.tecdoc.countries.title') }}</strong>--}}
{{--                    </div>--}}

{{--                    <div class="col-md-9">--}}
{{--                        @if (count($countries))--}}
{{--                            <select class="form-control" id="country" name="country">--}}
{{--                                <option value="">Please select</option>--}}
{{--                                @foreach ($countries as $country)--}}
{{--                                    @if (!old('country') && $country->countryCode === $defaultLanguage)--}}
{{--                                        <option value="{{ $country->countryCode }}" selected>{{ $country->countryCode }} - {{ $country->countryName }}</option>--}}
{{--                                    @elseif (old('country') === $country->countryCode)--}}
{{--                                        <option value="{{ $country->countryCode }}" selected>{{ $country->countryCode }} - {{ $country->countryName }}</option>--}}
{{--                                    @else--}}
{{--                                        <option value="{{ $country->countryCode }}">{{ $country->countryCode }} - {{ $country->countryName }}</option>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        @else--}}
{{--                            <small class="d-block">нет вариантов для стран</small>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="row mb-2">--}}
{{--                    <div class="col-md-3">--}}
{{--                        <strong>{{ trans('menus.backend.tecdoc.country-groups.title') }}</strong>--}}
{{--                    </div>--}}

{{--                    <div class="col-md-9">--}}
{{--                        @if (count($countryGroups))--}}
{{--                            <select class="form-control" id="countryGroup" name="countryGroup">--}}
{{--                                <option value="">Please select</option>--}}
{{--                                @foreach ($countryGroups as $countryGroup)--}}
{{--                                    @if ($countryGroup->tecdocCode == old('countryGroup'))--}}
{{--                                        <option value="{{ $countryGroup->tecdocCode }}" selected>{{ $countryGroup->tecdocCode }} - {{ $countryGroup->countryName }}</option>--}}
{{--                                    @else--}}
{{--                                        <option value="{{ $countryGroup->tecdocCode }}">{{ $countryGroup->tecdocCode }} - {{ $countryGroup->countryName }}</option>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        @else--}}
{{--                            <small class="d-block">нет вариантов для групп стран</small>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}

    <div class="card card-accent-info">
        <div class="card-header">
            <h4 class="d-inline-block">{{ trans('labels.backend.models.list') }}</h4>
        </div>

        <div class="card-body">
            <table id="tecdoc-models-table" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>slug</th>
                    <th>manuId</th>
                    <th>modelId</th>
                    <th>modelname</th>
                    <th>yearOfConstrFrom</th>
                    <th>yearOfConstrTo</th>
                    <th>favorFlag</th>
                    <th>isPopular</th>
                    <th>isVisible</th>
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
            $('#tecdoc-models-table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                ajax: {
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    url: '{{ route('backend.ajax.models.get') }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'td_model_series.id'},
                    {data: 'slug', name: 'td_model_series.slug'},
                    {data: 'manuId', name: 'td_model_series.manuId'},
                    {data: 'modelId', name: 'td_model_series.modelId'},
                    {data: 'modelname', name: 'td_model_series.modelname'},
                    {data: 'yearOfConstrFrom', name: 'td_model_series.yearOfConstrFrom'},
                    {data: 'yearOfConstrTo', name: 'td_model_series.yearOfConstrTo'},
                    {data: 'favorFlag', name: 'td_model_series.favorFlag'},
                    {data: 'isPopular', name: 'td_model_series.isPopular'},
                    {data: 'isVisible', name: 'td_model_series.isVisible'},
                    {data: 'vehiclesTotal', name: 'td_model_series.vehiclesTotal'},
                    {data: 'actions', name: 'actions', sortable: false, searchable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@endsection
