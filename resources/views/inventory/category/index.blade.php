<x-app-layout>
    <h3>Category List:</h3>
    <x-alert />
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">

               <x-search-category :productTypes="$productTypes" />

                <div class="d-flex">
                    <a class="btn btn-primary mx-1" href="{{ route('inventory.categories.create') }}"><i class="fas fa-plus"></i> New category</a>
                    <button id="delete" class="btn btn-danger mx-1" value="{{ route('inventory.categories.deleteMultiple') }}">Delete</button>
                </div>

            </div>
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th width="5%">SN</th>
                        <th>Product Type</th>
                        <th width="20%">Category Name</th>
                        <th width="30%">Description</th>
                        <th width="10%">Date</th>
                        <th width="10%" class="text-center">Action</th>
                        <th width="5%"><input id="selectAll"  type="checkbox" value="false"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <th>{{ $category->productType->name }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ Str::substr($category->description, 0, 30) }}</td>
                        <td>{{ $category->created_at->format('d-m-Y') }}</td>
                        <td class="text-center">
                            <a class="btn btn-primary btn-sm" href="{{ route('inventory.categories.edit', $category->_key) }}"><i class="align-middle me-2 far fa-fw fa-edit"></i> Edit</a>
                        </td>
                        <td> <input type="checkbox" value="{{ $category->_key }}"></td>

                    </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="5">No records found</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

            {{ $categories->links() }}

        </div>
    </div>
</x-app-layout>
