<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/print.min.css') }}">

    @endpush
    <h3>Product List:</h3>
    <x-alert />
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">

                <x-search-product :productTypes="$productTypes" :categories="$categories" />

                <div class="d-flex">
                    <x-add-new-dropdown :label="__('New product')" :single="route('inventory.products.create')"
                        :multiple="route('inventory.products.multiple.create')" />
                    <button id="delete" class="btn btn-danger btn-sm mx-1"
                        value="{{ route('inventory.products.deleteMultiple') }}">Delete</button>
                </div>

            </div>
            <table id="print" class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th width="5%">SN</th>
                        <th with="10%">Category</th>
                        <th width="20%">Product Name</th>
                        <th width="40%">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <x-sn :iteration="$loop->iteration" />
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ Str::substr($product->description, 0, 35) }}</td>
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
        <script src="{{ asset('js/printThis.js') }}"></script>
        <script>
            $(function() {
                if ($('#print').length) {
                    $('#print').printThis();
                    setTimeout(function() {
                        $('#print').remove();
                        window.location = '/inventory/products';
                    }, 900);
                }
            });
        </script>
    @endpush

</x-app-layout>
