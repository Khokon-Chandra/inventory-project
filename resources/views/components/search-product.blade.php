@props(['productTypes', 'categories'])
<form class="row" method="GET" action="{{ route('inventory.products.index') }}" method="GET">
    <div class="col-md-3 pr-0">
        <select id="productType" name="product_type" class="form-control ">
            <option value="">Product Type</option>
            @foreach ($productTypes as $productType)
                <option {{ request('product_type') == $productType->_key ? 'selected' : '' }}
                    value="{{ $productType->_key }}">{{ $productType->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 px-0">
        <select id="selectCategory" name="category" class="form-control ">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option {{ request('category') == $category->_key ? 'selected' : '' }} value="{{ $category->_key }}">
                    {{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-3 px-0"><input type="search" name="search" value="{{ request('search') }}"
            class="form-control " placeholder="search here"></div>
    <div class="col-3 px-0"><input type="submit" class="btn btn-outline-primary " value="search"></div>
</form>
@push('scripts')
    <script>
        $('#productType').change(function(event) {
            var currentRoute = "{{ route('inventory.products.index') }}?product_type=" + $(this).val();
            window.location.replace(currentRoute)
        })

        $('#selectCategory').change(function(event) {
            var product_type = "{{ request('product_type') ?? false }}";

            var currentRoute = "{{ route('inventory.products.index') }}?product_type=" + product_type +
                "&category=" + $(this).val();
            window.location.replace(currentRoute)
        })
    </script>
@endpush
