<x-app-layout>
    <h3>Product List:</h3>
    <x-alert />
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">

               <x-search-product :productTypes="$productTypes" :categories="$categories" />

                <div class="d-flex">
                    <a class="btn btn-success btn-sm" href="{{ route('inventory.products.create') }}">Add New</a>
                    <button id="delete" class="btn btn-danger btn-sm mx-1" value="{{ route('inventory.products.deleteMultiple') }}">Delete</button>
                </div>

            </div>
            <table class="table table-sm table-striped">
                <thead>
                    <tr class="bg-dark text-light">
                        <th width="5%">SN</th>
                        <th width="20%">Name</th>
                        <th width="30%">Description</th>
                        <th width="10%">Date</th>
                        <th width="10%" class="text-center">Action</th>
                        <th width="5%"><input id="selectAll"  type="checkbox" value="false"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <x-sn :iteration="$loop->iteration" />
                            <td>{{ $product->name }}</td>
                            <td>{{ Str::substr($product->description, 0, 30) }}</td>
                            <td>{{ $product->created_at->format('d-m-Y') }}</td>
                            <td class="text-center">
                                <x-edit-action :action="route('inventory.products.edit', $product->_key)" />
                                <x-delete-action :action="route('inventory.products.destroy', $product->_key)" />
                            </td>
                            <td> <input type="checkbox" value="{{ $product->_key }}"></td>
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
