<x-app-layout>
    <h3>Create New Product Type:</h3>
    <div class="mb-3">
        <a href="{{ route('inventory.product_types.index') }}" class="btn btn-success">Go To List</a>
    </div>
    <x-alert />
    <div class="card ">
        <div class="card-body col-md-6 offset-md-3">
            <form action="{{ route('inventory.product_types.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name">Product Type Name</label>
                    <input type="text" id="name" name="name" class="form-control">
                    <x-invalid-feedback attribute="name" />
                </div>
                <div class="mb-3">
                    <label for="description">Product Type Description</label>
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
