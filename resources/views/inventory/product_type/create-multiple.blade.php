<x-app-layout>

        <h4 class="mb-3">Create product type:</h4>

        <div class="card ">
            <div class="card-body">
                <form id="insertMultiple" action="{{ route('inventory.product_types.multiple.store') }}" method="POST">
                    <table class="customTable mb-3">
                        <thead>
                            <tr>
                                <th>Product Type</th>
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
        <script src="{{ asset('js/multiple_insert/product_type.js') }}"></script>
    @endpush
</x-app-layout>

