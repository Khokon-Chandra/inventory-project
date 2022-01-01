
$(document).ready(function () {

    $(".alert-success").fadeTo(5000, 500).slideUp(500, function () {
        $(".alert-success").slideUp(500);
    });
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
     * sngle trash file
     */
    $('.singleTrash').click(function (event) {
        if (confirm("Are you sure to delete it ?")) {
            axios.delete($(this).data('link')).then((response) => {
                toastr.success('Successfully an item deleted !!');
                $(this).closest('tr').remove();
            }).catch((error) => {
                toastr.error('Sorry try again!');
            })
        }
    })

    /**
     * Multiple delete action goes here......
     */

    $('#delete').click(function (event) {
        let url = this.value;
        let checkboxs = $('tbody').find($(':checkbox'));
        let checkedBoxs = [];
        var keys = [];
        $.each(checkboxs, function (index, value) {
            if ($(value).prop('checked')) {
                keys[index] = $(value).val();
                checkedBoxs.push(value.closest('tr'));
            }
        });

        if (keys.length > 0 && confirm('Are you sure to delete?')) {
            $(checkedBoxs).remove();
            axios.post(url, { data: keys })
                .then((response) => {
                    toastr.success('Successfully Deleted !!');
                }).catch((error) => {
                    toastr.error('Deletation faild,Please try again');
                });
        }
    });
    /**
     * remove form row
     */
    $(document).on("click", ".trash", function () {
        $(this).parent().remove();
    });


})

