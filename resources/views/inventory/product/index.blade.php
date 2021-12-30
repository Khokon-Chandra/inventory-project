<x-app-layout>
    <h3>Product List:</h3>
    <x-alert />
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">

               <x-search-product :productTypes="$productTypes" :categories="$categories" />

                <div class="d-flex">
                   <x-add-new-dropdown :label="__('New product')" :single="route('inventory.products.create')" :multiple="route('inventory.products.multiple.create')" />
                    <button id="delete" class="btn btn-danger btn-sm mx-1" value="{{ route('inventory.products.deleteMultiple') }}">Delete</button>
                </div>

            </div>
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th width="5%">SN</th>
                        <th width="20%">Product Name</th>
                        <th with="10%">Category</th>
                        <th width="10%">Quantity</th>
                        <th width="10%">Unit Price</th>
                        <th width="10%">Import Price</th>
                        <th width="10%">Discount</th>
                        <th width="10%" class="text-center">Action</th>
                        <th width="5%"><input id="selectAll"  type="checkbox" value="false"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <x-sn :iteration="$loop->iteration" />
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>$ {{ $product->unit_price }}</td>
                            <td>$ {{ $product->import_price }}</td>
                            <td>{{ $product->discount }} %</td>
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
</x-app-layout>
