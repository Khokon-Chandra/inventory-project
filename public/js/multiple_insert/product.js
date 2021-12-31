/**
    * Insert multiple data
    */


/**
 * insert New row to the table body
 */
$('#addRow').click(function () {
    if ($('#selectCategory').val() === undefined || $('#selectCategory').val() === "") {
        if ($('#selectCategory').val() === "") {
            toastr.warning('Please select Category');
            return false;
        }
        toastr.warning('Please select product type');
        return false;
    }
    const domElement = `<tr>
        <td>${$('#product_type option:selected').text()}</td>
        <td class="category" data-id="${$('#selectCategory').val()}">${$('#selectCategory option:selected').text()}</td>
        <td><input type="text" class="form-control" name="name"></td>
        <td><input type="text" class="form-control" name="description"></td>
        <td class="text-center trash"><i class="btn fa fa-trash"></i></td>
    </tr>`;
    document.querySelector('tbody').insertAdjacentHTML("beforeend", domElement);
})


$('#insertMultiple').submit(function (event) {
    event.preventDefault();
    const formElements = this.elements;
    const data = {
        category_id: [],
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


    const getCategoryId = () => {
        const categoryId = [];
        $.each($('table .category'), function (index, value) {
            categoryId.push($(value).data('id'));
        })
        return categoryId;
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
        formData.category_id = getCategoryId();
        saveData(formData);
    }


});
