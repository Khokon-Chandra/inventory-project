@props(['productTypes'])
<form class="row" method="GET" action="{{ route('inventory.categories.index') }}">
    <div class="col-md-4 pr-0">
        <select id="productType" name="product_type" class="form-control form-control-sm">
            <option value="">Product Type</option>
            @foreach ($productTypes as $productType)
                <option
                {{ request('product_type') == $productType->_key?'selected':'' }}
                value="{{ $productType->_key }}">{{ $productType->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-4 px-0"><input type="search"
        name="search"
        value="{{ request('search') }}"
        class="form-control form-control-sm"
        placeholder="search here"></div>
    <div class="col-4 px-0">
        <input type="submit" value="search" class="btn btn-dark btn-sm">
    </div>
</form>

@push('scripts')
    <script>
        $('#productType').change(function(event) {
            var currentRoute = "{{ route('inventory.categories.index') }}?product_type=" + $(this).val();
            window.location.replace(currentRoute)
        })
    </script>
@endpush
