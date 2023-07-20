$(function() { 
    $(".new-project-btn").on("click", function(){
        const url = site_url + 'post/get_jobs';
        $.get(url, function(resp){
            resp = JSON.parse(resp);
            const jobs = resp.msg.jobs;
            let html = "";

            jobs.forEach((job) => {
                html += "<option value='" + job.id + "'>" + job.job_name + "</option>";
            })

            $("#m_my_job").html(html);
            $("#m_looking_job").html(html);
            $("#new_project_modal").modal('toggle');
        }) 
    })


    // New Post page submit post 
    $("#m_new_post_form").submit(function(e){
        e.preventDefault();
       
        if (!e.target.checkValidity()) {
            return false;
        }
        submit_post();
    })
});

function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0]=parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}

function submit_post(){
    var url = site_url + 'post/submit_post';

    $.post(url, 
        {
            my_job_id: $("#m_my_job").val(),
            looking_job_id: $("#m_looking_job").val(),
            title: $("#m_post_title").val(),
            detail: $("#m_post_detail").val()
        }, function(resp){
            resp = JSON.parse(resp);
            if(resp.status)
                location.href= site_url + 'welcome/my_project';
            else{
                swal({
                    title: "",
                    text: "Something went wrong. Please try again later",
                    icon: "warning"
                });
            }
    })
}