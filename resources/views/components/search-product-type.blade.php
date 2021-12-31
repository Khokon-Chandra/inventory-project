<form class="row" method="GET" action="{{ route('inventory.product_types.index') }}">
    <div class="col-8"><input type="search"
        name="search"
        value="{{ request('search') }}"
        class="form-control"
        placeholder="search here"></div>
    <div class="col-4 px-0"><input type="submit" class="btn btn-outline-primary" value="search"></div>
</form>
