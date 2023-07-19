$(function() { 


    $("#pray_form").submit(function(e){
        e.preventDefault();
        $(".dpm-response").addClass('d-none');
        $(".dpm-response .alert").addClass('d-none');
        if (!event.target.checkValidity()) {
            return false;
        }
        submit();
    })
   
});

function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0]=parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}

function submit(){
    $(".request-form").addClass('d-none');
    $(".loader").removeClass('d-none');

    $(".dpm-response").removeClass('d-none');

    // var email_verify_url = "https://disposable.debounce.io/?email=" + $("#email").val();
    var email_verify_url = site_url + "welcome/verify_email";
    
    $(".alert-info").removeClass('d-none');
    $.post(email_verify_url, {
        email: $("#email").val()
    }, function(resp){ 
        if(resp == "Valid"){ 
            $(".dpm-response .alert").addClass('d-none');
            $(".dpm-response .alert-success").removeClass('d-none');

            let current_url = window.location;
            let params = (new URL(current_url)).searchParams;
            let tid = params.get('tid');
            
            var url = site_url + 'welcome/submit_pray';
            
            $.post(url, {
                    ip_address: $("#ip_address").val(),
                    email: $("#email").val(),
                    first_name: $("#first_name").val(),
                    note: $("#note").val(),
                    is_publish: $('#display').prop('checked')?"yes":"no",
                    tag: tid
                }, 
                function(resp){
                    // $(".loader").addClass('d-none');
                    // $(".request-form").removeClass('d-none');
                    // if(resp == 'ok'){
                        // window.location.href = "https://angelgraceblessing.com/prayer-thank-you/";
                    // }
                    // else{
                    //     $(".request-form").removeClass('d-none');
                    //     // $('.alert-danger').html("");
                    //     // $(".dpm-response").removeClass('d-none');
                    // }
            })
            window.location.href = "https://angelgraceblessing.com/prayer-thank-you/";
        } else {
            $(".loader").addClass('d-none');
            $(".request-form").removeClass('d-none');
            
            $(".dpm-response .alert").addClass('d-none');
            $(".dpm-response .alert-danger").removeClass('d-none');
        }
    })   
}
