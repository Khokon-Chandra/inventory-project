@props(['productTypes', 'categories'])
<form class="row" method="GET" action="{{ route('inventory.products.index') }}" method="GET">

    <x-select class="col-md-3 pr-0" :optionLabel="__('Product Type')" :name="__('product_type')" :valueType="__('_key')"
        :data="$productTypes" />

    <x-select class="col-md-3 px-0" :optionLabel="__('Select Category')" :name="__('category')" :valueType="__('_key')"
        :data="$categories" />

    <div class="col-3 px-0"><input type="search" name="search" value="{{ request('search') }}"
            class="form-control " placeholder="search here"></div>
    <div class="col-3 px-0"><input type="submit" class="btn btn-outline-primary " value="search"></div>
</form>

@push('scripts')
    <script>
        $('#product_type').change(function(event) {
            var currentRoute = "{{ route('inventory.products.index') }}?product_type=" + $(this).val();
            window.location.replace(currentRoute)
        })

        $('#category').change(function(event) {
            var product_type = "{{ request('product_type') ?? false }}";

            var currentRoute = "{{ route('inventory.products.index') }}?product_type=" + product_type +
                "&category=" + $(this).val();
            window.location.replace(currentRoute)
        })
    </script>
@endpush
