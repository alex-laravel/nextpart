<table class="table table-striped table-hover">
    <tr>
        <th>{{ trans('labels.backend.orders.tabs.content.overview.id') }}</th>
        <td>{{ $order->id }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.orders.tabs.content.overview.number') }}</th>
        <td>{{ $order->number }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.orders.tabs.content.overview.cart_quantity') }}</th>
        <td>{{ $order->cart_quantity }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.orders.tabs.content.overview.cart_total') }}</th>
        <td>{{ $order->cart_total }} {{ trans('strings.general.hrn') }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.orders.tabs.content.overview.status') }}</th>
        <td>{!! $order->statusLabel !!}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.orders.tabs.content.overview.delivery_method') }}</th>
        <td>{!! $order->deliveryLabel !!}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.orders.tabs.content.overview.created_at') }}</th>
        <td>{{ $order->created_at }} ({{ $order->created_at->diffForHumans() }})</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.orders.tabs.content.overview.updated_at') }}</th>
        <td>{{ $order->updated_at }} ({{ $order->updated_at->diffForHumans() }})</td>
    </tr>
</table>
