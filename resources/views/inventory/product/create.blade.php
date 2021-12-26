<x-app-layout>
    <x-alert />
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <h3 class="card-header bg-primary text-white">Create New Product</h3>
            <div class="card-body ">
                <p class="text-dark"><i><small>Hints :First select Product type and then select Category Name
                            !</small></i></p>
                <form action="{{ route('inventory.products.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <x-select class="col-md-6" :name="__('product_type')" :label="__('Choose Product Type')"
                            :valueType="__('_key')" :data="$productTypes" />
                        {{-- Product type selection section end --}}
                        <x-select class="col-md-6" :name="__('category_id')" :label="__('Choose Cagetory')"
                            :valueType="__('id')" :data="$categories" />
                    </div>
                    <hr>

                    {{-- Category selection section end --}}

                    <div class="row">
                        <x-input-field class="col-md-6" :name="__('name')" :label="__('Product Name')" />
                        <x-input-field class="col-md-6" :name="__('quantity')" :label="__('Product Quantity')"
                            :type="__('number')" />
                    </div>
                    <hr>

                    <div class="row">
                        <x-input-field class="col-md-4" :name="__('unit_price')" :label="__('Unit Price')" :type="__('number')" />
                        <x-input-field class="col-md-4" :name="__('import_price')" :label="__('Total Import Price')" :type="__('number')" />
                        <x-input-field class="col-md-4" :name="__('discount')" :label="__('Discount Per Product')" :type="__('number')" />
                    </div>

                    <x-textarea :name="__('description')" :label="__('Product Description')" />

                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-primary" value="Save Product">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $('#product_type').change(function(event) {
                var currentRoute = "{{ route('inventory.products.create') }}?product_type=" + $(this).val();
                window.location.replace(currentRoute)
            })
        </script>
    @endpush
</x-app-layout>
