<x-app-layout>
<<<<<<< HEAD

    <div class="mb-3 d-flex justify-content-between">
        <h3>Create New Category:</h3>
        <a href="{{ route('inventory.categories.index') }}" class="btn btn-dark d-block">Go To List</a>
    </div>
=======
>>>>>>> f140de1b3a4eec932e5cd3cabe651c7ba1f554c2
    <x-alert />
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <h3 class="card-header bg-primary text-white">Create new category:</h3>
            <div class="card-body">
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

                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-primary" value="Save Category">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
