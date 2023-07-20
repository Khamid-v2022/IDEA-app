$(function() { 
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

    let data = {
            post_id: $(form_el).find(".each-post-id").val(),
            content: $(form_el).find(".comment_input").val()
        };


    var url = site_url + 'post/submit_comment';

    $.post(url, data, function(resp){
            resp = JSON.parse(resp);
            if(resp.status){
                // Increase the comment number
                const count_El =  $(form_el).parents(".idea-item").find(".comment-count");
                let comment_count = parseInt(count_El.html()) + 1;
                count_El.html(comment_count);

                // empty comment field
                $(form_el).find(".comment_input").val("");
            }
            else{
                swal({
                    title: "",
                    text: "Something went wrong. Please try again later",
                    icon: "warning"
                });
            }
    })
}
