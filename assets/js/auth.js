$(function() { 
    $("#signup_form").submit(function(e){
        e.preventDefault();
       
        if (!e.target.checkValidity()) {
            return false;
        }

        signup();
    })

    $("#signin_form").submit(function(e){
        e.preventDefault();
       
        if (!event.target.checkValidity()) {
            return false;
        }

        signin();
    })

    $("#m_reset_pass_form").submit(function(e){
        e.preventDefault();
        if (!event.target.checkValidity()) {
            return false;
        }
        reset_password_submit();
    })
});

function signup(){
    var url = site_url + 'auth/signup';

    $.post(url, 
        {
            full_name: $("#full_name").val(),
            email: $("#email").val(),
            password: $("#password").val()
        }, function(resp){
            if(resp == 'exist'){
                swal({
                    title: "",
                    text: "This account alredy registred",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                });
            }
            else if(resp == 'yes'){
                swal({
                    title: "",
                    text: "Registered!",
                    icon: "success",
                    buttons: true,
                }).then(function(){
                    location.href= site_url + 'sign_in';
                });
            }
            else{
                swal({
                    title: "",
                    text: "Something went wrong. Please try again later",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                });
            }
    })
}

function signin(){
    var url = site_url + 'auth/signin';

    $.post(url, 
        {
            email: $("#email").val(),
            password: $("#password").val()
        }, function(resp){
            if(resp == 'yes')
                window.location.href = site_url;
            else{
                swal({
                    title: "",
                    text: "You entered incorrect credentials.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                });
            }
    })
}

function reset_password_submit(){

    $("#reset_password").html("Please wait...");
    $("#reset_password").attr("disabled", true);
    var url = site_url + 'login/reset_password';
    $.post(url, 
        {
            admin_id: $("#m_email").val()
        }, function(resp){
            $("#reset_password").html("Update");
            $("#reset_password").removeAttr("disabled");
            if(resp == 'yes'){
                alert('Please check your email address');
            }
            else{
                alert("You do not Admin");
            }
            $("#requestModal").modal('toggle');
    })
}