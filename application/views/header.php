<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no'>
    <title>Boxboard</title>
     
    <link href="<?=base_url()?>assets/plugin/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/plugin/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
    
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
    <!-- Nav bar -->
    <section class="navbar-wrapper">
        <div class="d-flex justify-content-between px-4 py-3">          
            <a href="/"><img class="brand-logo" src="<?=base_url()?>assets/img/logo.png" alt="Logo"></a>
            <div class="search-box-wrapper d-none d-lg-flex">
                <div class="input-group mx-auto colored-control">
                    <span class="input-group-text" id="search-addon"><i class="fa fa-search"></i></span>
                    <input class="form-control colored-control" placeholder="Search" aria-describedby="search-addon" >
                </div>
            </div>
            <?php 
            if(isset($this->session->user_data) && $this->session->user_data['is_loggedin']){
            ?>
                <div class="d-flex align-items-center">
                    <!-- <a href="<?=site_url()?>post/new" class="btn btn-primary">New Project</a> -->
                    <button class="btn btn-primary new-project-btn">New Project</button>
                    <div class="dropdown ms-4">
                        <a class="" type="button" id="dropdown_notificaton" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3456 11.6287H18.2316C19.2732 11.6287 20.1176 12.4731 20.1176 13.5147C20.1176 14.5563 19.2732 15.4007 18.2316 15.4007H1.88603C0.844404 15.4007 0 14.5563 0 13.5147C0 12.4731 0.844404 11.6287 1.88603 11.6287H3.77206L4.47401 5.31115C4.7902 2.46541 7.19557 0.3125 10.0588 0.3125C12.9221 0.3125 15.3274 2.46541 15.6436 5.31115L16.3456 11.6287Z" fill="#B0B7C3"/>
                                <path opacity="0.3" d="M12.5736 19.1728C12.5736 17.784 11.4477 16.6581 10.0589 16.6581C8.67006 16.6581 7.54419 17.784 7.54419 19.1728C7.54419 20.5616 8.67006 21.6875 10.0589 21.6875C11.4477 21.6875 12.5736 20.5616 12.5736 19.1728Z" fill="#B0B7C3"/>
                            </svg>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown_notificaton">
                            <li class="dropdown-item">Notification</li>
                        </ul>
                    </div>
                    <div class="dropdown ms-4">
                        <a class="" type="button" id="dropdown_menu" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="avatar-menu-img" src="<?=base_url()?>assets/img/avatar.png" alt="Avatar">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown_menu">
                            <li><a class="dropdown-item" href="<?=site_url()?>welcome/my_project">My Projects</a></li>
                            <li><a class="dropdown-item" href="<?=site_url()?>auth/logout">Signout</a></li>
                        </ul>
                    </div>
                </div>
            <?php } else { ?>
                <div class="d-flex align-items-center">
                    <a href="<?=site_url()?>sign_in" class="btn btn-outline-primary">Sign In</a>
                    <a href="<?=site_url()?>sign_up" class="btn btn-primary ms-3">Sign Up</a>
                </div>
            <?php } ?>
        </div>
    </section>


<!-- New Project Modal -->
<div class="modal fade" id="new_project_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" style="font-size: 18px;">New Project</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="request-form ">
                    <form id="m_new_post_form">

                        <div class="mb-4">
                            <label class="form-label" for="m_post_title">Title</label>
                            <input type="text" id="m_post_title" class="form-control" placeholder="Technical guru seeking marketing help for twitter clone" required />
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="m_post_detail">Description</label>
                            <textarea id="m_post_detail" class="form-control" rows="10" placeholder="Describe your project, your goals, your progress, etc." required /></textarea>
                        </div>

                        
                        <div class="mb-4">
                            <label class="form-label" for="m_my_job">I am a</label>
                            <select class="form-select" id="m_my_job">
                            </select>
                        </div>
                    
                        <div class="mb-4">
                            <label class="form-label" for="m_looking_job">Looking for a</label>
                            <select class="form-select" id="m_looking_job">
                            </select>
                        </div>
                        
                        <!-- Submit button -->
                        <div class="text-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>