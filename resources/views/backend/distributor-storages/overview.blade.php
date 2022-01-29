<table class="table table-striped table-hover">
    <tr>
        <th>{{ trans('labels.backend.distributor-storages.tabs.content.overview.id') }}</th>
        <td>{{ $distributorStorage->id }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.distributor-storages.tabs.content.overview.distributor') }}</th>
        <td>{{ $distributorStorage->distributor ? $distributorStorage->distributor->title : '' }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.distributor-storages.tabs.content.overview.title') }}</th>
        <td>{{ $distributorStorage->title }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.distributor-storages.tabs.content.overview.description') }}</th>
        <td>{{ $distributorStorage->description }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.distributor-storages.tabs.content.overview.delivery_days') }}</th>
        <td>{{ $distributorStorage->delivery_days > 0 ? $distributorStorage->delivery_days : 0 }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.distributor-storages.tabs.content.overview.import_sequence_number') }}</th>
        <td>{{ $distributorStorage->import_sequence_number > 0 ? $distributorStorage->import_sequence_number : 0 }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.distributor-storages.tabs.content.overview.created_at') }}</th>
        <td>{{ $distributorStorage->created_at }} ({{ $distributorStorage->created_at->diffForHumans() }})</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.distributor-storages.tabs.content.overview.updated_at') }}</th>
        <td>{{ $distributorStorage->updated_at }} ({{ $distributorStorage->updated_at->diffForHumans() }})</td>
    </tr>
</table>
