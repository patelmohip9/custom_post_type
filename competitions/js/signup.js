$(document).ready(function() {
    console.log("test");
    $('#signup_form').submit(function(e) {
        e.preventDefault();
        console.log("signup");
        var data = new FormData(this);
        data.append('action','my_action_signup');
        data.append('nonce', myAjax.nonce);
        $.ajax({
            url     : myAjax.ajaxurl,
            data    : data,
            type    : 'POST',
            processData: false,
            contentType: false,
            success : function(response) {
                if(response) {
                    alert("User addesuccessfullyd ");
                    $('#signup_form')[0].reset();
                }
            }
        });
    });
});