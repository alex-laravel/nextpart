<table class="table table-striped table-hover">
    <tr>
        <th>{{ trans('labels.backend.price_schemes.tabs.content.overview.id') }}</th>
        <td>{{ $priceScheme->id }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.price_schemes.tabs.content.overview.price_from') }}</th>
        <td>{{ $priceScheme->price_from }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.price_schemes.tabs.content.overview.price_to') }}</th>
        <td>{{ $priceScheme->price_to }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.price_schemes.tabs.content.overview.percentage') }}</th>
        <td>{{ $priceScheme->percentage }}%</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.price_schemes.tabs.content.overview.created_at') }}</th>
        <td>{{ $priceScheme->created_at }} ({{ $priceScheme->created_at->diffForHumans() }})</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.price_schemes.tabs.content.overview.updated_at') }}</th>
        <td>{{ $priceScheme->updated_at }} ({{ $priceScheme->updated_at->diffForHumans() }})</td>
    </tr>
</table>
