<div class="d-none" id="print">
    <div class="text-center">
        <h3>Product List</h3>
        <div class="mb-1" id="searchCriteria"></div>
        <p>printed : {{ now()->format('Y-M-d') }}</p>
    </div>
    <table class="table border" border="1">
        <thead>
            <tr>
                <th width="5%">SN</th>
                <th with="10%">Category</th>
                <th width="20%">Product Name</th>
                <th width="40%">Description</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <x-sn :iteration="$loop->iteration" />
                    <td>{{ $product->category->name??'deleted' }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ Str::substr($product->description, 0, 35) }}</td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="9">No record found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@push('scripts')
    <script src="{{ asset('js/printThis.js') }}"></script>
    <script>
        $(document).ready(function() {
            let category = $('#category').val() !== '' ? $('#category option:selected').text() : "";
            let product_type = $('#product_type').val() !== "" ? $("#product_type option:selected").text() : "";
            let criteria = [product_type, category, "{{ request('search') ?? '' }}"];
            if (criteria.length > 0) {

                $('#searchCriteria').html(`<b>Search criteria:</b>${criteria.join(' ')}`);
            }

            $('#printThis').click(function() {
                if ($('#print').length) {
                    $('#print').removeClass('d-none')
                    $('#print').printThis();
                    setTimeout(function() {
                        $('#print').addClass('d-none');
                    }, 900);
                }
            })
        })
    </script>
@endpush
