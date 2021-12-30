<div class="d-none" id="print">
    <div class="text-center">
        <h3>Product List</h3>
        <hr>
    </div>
    <table class="customTable" border="1">
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
                    debug: false, // show the iframe for debugging
                    importCSS: true, // import parent page css
                    importStyle: false, // import style tags
                    printContainer: true, // print outer container/$.selector
                    loadCSS: "", // path to additional css file - use an array [] for multiple
                    pageTitle: "", // add title to print page
                    removeInline: true, // remove inline styles from print elements
                    removeInlineSelector: "*", // custom selectors to filter inline styles. removeInline must be true
                    printDelay: 333, // variable print delay

                    doctypeString: '...', // enter a different doctype for older markup
                    removeScripts: false, // remove script tags from print content
                    copyTagClasses: false, // copy classes from the html & body tag
                    beforePrintEvent: null, // function for printEvent in iframe
                    beforePrint: 'before print', // function called before iframe is filled
                    afterPrint: null // function called before iframe is removed
                });
                setTimeout(function() {
                    $('#print').addClass('d-none');
                }, 900);
            }
        })
    </script>
@endpush
