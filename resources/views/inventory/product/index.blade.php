<x-app-layout>
    <h3>Product Type:</h3>
    <x-alert />
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">

               <x-search-product :productTypes="$productTypes" :categories="$categories" />

                <div class="d-flex">
                    <a class="btn btn-success btn-sm mx-1" href="{{ route('inventory.product_types.create') }}">Add New</a>
                    <a class="btn btn-danger btn-sm mx-1" href="">Delete</a>
                </div>

            </div>
            <table class="table">
                <thead>
                    <tr class="bg-dark text-light">
                        <th>SN</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th class="text-center">Action <input type="checkbox"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ Str::substr($product->description, 0, 30) }}</td>
                            <td>{{ $product->created_at->format('d-m-Y') }}</td>
                            <td class="text-center">
                                <x-edit-action :action="route('inventory.products.edit', $product->_key)" />
                                <x-delete-action :action="route('inventory.products.destroy', $product->_key)" />
                                    <input type="checkbox" class="mx-2">
                            </td>
                        </tr>
                        @empty
                        <tr><td class="text-center" colspan="5">No record found</td></tr>
                    @endforelse
                </tbody>
            </table>

            {{ $products->links() }}

        </div>
    </div>
</x-app-layout>
