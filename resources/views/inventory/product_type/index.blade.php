<x-app-layout>
    <h3>Product Type:</h3>
    <x-alert />
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <x-search-product-type />
                <div class="d-flex">
                    <a href="{{ route('inventory.product_types.multiple.create') }}" class="btn btn-primary "><i class="fas fa-plus"></i> New Type</a>
                    <button id="delete" class="btn btn-danger btn-sm mx-1" value="{{ route('inventory.product_types.deleteMultiple') }}">Delete</button>
                </div>

            </div>
            <table id="product_types" class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th width="5%">SN</th>
                        <th width="20%">Name</th>
                        <th width="30%">Description</th>
                        <th width="10%">Date</th>
                        <th width="10%" class="text-center">Action </th>
                        <th width="5%"><input id="selectAll"  type="checkbox" value="false"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productTypes as $productType)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $productType->name }}</td>
                            <td>{{ Str::substr($productType->description, 0, 50) }}</td>
                            <td>{{ $productType->created_at->format('d-m-Y') }}</td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-sm" href="{{ route('inventory.product_types.edit',$productType->_key) }}"><i class="align-middle me-2 far fa-fw fa-edit"></i> Edit</a>
                            </td>
                            <td> <input type="checkbox" value="{{ $productType->_key }}"></td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center">No records found</td></tr>
                    @endforelse
                </tbody>
            </table>

            {{-- {{ $productTypes->links() }} --}}

        </div>
    </div>

</x-app-layout>
