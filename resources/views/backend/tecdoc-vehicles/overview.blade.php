<table class="table table-striped table-hover">
    <tr>
        <th>ID</th>
        <td>{{ $vehicleDetails->id }}</td>
    </tr>

    <tr>
        <th>carId</th>
        <td>{{ $vehicleDetails->carId }}</td>
    </tr>

    <tr>
        <th>ccmTech</th>
        <td>{{ $vehicleDetails->ccmTech }}</td>
    </tr>

    <tr>
        <th>constructionType</th>
        <td>{{ $vehicleDetails->constructionType }}</td>
    </tr>

    <tr>
        <th>cylinder</th>
        <td>{{ $vehicleDetails->cylinder }}</td>
    </tr>

    <tr>
        <th>cylinderCapacityCcm</th>
        <td>{{ $vehicleDetails->cylinderCapacityCcm }}</td>
    </tr>

    <tr>
        <th>cylinderCapacityLiter</th>
        <td>{{ $vehicleDetails->cylinderCapacityLiter }}</td>
    </tr>

    <tr>
        <th>fuelType</th>
        <td>{{ $vehicleDetails->fuelType }}</td>
    </tr>

    <tr>
        <th>fuelTypeProcess</th>
        <td>{{ $vehicleDetails->fuelTypeProcess }}</td>
    </tr>

    <tr>
        <th>impulsionType</th>
        <td>{{ $vehicleDetails->impulsionType }}</td>
    </tr>

    <tr>
        <th>manuId</th>
        <td>{{ $vehicleDetails->manuId }}</td>
    </tr>

    <tr>
        <th>manuName</th>
        <td>{{ $vehicleDetails->manuName }}</td>
    </tr>

    <tr>
        <th>modId</th>
        <td>{{ $vehicleDetails->modId }}</td>
    </tr>

    <tr>
        <th>modelName</th>
        <td>{{ $vehicleDetails->modelName }}</td>
    </tr>

    <tr>
        <th>motorType</th>
        <td>{{ $vehicleDetails->motorType }}</td>
    </tr>

    <tr>
        <th>powerHpFrom</th>
        <td>{{ $vehicleDetails->powerHpFrom }}</td>
    </tr>

    <tr>
        <th>powerHpTo</th>
        <td>{{ $vehicleDetails->powerHpTo }}</td>
    </tr>

    <tr>
        <th>powerKwFrom</th>
        <td>{{ $vehicleDetails->powerKwFrom }}</td>
    </tr>

    <tr>
        <th>powerKwTo</th>
        <td>{{ $vehicleDetails->powerKwTo }}</td>
    </tr>

    <tr>
        <th>typeName</th>
        <td>{{ $vehicleDetails->typeName }}</td>
    </tr>

    <tr>
        <th>typeNumber</th>
        <td>{{ $vehicleDetails->typeNumber }}</td>
    </tr>

    <tr>
        <th>valves</th>
        <td>{{ $vehicleDetails->valves }}</td>
    </tr>

    <tr>
        <th>yearOfConstrFrom</th>
        <td>{{ $vehicleDetails->yearOfConstrFrom }}</td>
    </tr>

    <tr>
        <th>yearOfConstrTo</th>
        <td>{{ $vehicleDetails->yearOfConstrTo }}</td>
    </tr>

    <tr>
        <th>vehicleDocId</th>
        <td>{{ $vehicleDetails->vehicleDocId }}</td>
    </tr>

    <tr>
        <th>assetThumbnailName</th>
        <td>
            @if($vehicleDetails->assetThumbnailName)
                <img src="{{ asset('assets/vehicles/' . $vehicleDetails->assetThumbnailName) }}" width="200">
            @else
                <img src="{{ asset('assets/vehicles/model-default.jpg') }}" width="200">
            @endif
        </td>
    </tr>

    <tr>
        <th>assetImageName</th>
        <td>
            @if($vehicleDetails->assetImageName)
                <img src="{{ asset('assets/vehicles/' . $vehicleDetails->assetImageName) }}" width="200">
            @else
                <img src="{{ asset('assets/vehicles/model-default.jpg') }}" width="200">
            @endif
        </td>
    </tr>

</table>
