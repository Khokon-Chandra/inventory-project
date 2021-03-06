<x-app-layout>
    <h3>Product List:</h3>
    <x-alert />
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
               <x-search-product :productTypes="$productTypes" :categories="$categories" />

                <div class="d-flex">
                   <button id="printThis" class="btn btn-info mx-1">Print</button>
                   <x-add-new-dropdown :label="__('New product')" :single="route('inventory.products.create')" :multiple="route('inventory.products.multiple.create')" />
                    <button id="delete" class="btn btn-danger btn-sm mx-1" value="{{ route('inventory.products.deleteMultiple') }}">Delete</button>
                </div>
            </div>
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th width="5%">SN</th>
                        <th with="10%">Category</th>
                        <th width="20%">Product Name</th>
                        <th width="40%">Description</th>
                        <th width="10%" class="text-center">Action</th>
                        <th width="5%"><input id="selectAll"  type="checkbox" value="false"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <x-sn :iteration="$loop->iteration" />
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ Str::substr($product->description, 0, 35) }}</td>

                            <td class="text-center">
                                <a class="btn btn-primary btn-sm" href="{{ route('inventory.products.edit',$product->_key) }}"><i class="align-middle me-2 far fa-fw fa-edit"></i> Edit</a>
                            </td>
                            <td> <input type="checkbox" value="{{ $product->_key }}"></td>
                        </tr>
                        @empty
                        <tr><td class="text-center" colspan="9">No record found</td></tr>
                    @endforelse
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
    @include('inventory.product.print')
</x-app-layout>
