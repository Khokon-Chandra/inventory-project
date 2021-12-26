<x-app-layout>
    <x-alert />
    <div class="col-md-6 offset-md-3">
        <div class="card ">
            <h4 class="card-header bg-primary text-white">Create New Product Type:</h4>
            <div class="card-body">
                <form action="{{ route('inventory.product_types.store') }}" method="POST">
                    @csrf
                    <x-input-field :name="__('name')" :label="__('Product Type Name')" />

                    <x-textarea :name="__('description')" :label="__('Description')" />

                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-primary" value="Save New">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
