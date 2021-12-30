

function validateField(fields)
{
    fields.forEach(item => {
        if(item.hasAttribute('name')){
            const attribute = item.getAttribute('name').trim();
            if(attribute in data){
                if(item.value === ""){
                    item.classList.add('is-invalid');
                }
            }
        }
    });
}
/**
 * submit form data
 */

$('#insertMultiple').submit(function (event) {
    event.preventDefault();
    validateField(this.elements);
    data['product_type'] = $('#product_type').val()??'';
    console.log(data.product_type);
    if(data.product_type != ''){
        axios.post(this.action,data).then((response)=>{
            if(response.status == 200){
                toastr.success(response.data);
                console.log(response.data);
            }
        }).catch((error)=>{
            console.log(error);
            toastr.error('Something went wrong,Please try again');
        });
    }else{
        toastr.warning('First Select ProductType');
    }

});
