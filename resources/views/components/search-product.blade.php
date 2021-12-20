@props(['productTypes','categories'])
<form class="row" method="GET" action="{{ route('inventory.products.index') }}" method="GET">
    <div class="col-md-3 px-0">
        <select id="productType" name="product_type" class="form-control form-control-sm">
            <option value="">Product Type</option>
            @foreach ($productTypes as $productType)
                <option value="{{ $productType->id }}">{{ $productType->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 px-0">
        <select name="category" class="form-control form-control-sm">
            <option value="">Search By Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->_key }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-3 px-0"><input type="search"
        name="search"
        value="{{ request('search') }}"
        class="form-control form-control-sm"
        placeholder="search here"></div>
    <div class="col-3 px-0"><input type="submit" class="btn btn-dark btn-sm" value="search"></div>
</form>
@push('scripts')
<script>

$('#productType').change(function(event){
    var currentRoute = "{{ route('inventory.products.index') }}?product_type="+$(this).val();
    window.location.replace(currentRoute)
})



</script>
@endpush