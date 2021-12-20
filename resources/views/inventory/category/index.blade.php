<x-app-layout>
    <h3>Product Type:</h3>
    <x-alert />
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">

               <x-search-category :productTypes="$productTypes" />

                <div class="d-flex">
                    <a class="btn btn-success mx-1" href="{{ route('inventory.categories.create') }}">Add New</a>
                    <a class="btn btn-danger mx-1" href="">Delete</a>
                </div>

            </div>
            <table class="table">
                <thead>
                    <tr class="bg-dark text-white">
                        <th>SN</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th class="text-center">Action <input type="checkbox"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ Str::substr($category->description, 0, 30) }}</td>
                        <td>{{ $category->created_at->format('d-m-Y') }}</td>
                        <td class="text-center">
                            <x-edit-action :action="route('inventory.categories.edit', $category->_key)" />
                            <x-delete-action :action="route('inventory.categories.destroy', $category->_key)" />
                                <input type="checkbox" class="mx-2">
                        </td>

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
