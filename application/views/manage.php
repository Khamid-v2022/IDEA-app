<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no'>
  <title>Pray</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="icon" href="<?=base_url()?>assets/img/favicon.ico" sizes="32x32">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script type="text/javascript" src="<?=base_url()?>assets/plugin/js/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- datatable -->
 <link
    rel="stylesheet"
    href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"
  />
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

  <!-- sweet alert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/app.css">
  <script type="text/javascript" src="<?=base_url()?>assets/js/admin.js"></script>
  <script type="text/javascript">
    var site_url = "<?=site_url()?>";
  </script>
</head>
<body>
  <div class="text-end mt-5 me-5">
    <a href="<?=site_url()?>login/logout">Logout</a>
  </div>
  <div class="container mt-4">
      <table
        id="datatable"
        class="table"
      >
        <thead>
          <tr>
            <th>createdAt</th>
            <th>Name</th>
            <th>Email</th>
            <th>Note</th>
            <th>Publish</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            foreach($prayer_list as $item){ ?>
            <tr note_id="<?=$item['id']?>" note="<?=$item['note']?>">
              <td><?=$item['created_at']?></td>
              <td><?=$item['first_name']?></td>
              <td><?=$item['email']?></td>
              <td><?=$item['note']?></td>
               <td>
                  <input type="checkbox" <?=$item['is_publish']=="yes"?"checked":""?> disabled>
              </td>
              <td>
                <a href="#" class="edit-btn" title="Edit">Edit</a>
                <a href="#" class="delete-btn" title="Delete">Delete</a>
              </td>
            </tr>
          <?php  }
          ?>
        </tbody>
      </table>
    </div>



<div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <div class="request-form ">
                <form method="post" id="m_form">
                    <input type="hidden" id="m_note_id">
                    <textarea class="form-control" placeholder="PRAYER REQUEST" id="m_note" rows=8 autocomplete="off" required></textarea>
                    
                    <div class="text-center mb-3">
                        <button type="submit" class="btn mt-3 btn-primary" name="post_my_msg">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>

    
</body> 
</html>