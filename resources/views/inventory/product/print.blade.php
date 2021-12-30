<div class="d-none" id="print">
   <div class="text-center">
       <h3>Product List</h3>
       <hr>
       <h4>Search Criteria :{{ request('search')??'' }}</h4>
   </div>
    <table class="table table-sm table-striped">
        <thead>
            <tr class="bg-dark text-white">
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
                    <td>{{ $product->category->name }}</td>
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
        $('#printThis').click(function() {
            if ($('#print').length) {
                $('#print').removeClass('d-none')
                $('#print').printThis({
                    importCSS: true,
                    loadCSS: "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css",
                    header: "<h1>Look at all of my kitties!</h1>"
                });
                setTimeout(function() {
                    $('#print').addClass('d-none');
                }, 900);
            }
        })
    </script>
@endpush
