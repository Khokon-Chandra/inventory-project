<x-app-layout>
    <h3>Product Type:</h3>
    <x-alert />
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <x-search-product-type />
                <div class="d-flex">
                    <a href="{{ route('inventory.product_types.multiple.create') }}" class="btn btn-primary "><i class="fas fa-plus"></i> New Type</a>
                    <button id="delete" class="btn btn-danger btn-sm mx-1" value="{{ route('inventory.product_types.deleteMultiple') }}">Delete</button>
                </div>
            </div>
            <table class="table table-sm table-striped">

            </table>
        </div>
    </div>
@push('scripts')
    <script>
        const api_url  = "{{ route('product_types.index') }}";
        const thead = [
            {data:'sn', fieldName:'SN'},
            {data:'name',fieldName:'Product type'},
            {data:'description',fieldName:'Description', len:30},
            {data:'created_at',fieldName:'Date'}
        ];
    </script>
    <script src="{{ asset('js/table.js') }}"></script>
@endpush
</x-app-layout>
