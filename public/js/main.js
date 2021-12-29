

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
        let row = ` <tr>
            <td><input type="text class="form-control" name="name"></td>
            <td><input type="text class="form-control" name="description"></td>
            <td class="btn trash"><i class="fa fa-trash"></i></td>
        </tr>`;
        document.querySelector('tbody').insertAdjacentHTML("beforeend", row);
    })
    /**
     * remove form row
     */
    $(document).on("click", ".trash", function () {
        $(this).parent().remove();
    });

    /**
     * submit form data
     */


    $('#insertMultiple').submit(function (event) {
        event.preventDefault();
        const data = { name: [], description: [] };
        this.elements.forEach(item => {
            if(item.hasAttribute('name')){
                const attribute = item.getAttribute('name').trim();
                data[attribute].push(item.value);
            }
        });

        axios.post(this.action,data).then((response)=>{
            console.log(response.data);
            if(response.status == 200){
                toastr.success(response.data);
                console.log(response.data);
            }
        }).catch((error)=>{
            console.log(error);
            toastr.error('Something went wrong,Please try again');
        });

    });

})

