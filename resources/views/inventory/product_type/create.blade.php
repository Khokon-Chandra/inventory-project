<x-app-layout>
    <h3>Create New Product Type:</h3>
    <div class="mb-3">
        <a href="{{ route('inventory.product_types.index') }}" class="btn btn-dark">Go To List</a>
    </div>
    <x-alert />
    <div class="card ">
        <div class="card-body col-md-6 offset-md-3">
            <form action="{{ route('inventory.product_types.store') }}" method="POST">
                @csrf
                <x-input-field :name="__('name')" :label="__('Product Type Name')" />

                <x-textarea :name="__('description')" :label="__('Description')" />

                <div class="mb-3 text-right">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
