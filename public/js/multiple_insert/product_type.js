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
