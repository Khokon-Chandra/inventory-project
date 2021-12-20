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
                    <select name="product_type_id" id="product_type_id" class="form-control">
                        <option value="">Select Product Type</option>
                        @forelse ($productTypes as $productType)
                            <option value="{{ $productType->id }}">{{ $productType->name }}</option>
                        @empty
                            <option value="">Create New product Type</option>
                        @endforelse
                    </select>
                    <x-invalid-feedback attribute="product_type_id" />
                </div>

                <div class="mb-3">
                    <label for="name">Category Name</label>
                    <input type="text" id="name" name="name" class="form-control">
                    <x-invalid-feedback attribute="name" />
                </div>
                <div class="mb-3">
                    <label for="description">Category Description</label>
                    <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                    <x-invalid-feedback attribute="description" />
                </div>
                <div class="mb-3 text-right">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
