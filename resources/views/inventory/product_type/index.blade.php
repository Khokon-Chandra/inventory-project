<x-app-layout>
    <h3>Product Type:</h3>
    <x-alert />
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">

               <x-search-product-type />

                <div class="d-flex">
                    <a class="btn btn-success mx-1" href="{{ route('inventory.product_types.create') }}">Add New</a>
                    <a class="btn btn-danger mx-1" href="">Delete</a>
                </div>

            </div>
            <table class="table">
                <thead>
                    <tr class="bg-dark text-white">
                        <th>SN</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th class="text-center">Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productTypes as $productType)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $productType->name }}</td>
                            <td>{{ Str::substr($productType->description, 0, 30) }}</td>
                            <td>{{ $productType->created_at->format('d-m-Y') }}</td>
                            <td class="text-center">
                                <x-edit-action :action="route('inventory.product_types.edit', $productType->_key)" />
                                <x-delete-action :action="route('inventory.product_types.destroy', $productType->_key)" />
                                    <input type="checkbox" class="mx-2">
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $productTypes->links() }}

        </div>
    </div>
</x-app-layout>
