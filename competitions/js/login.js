$(document).ready(function() {
    console.log("test");
    $('#login_form').submit(function(e) {
        e.preventDefault();
        console.log("login");
        var data = new FormData(this);
        data.append('action','my_action_login');
        data.append('nonce', myAjax.nonce);
        $.ajax({
            url     : myAjax.ajaxurl,
            type    : 'POST',
            dataType: "json",
            data: data,
            processData: false,
            contentType: false,
            success : function(response) {
                if(response.success) {
                    alert("login successfully");
                    window.location.href = "competitions";
                }
                else {
                    alert("User name or password doesn't match Please try again !");
                }
            }
        });
    });
});
