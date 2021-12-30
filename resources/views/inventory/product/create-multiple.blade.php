<x-app-layout>
    <x-alert />
    <div class="col-md-8 offset-md-2">
        <div class="card ">
            <h4 class="card-header bg-primary text-white">Create Multiple Product:</h4>
            <div class="card-body">
                <form id="insertMultiple" action="{{ route('inventory.products.multiple.store') }}" method="POST">
                    <div class="mb-3 row">
                        <x-select class="col-md-6" :name="__('product_type')" :label="__('Select Product Type')"
                            :valueType="__('_key')" :data="$productTypes" />
                        <div id="category" class="col-md-6"></div>
                    </div>
                    <table class="customTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" class="form-control" name="name"></td>
                                <td><input type="text" class="form-control" name="description"></td>
                                <td class="text-center"><span id="addRow"
                                        style="border-radius: 50%; border:1px solid rgba(44, 44, 44, 0.867); padding:4px;background:#cfd3e3"><i
                                            class="fa fa-plus"></i></span></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const data = {
                name: [],
                description: []
            }
        </script>
        <script src="{{ asset('js/multiple_insert/product.js') }}"></script>
    @endpush
</x-app-layout>

