var group = $("#sortable").sortable({
    group: 'serialization',
    delay: 500,
    onDrop: function ($item, container, _super) {
        var data = group.sortable("serialize").get();

        var jsonString = JSON.stringify(data, null, ' ');

        $('#serialize_output2').text(jsonString);
        _super($item, container);
    }
});

// --------------- Sortable section end


$('#saveMenu').click(function () {
    selectedMenu = $('#selectedMenu').text();
    newContent = JSON.parse($('#serialize_output2').text());
    url = $('#url').text();

    axios.patch(url, {
        menuId: selectedMenu,
        content: newContent
    })
        .then(function (response) {
            if (response.status == 200) {
                location.reload();
            }
        })
        .catch(function (error) {
            console.log(error)
        })
});


/*
    Save Menu section end
*/


$(document).ready(function () {
    $('.selectAll').click(function () {
        $(this).parents('.collapse').find('input').each(function () {
            let input = $(this)
            if (input.prop('checked')) {
                input.prop('checked', false)
            } else {
                input.prop('checked', true)
            }
        })

    });


//add to menu sectio start here

    $('.addToMenu').click(function (event) {

        if ($.isNumeric($('#selectedMenu').text())) {
            var ids = [];
            var type = '';
            $(this).parents('.collapse').find('input').each(function (index) {
                let input = $(this)
                if (input.prop('checked') && input.attr('type') == 'checkbox') {
                    ids[index] = input.val()
                    type = input.attr('name');
                }
            });
            var url = $('#url-addtomenu').text();
            var data = {
                menu: $('#selectedMenu').text(),
                type: type,
                data: ids,
            }
            axios.post(url, data)
                .then(function (response) {
                    if (response.status == 200) {
                        location.reload();
                    }
                })
                .catch(function (error) {
                    console.log(error)
                })
        } else {
            alert('Select a Menu on the top selection')
        }

    })
})


$('#addCustomMenu').click(function(event){
    $url = $('#url-addtomenu').text()
    $data = {menu : $('#selectedMenu').text(), type:'custom', name:$('#customMenuText').val(), target: $('#customMenuUrl').val()}
    axios.post($url,$data).then((response)=>{
        location.reload();
    }).catch((response)=>{
        console.log(response);
    })
})


$('#deleteMenu').click(function(event){
    event.preventDefault();
    axios.delete($('#url-delete').text(),{'delete':true})
    .then(function(response){
        console.log(response.data)
        location.reload();
    })
    .catch((error)=>{
        console.log(error);
    })
})
