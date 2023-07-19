<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no'>
    <title>Idea</title>
     
    <link href="<?=base_url()?>assets/plugin/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/plugin/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" href="<?=base_url()?>assets/img/favicon.ico" sizes="32x32">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <script type="text/javascript" src="<?=base_url()?>assets/plugin/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/app.css">
    <script type="text/javascript">
        var site_url = "<?=site_url()?>";
    </script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/app.js"></script>
    
</head>

<body>
    <section class="">
        <div class="d-flex justify-content-between px-5 py-2">          
            <a href="/"><img class="brand-logo" src="<?=base_url()?>assets/img/logo.png" alt="Logo"></a>
            <?php 
            if(isset($this->session->user_data) && $this->session->user_data['is_loggedin']){
            ?>
            <div class="d-flex align-items-center">
                <a href="<?=site_url()?>post/new" class="btn btn-primary">New Project</a>
                <div class="dropdown ms-3">
                    <a class="" type="button" id="dropdown_menu" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="avatar-menu-img" src="<?=base_url()?>assets/img/avatar.png" alt="Avatar">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown_menu">
                        <li><a class="dropdown-item" href="<?=site_url()?>auth/logout">Signout</a></li>
                    </ul>
                </div>
            </div>
            <?php } else { ?>
                <div class="d-flex align-items-center">
                    <a class="btn btn-primary" href="<?=site_url()?>sign_in">Sign In</a>
                    <a class="btn btn-outline-primary ms-2" href="<?=site_url()?>sign_up">Sign Up</a>
                </div>
            <?php }?>
        </div>
    </section>