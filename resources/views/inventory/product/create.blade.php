<x-app-layout>
    <h3>Create New Product:</h3>
    <div class="mb-3">
        <a href="{{ route('inventory.products.index') }}" class="btn btn-dark">Go To List</a>
    </div>
    <x-alert />
    <div class="card">
        <div class="card-body col-md-6 offset-md-3">
            <form action="{{ route('inventory.products.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="category_id">Choose Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                            <option value="">No category found</option>
                        @endforelse
                    </select>
                    <x-invalid-feedback attribute="category_id" />
                </div>


                <div class="mb-3">
                    <label for="name">Product Name</label>
                    <input type="text" id="name" name="name" class="form-control">
                    <x-invalid-feedback attribute="name" />
                </div>
                <div class="mb-3">
                    <label for="description">Product Description</label>
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
