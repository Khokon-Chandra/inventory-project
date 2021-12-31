/**
 * insert New row to the table body
 */

$(document).ready(function () {
    $('#addRow').click(function () {

        const domElement = `<tr>
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

        const checkEmpty = (data)=>{
            for(let field in data){
                console.log(field);
                if(field.length === 0){
                    return false;
                }
            }
        }

        const saveData = (formData) => {
           if( checkEmpty(formData)!==false){
                axios.post(this.action, data).then((response) => {
                    if (response.status == 200) {
                        toastr.success(response.data);
                    }
                }).catch((error) => {
                    console.log(error);
                    toastr.error('Something went wrong,Please try again');
                });
           }

        }

        if (isFormValidated(formElements, data)) {
            const formData = getFormValue(formElements, data);
            saveData(formData);
        }


    });

});
