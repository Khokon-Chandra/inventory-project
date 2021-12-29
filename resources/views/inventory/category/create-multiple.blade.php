<x-app-layout>
    <x-alert />
    <div class="col-md-8 offset-md-2">
        <div class="card ">
            <h4 class="card-header bg-primary text-white">Create Multiple Product Type:</h4>
            <div class="card-body">
                <form  id="insertMultiple" action="{{ route('inventory.categories.multiple.store') }}" method="POST">
                    <div class="text-center card p-3">
                        <x-select id="productType" :name="__('product_type')" :label="__('Select Product Type')"
                        :valueType="__('id')" :data="$productTypes" />
                    </div>
                    <table class="table">
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
                                <td><span id="addRow" style="border-radius: 50%; border:1px solid rgba(44, 44, 44, 0.867); padding:4px;background:#cfd3e3"><i class="fa fa-plus"></i></span></td>
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
    <script>const data = { name: [], description: [] };</script>
</x-app-layout>
