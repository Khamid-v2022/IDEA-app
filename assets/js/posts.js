$(function() { 

    // New Post page submit post 
    $("#new_post_form").submit(function(e){
        e.preventDefault();
       
        if (!e.target.checkValidity()) {
            return false;
        }
        submit_post();
    })


    /*
    *   Show Post page actions START
    */ 
    // Show Post page Reply button click
    $(".comment-reply-btn").on("click", function(){
        $(this).parents(".comment-item").find(".each-comment-box").removeClass("d-none")
    })

    $(".reply-cancel-btn").on("click", function(){
        $(this).parents(".each-comment-box").addClass("d-none");
    })

    $("#submit_comment_form").submit(function(e){
        e.preventDefault();
       
        if (!e.target.checkValidity()) {
            return false;
        }
        submit_comment(this);
    })

    $(".each-comment-form").submit(function(e){
        e.preventDefault();
       
        if (!e.target.checkValidity()) {
            return false;
        }

        submit_comment(this);
    })

    

    /*
    *   Show Post page actions END
    */ 

});

function submit_post(){
    var url = site_url + 'post/submit_post';

    $.post(url, 
        {
            my_job_id: $("#my_job").val(),
            looking_job_id: $("#looking_job").val(),
            title: $("#post_title").val(),
            detail: $("#post_detail").val(),
            purpose: $("#purpose").val()
        }, function(resp){
            resp = JSON.parse(resp);
            if(resp.status)
                location.href= site_url;
            else{
                swal({
                    title: "",
                    text: "Something went wrong. Please try again later",
                    icon: "warning"
                });
            }
    })
}


function submit_comment(form_el){

    const parent_comment_id = $(form_el).attr("data-comment_parent_id");
    let data = {
            post_id: $("#post_id").val()
        };
    if(parent_comment_id) {
        data['parent_comment_id'] = parent_comment_id;
        data['content'] = $(form_el).find("textarea").val()
    } else {
        data['content'] = $("#comment_input").val()
    }

    var url = site_url + 'post/submit_comment';

    $.post(url, data, function(resp){
            resp = JSON.parse(resp);
            if(resp.status)
                location.reload();
            else{
                swal({
                    title: "",
                    text: "Something went wrong. Please try again later",
                    icon: "warning"
                });
            }
    })
}


function removeTags(input) {
    // Regular expression to match script and HTML tags
    const tagRegex = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>|<\/?[^>]+(>|$)/gi;

    // Replace script and HTML tags with an empty string
    return input.replace(tagRegex, '');
}