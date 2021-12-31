$(document).ready(function () {
    /**
 * insert New row to the table body
 */
    $('#addRow').click(function () {

        if ($('#product_type').val() === "") {
            toastr.warning('Please select product type first');
            return false;
        }

        const domElement = `<tr>
    <td class="product_type" data-id="${$('#product_type').val()}">${$('#product_type option:selected').text()}</td>
    <td><input type="text" class="form-control" name="name"></td>
    <td><input type="text" class="form-control" name="description"></td>
    <td class="text-center trash"><i class="btn fa fa-trash"></i></td>
</tr>`;
        document.querySelector('tbody').insertAdjacentHTML("beforeend", domElement);
    });


    $('#insertMultiple').submit(function (event) {
        event.preventDefault();
        const formElements = this.elements;
        const data = {
            name: [],
            description: []
        };

        /**
         * form validation
         * @param {form input field} formElements
         */
        const isFormValidated = (formElements, data) => {
            var status = true;
            formElements.forEach(item => {
                if (item.hasAttribute('name')) {
                    const attribute = item.getAttribute('name').trim();
                    if (attribute in data) {
                        if (item.value === "") {
                            item.classList.add("is-invalid");
                            status = false;
                        }
                    }
                }
            });
            return status;
        }


        const getProductTypeId = () => {
            const productTypeId = [];
            $.each($('table .product_type'), function (index, value) {
                productTypeId.push($(value).data('id'));
            })
            return productTypeId;
        };

        const getFormValue = (formElements, data) => {
            formElements.forEach(item => {
                if (item.hasAttribute('name')) {
                    const attribute = item.getAttribute('name').trim();
                    if (attribute in data) {
                        data[attribute].push(item.value);
                    }
                }
            });
            return data;
        };


        const saveData = (formData) => {
            axios.post(this.action, data).then((response) => {
                if (response.status == 200) {
                    toastr.success(response.data);
                }
            }).catch((error) => {
                console.log(error);
                toastr.error('Something went wrong,Please try again');
            });
        }

        if (isFormValidated(formElements, data)) {
            const formData = getFormValue(formElements, data);
            formData.product_type_id = getProductTypeId();
            saveData(formData);
        }


    });

});
