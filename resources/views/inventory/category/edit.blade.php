<x-app-layout>
    <x-alert />
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <h4 class="card-header bg-primary text-white">Edit Category</h4>
            <div class="card-body">
                <form action="{{ route('inventory.categories.update', $category->_key) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="product_type_id">Product Type</label>
                        <select name="product_type_id" id="product_type_id" class="form-control">
                            <option value="">Select Product Type</option>
                            @forelse ($productTypes as $productType)
                                <option {{ $category->product_type_id == $productType->id ? 'selected' : '' }}
                                    value="{{ $productType->id }}">{{ $productType->name }}</option>
                            @empty
                                <option value="">Create New product Type</option>
                            @endforelse
                        </select>
                        <x-invalid-feedback attribute="product_type_id" />
                    </div>

                    <div class="mb-3">
                        <label for="name">Category Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $category->name }}">
                        <x-invalid-feedback attribute="name" />
                    </div>
                    <div class="mb-3">
                        <label for="description">Category Description</label>
                        <textarea name="description" id="description" rows="5"
                            class="form-control">{{ $category->description }}</textarea>
                        <x-invalid-feedback attribute="description" />
                    </div>
                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-primary" value="Update category">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
