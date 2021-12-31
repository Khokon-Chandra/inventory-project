<x-app-layout>
    <x-alert />
    <h4 class="mb-3">Create Multiple Product:</h4>
        <div class="card ">
            <div class="card-body">
                <form id="insertMultiple" action="{{ route('inventory.products.multiple.store') }}" method="POST">
                    <div class="mb-3 d-flex justify-content-between">
                        <x-select  :name="__('product_type')" :label="__('Select Product Type')"
                            :valueType="__('_key')" :data="$productTypes" />
                        <div id="category" class="col-md-6"></div>
                    </div>

                    <table class="customTable mb-3">
                        <thead>
                            <tr>
                                <th>Product Type</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Description</th>
                                <th class="text-center"><span id="addRow"
                                    style="border-radius:50%;color:white; cursor: pointer; padding:4px;background:#383838"><i
                                        class="fa fa-plus"></i></span></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
        </div>
    @push('scripts')
        <script src="{{ asset('js/multiple_insert/product.js') }}"></script>
    @endpush
</x-app-layout>

