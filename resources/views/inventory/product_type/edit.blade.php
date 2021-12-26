<x-app-layout>

    <x-alert />
   <div class="col-md-6 offset-md-3">
    <div class="card ">
        <h4 class="card-header bg-primary text-white">Edit Product type:</h4>
        <div class="card-body">
            <form action="{{ route('inventory.product_types.update',$productType->_key) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name">Product Type Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $productType->name }}">
                    <x-invalid-feedback attribute="name" />
                </div>
                <div class="mb-3">
                    <label for="description">Product Type Description</label>
                    <textarea name="description" id="description" rows="5" class="form-control">{{ $productType->description }}</textarea>
                    <x-invalid-feedback attribute="description" />
                </div>
                <div class="mb-3 text-center">
                    <input type="submit" class="btn btn-primary" value="Update Product Type">
                </div>
            </form>
        </div>
    </div>
   </div>
</x-app-layout>
