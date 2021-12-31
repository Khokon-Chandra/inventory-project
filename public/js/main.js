
$(document).ready(function () {

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
     $('.singleTrash').click(function(event){
        axios.delete($(this).data('link')).then((response)=>{
            toastr.success('Successfully an item deleted !!');
            $(this).closest('tr').remove();
        }).catch((error)=>{
            toastr.error('Sorry try again!');
        })
    })

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
     * remove form row
     */
    $(document).on("click", ".trash", function () {
        $(this).parent().remove();
    });


})

