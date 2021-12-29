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
