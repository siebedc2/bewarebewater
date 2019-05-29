$(".delete").on('click', function(){
    $deviceId = $(this).parent(".device").attr("data-id");

    $.ajax({
        method: "POST",
        url: "ajax/deleteDevice.php",
        data: {
            deviceId: $deviceId
        },
        datatype: "json"
    })
    .done(function(res){
        res = JSON.parse(res);
        if(res.status == "Success"){
            //device deleted
            $(`[data-id=${$deviceId}]`).remove();
        }else{
            console.log(res);
        }
    })
})