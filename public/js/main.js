

$(document).ready(function () {

    /**
     *
     * @returns load category
     */
    $('#product_type').change(function (event) {

        axios.post(categoryUrl, { _key: $(this).val() })
            .then((response) => {
                const category = document.querySelector('#category');
              category.innerHTML = `<label for="selectCategory">Select category</label>
              <select id="selectCategory" class="selectpicker form-control"  data-live-search="true">
              <option value="">select an item</option>
              ${response.data.map(function (category) {
                    return `<option value='${category.id}'>${category.name}</option>`;
                }).join('')}</select>`
                $('.selectpicker').selectpicker('refresh');

            })
            .catch((error) => {
                toastr.error('something went wrong! Please try again');
            })
    })

    /**
     * select all checkbox by single button
     */
    // $('#delete').attr('disabled',true);

    const isSelected = () => {
        $.each($('tbody').find($(':checkbox')), function (index, value) {
            if ($(value).prop('checked')) {
                return true;
            }
        });
        return false;
    }


    $('#selectAll').click(function () {
        var checkboxs = $(this).parents('.table').find($(':checkbox'));
        if ($(this).is(':checked')) {
            $.each(checkboxs, function (index, value) {
                if ($(value).val() !== 'false') {
                    if ($(value).prop('checked') == false && $(value).val()) {
                        $(value).prop('checked', true);
                    }
                }
            })
        } else {
            $.each(checkboxs, function (index, value) {
                if ($(value).val() !== 'false') {
                    $(value).prop('checked', false);
                }
            })
        }
    })
    /**
     * checkbox selector end here.....
     */

    /**
     * Multiple delete action goes here......
     */

    $('#delete').click(function (event) {
        let url = this.value;
        let checkboxs = $('tbody').find($(':checkbox'));
        var keys = [];
        $.each(checkboxs, function (index, value) {
            if ($(value).prop('checked')) {
                keys[index] = $(value).val();
            }
        });

        if (keys.length > 0) {
            axios.post(url, { data: keys })
                .then((response) => {
                    if (response.status == 200) {
                        toastr.success('Successfully Deleted !!');
                        location.reload();
                        console.log(response.data);
                    }
                }).catch((error) => {
                    toastr.error('Deletation faild,Please try again');
                });
        }
    });



    /**
     * Insert multiple data
     */

    $('#addRow').click(function () {
        let row = `<tr>
            <td><input type="text" class="form-control" name="name"></td>
            <td><input type="text" class="form-control" name="description"></td>
            <td class="text-center trash"><i class="fa fa-trash"></i></td>
        </tr>`;
        document.querySelector('tbody').insertAdjacentHTML("beforeend", row);
    })
    /**
     * remove form row
     */
    $(document).on("click", ".trash", function () {
        $(this).parent().remove();
    });


})

