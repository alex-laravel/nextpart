<table class="table table-striped table-hover">
    <tr>
        <th>ID</th>
        <td>{{ $brandAddress->id }}</td>
    </tr>

    <tr>
        <th>brandId</th>
        <td>{{ $brandAddress->brandId }}</td>
    </tr>

    <tr>
        <th>addressName</th>
        <td>{{ $brandAddress->addressName }}</td>
    </tr>

    <tr>
        <th>addressType</th>
        <td>{{ $brandAddress->addressType }}</td>
    </tr>

    <tr>
        <th>city</th>
        <td>{{ $brandAddress->city }}</td>
    </tr>

    <tr>
        <th>city2</th>
        <td>{{ $brandAddress->city2 }}</td>
    </tr>

    <tr>
        <th>email</th>
        <td>{{ $brandAddress->email }}</td>
    </tr>

    <tr>
        <th>fax</th>
        <td>{{ $brandAddress->fax }}</td>
    </tr>

    <tr>
        <th>mailbox</th>
        <td>{{ $brandAddress->mailbox }}</td>
    </tr>

    <tr>
        <th>name</th>
        <td>{{ $brandAddress->name }}</td>
    </tr>

    <tr>
        <th>name2</th>
        <td>{{ $brandAddress->name2 }}</td>
    </tr>

    <tr>
        <th>phone</th>
        <td>{{ $brandAddress->phone }}</td>
    </tr>

    <tr>
        <th>street</th>
        <td>{{ $brandAddress->street }}</td>
    </tr>

    <tr>
        <th>street2</th>
        <td>{{ $brandAddress->street2 }}</td>
    </tr>

    <tr>
        <th>wwwURL</th>
        <td>{{ $brandAddress->wwwURL }}</td>
    </tr>

    <tr>
        <th>zip</th>
        <td>{{ $brandAddress->zip }}</td>
    </tr>

    <tr>
        <th>zipCountryCode</th>
        <td>{{ $brandAddress->zipCountryCode }}</td>
    </tr>

    <tr>
        <th>zipMailbox</th>
        <td>{{ $brandAddress->zipMailbox }}</td>
    </tr>

    <tr>
        <th>zipSpecial</th>
        <td>{{ $brandAddress->zipSpecial }}</td>
    </tr>

    <tr>
        <th>logoDocId</th>
        <td>{{ $brandAddress->logoDocId }}</td>
    </tr>

    <tr>
        <th>Logo</th>
        <td>
            @if($brand->brandLogoName)
                <img src="{{ asset('assets/brands/' . $brand->brandLogoName) }}" width="200">
            @else
                <img src="{{ asset('assets/brands/brand-default.jpg') }}" width="200">
            @endif
        </td>
    </tr>
</table>
