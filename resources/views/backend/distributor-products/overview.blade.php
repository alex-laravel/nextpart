<table class="table table-striped table-hover">
    <tr>
        <th>{{ trans('labels.backend.distributor-products.tabs.content.overview.id') }}</th>
        <td>{{ $distributor->id }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.distributor-products.tabs.content.overview.title') }}</th>
        <td>{{ $distributor->title }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.distributor-products.tabs.content.overview.description') }}</th>
        <td>{{ $distributor->description }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.distributor-products.tabs.content.overview.created_at') }}</th>
        <td>{{ $distributor->created_at }} ({{ $distributor->created_at->diffForHumans() }})</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.distributor-products.tabs.content.overview.updated_at') }}</th>
        <td>{{ $distributor->updated_at }} ({{ $distributor->updated_at->diffForHumans() }})</td>
    </tr>
</table>
