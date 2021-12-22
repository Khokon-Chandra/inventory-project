<x-app-layout>
    <h3>Create New Category:</h3>
    <div class="mb-3">
        <a href="{{ route('inventory.categories.index') }}" class="btn btn-dark">Go To List</a>
    </div>
    <x-alert />
    <div class="card">
        <div class="card-body col-md-6 offset-md-3">
            <form action="{{ route('inventory.categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">

                    <label for="product_type_id">Product Type</label>
                    <select name="product_type_id" id="product_type_id" class="form-control @error('product_type_id') is-invalid @enderror">
                        <option value="">Select Product Type</option>
                        @forelse ($productTypes as $productType)
                            <option value="{{ $productType->id }}">{{ $productType->name }}</option>
                        @empty
                            <option value="">Create New product Type</option>
                        @endforelse
                    </select>

                    <x-invalid-feedback attribute="product_type_id" />
                </div>

                <x-input-field :name="__('name')" :label="__('Category Name')" />

                <x-textarea :name="__('description')" :label="__('Category Description')" />

                <div class="mb-3 text-right">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
