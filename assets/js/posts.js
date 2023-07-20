$(function() { 

    /*
    *   Show Post page actions START
    */ 
    // Show Post page Reply button click
    $(".comment-reply-btn").on("click", function(){
        $(this).parents(".reply-box").find(".each-comment-box").removeClass("d-none")
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
