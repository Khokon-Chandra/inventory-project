@props(['productTypes'])
<form class="row" method="GET" action="{{ route('inventory.categories.index') }}">
    <div class="col-md-4">
        <select name="product_type" class="form-control">
            <option value="">Search by Product Type</option>
            @foreach ($productTypes as $productType)
                <option value="{{ $productType->_key }}">{{ $productType->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-4"><input type="search"
        name="search"
        value="{{ request('search') }}"
        class="form-control"
        placeholder="search here"></div>
    <div class="col-4 px-0"><input type="submit" class="btn btn-dark" value="search"></div>
</form>
