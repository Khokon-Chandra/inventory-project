<x-app-layout>
    <h3>Create New Product:</h3>
    <div class="mb-3">
        <a href="{{ route('inventory.products.index') }}" class="btn btn-dark">Go To List</a>
    </div>
    <x-alert />
    <div class="card">

        <div class="card-body col-md-6 offset-md-3">
            <p class="text-dark"><i><small>Hints :First select Product type and then select Category Name !</small></i></p>
            <form action="{{ route('inventory.products.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="productType">Choose Product Type</label>
                    <select id="productType" name="product_type" class="form-control">
                        <option value="">Product Type</option>
                        @foreach ($productTypes as $productType)
                            <option value="{{ $productType->_key }}">{{ $productType->name }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- Product type selection section end --}}

                <div class="mb-3">
                    <label for="category_id">Choose Category</label>
                    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                        <option value="">Select Category</option>
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                            <option value="">no record found</option>
                        @endforelse
                    </select>
                    <x-invalid-feedback attribute="category_id" />
                </div>
                {{-- Category selection section end --}}

                <x-input-field :name="__('name')" :label="__('Product Name')" />

                <x-textarea :name="__('description')" :label="__('Product Description')" />

                <div class="mb-3 text-right">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
    @push('scripts')
        <script>
            $('#productType').change(function(event) {
                var currentRoute = "{{ route('inventory.products.create') }}?product_type=" + $(this).val();
                window.location.replace(currentRoute)
            })
        </script>
    @endpush
</x-app-layout>
