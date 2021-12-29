@props(['productTypes'])
<form class="row" method="GET" action="{{ route('inventory.categories.index') }}">

    <x-select class="col-md-4 pr-0" :optionLabel="__('Product Type')" :name="__('product_type')" :valueType="__('_key')"
    :data="$productTypes" />

    <div class="col-4 px-0"><input type="search"
        name="search"
        value="{{ request('search') }}"
        class="form-control"
        placeholder="search here"></div>
    <div class="col-4 px-0">
        <input type="submit" value="search" class="btn btn-outline-primary">
    </div>
</form>

@push('scripts')
    <script>
        $('#product_type').change(function(event) {
            var currentRoute = "{{ route('inventory.categories.index') }}?product_type=" + $(this).val();
            window.location.replace(currentRoute)
        })
    </script>
@endpush
