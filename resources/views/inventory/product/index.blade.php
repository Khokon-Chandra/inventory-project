<x-app-layout>
    <h3>Product List:</h3>
    <x-alert />
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <x-search-product :productTypes="$productTypes" :categories="$categories" />

                <div class="d-flex">
                    <button id="printThis" class="btn btn-info mx-1">Print</button>
                    <x-add-new-dropdown :label="__('New product')" :single="route('inventory.products.create')"
                        :multiple="route('inventory.products.multiple.create')" />
                    <button id="delete" class="btn btn-danger mx-1"
                        value="{{ route('inventory.products.deleteMultiple') }}">Delete</button>
                </div>
            </div>
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th width="5%">SN</th>
                        <th width="10%">Product Type</th>
                        <th width="10%">Category</th>
                        <th width="10%">Product</th>
                        <th width="30%">Description</th>
                        <th width="10%" class="text-center">Action</th>
                        <th width="5%"><input id="selectAll" type="checkbox" value="false"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <x-sn :iteration="$loop->iteration" />
                            <td>{{ $product->productType->name ?? 'deleted' }}</td>
                            <td>{{ $product->category->name ?? 'deleted' }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ Str::substr($product->description, 0, 35) }}</td>

                            <td class="text-center">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('inventory.products.edit', $product->_key) }}"><i
                                        class="align-middle me-2 far fa-fw fa-edit"></i></a>
                                <button type="button" class="singleTrash btn btn-danger btn-sm"
                                    data-link="{{ route('inventory.products.destroy', $product->_key) }}"><i
                                        class="align-middle me-2 fa fa-trash"></i></button>
                            </td>
                            <td> <input type="checkbox" value="{{ $product->_key }}"></td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="9">No record found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('js/table.js') }}"></script>
    @endpush
    @include('inventory.product.print')
</x-app-layout>


{{-- <nav>
    <ul class="pagination">
    <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
        <span class="page-link" aria-hidden="true">‹</span>
    </li>
    <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
    <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>

    <li class="page-item"><a class="page-link" href="http://127.0.0.1:8000/inventory/products?page=15">15</a>
    </li>
    <li class="page-item">
        <a class="page-link" href="http://127.0.0.1:8000/inventory/products?page=2" rel="next"
            aria-label="Next »">›</a>
    </li>
</nav> --}}
