$(function() { 

    $('#datatable').DataTable({
      order: [[0, 'desc']],
      columnDefs: [{
          "targets": 4,
          "orderable": false
      }]
    });

    $(".edit-btn").on('click', function(){
        $("#m_note_id").val($(this).parents('tr').attr('note_id'));
        $("#m_note").val($(this).parents('tr').attr('note'));

        $("#requestModal").modal('show');;
    })

    $(".delete-btn").on('click', function(){
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            var id = $(this).parents('tr').attr('note_id');
            var url = site_url + 'manage/delete_note';
            $.post(url, 
                {
                    id: id
                }, function(resp){
                    location.reload();
            })
          } 
        });
        
    });



    $("#m_form").submit(function(e){
        e.preventDefault();
       
        if (!event.target.checkValidity()) {
            return false;
        }

        submit_modal_form();
    })

});

function submit_modal_form(){
    var url = site_url + 'manage/update_note';

    $.post(url, 
        {
            id: $("#m_note_id").val(),
            note: $("#m_note").val()
        }, function(resp){
            location.reload();
    })
}

