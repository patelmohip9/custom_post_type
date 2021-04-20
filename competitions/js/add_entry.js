$(document).ready(function() {
    console.log("test");
    $('#entry').submit(function(e) {
        e.preventDefault();
        console.log("submit");
        var data = new FormData(this);
        console.log(data);
        data.append('action','my_action');
        data.append('nonce', myAjax.nonce);
        $.ajax({
            url     : myAjax.ajaxurl,
            data    : data,
            type    : 'POST',
            processData: false,
            contentType: false,
            success : function(response) {
                if(response) {
                    alert("User added successfully");
                    $('#entry')[0].reset();
                }
            }
        });
    });
});