@props(['productTypes', 'categories'])
<form class="row" method="GET" action="{{ route('inventory.products.index') }}" method="GET">

    <x-select class="col-md-3 pr-0" :optionLabel="__('Product Type')" :name="__('product_type')" :valueType="__('_key')"
        :data="$productTypes" />

    <div id="category" class="col-md-3 px-0">
        <select name="" id="" class="selectpicker form-control" data-style="border" data-live-search="true">
            <option value="">Please select category</option>
        </select>
    </div>

    <div class="col-3 px-0"><input type="search" name="search" value="{{ request('search') }}"
            class="form-control " placeholder="search here"></div>
    <div class="col-3 px-0"><input type="submit" class="btn btn-outline-primary " value="search"></div>
</form>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#product_type').change(function(event) {
                axios.post(categoryUrl, {
                        _key: $(this).val()
                    })
                    .then((response) => {
                        const category = document.querySelector('#category');
                        category.innerHTML = `
                        <select id="selectCategory" name="category" class="selectpicker form-control"  data-live-search="true" data-style="border" >
                        <option value="">select Category</option>
                        ${response.data.map(function (category) {
                                return `<option value='${category.id}'>${category.name}</option>`;
                        }).join('')}</select>`
                        $('.selectpicker').selectpicker('refresh');
                    })
                    .catch((error) => {
                        toastr.error('something went wrong! Please try again');
                    })
            })

            // $('#category').change(function(event) {
            //     var product_type = "{{ request('product_type') ?? false }}";

            //     var currentRoute = "{{ route('inventory.products.index') }}?product_type=" +
            //         product_type +
            //         "&category=" + $(this).val();
            //     window.location.replace(currentRoute)
            // })
        })
    </script>
@endpush
