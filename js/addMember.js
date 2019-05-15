$(".addBtn").on('click', function(e){
    let memberId = this.dataset.id;
    //console.log(memberId);

    $.ajax({
        method: "POST",
        url: "ajax/addMember.php",
        data: {
            memberId: memberId
        },
        dataType: 'json'
    }).done(function(res) {
        if (res.status == "Success") {
            // Message if it is success
            alert(res.message);            
        }
    });

    e.preventDefault();

})