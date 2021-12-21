<x-app-layout>
    <h3>Product Type:</h3>
    <x-alert />
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">

               <x-search-product-type />

                <div class="d-flex">
                    <a class="btn btn-primary mx-1" href="{{ route('inventory.product_types.create') }}">Add New</a>
                    <button id="delete" class="btn btn-danger mx-1" value="{{ route('inventory.product_types.deleteMultiple') }}">Delete</button>
                </div>

            </div>
            <table class="table table-sm table-striped">
                <thead>
                    <tr class="bg-dark text-white">
                        <th width="5%">SN</th>
                        <th width="20%">Name</th>
                        <th width="30%">Description</th>
                        <th width="10%">Date</th>
                        <th width="10%" class="text-center">Action </th>
                        <th width="5%"><input id="selectAll"  type="checkbox" value="false"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productTypes as $productType)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $productType->name }}</td>
                            <td>{{ Str::substr($productType->description, 0, 50) }}</td>
                            <td>{{ $productType->created_at->format('d-m-Y') }}</td>
                            <td class="text-center">
                                <x-edit-action :action="route('inventory.product_types.edit', $productType->_key)" />
                                <x-delete-action :action="route('inventory.product_types.destroy', $productType->_key)" />
                            </td>
                            <td> <input type="checkbox" value="{{ $productType->_key }}"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $productTypes->links() }}

        </div>
    </div>
</x-app-layout>
