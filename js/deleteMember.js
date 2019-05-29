$(".delete").on('click', function(){
    $memberId = $(this).parent(".familyMember").attr("data-id");

    $.ajax({
        method: "POST",
        url: "ajax/deleteMember.php",
        data: {
            memberId: $memberId
        },
        datatype: "json"
    })
    .done(function(res){
        res = JSON.parse(res);
        if(res.status == "Success"){
            //Family Member deleted
            $(`[data-id=${$memberId}]`).remove();
        }else{
            console.log(res);
        }
    })
})