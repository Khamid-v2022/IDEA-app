<section class="main-section">
    <div class="main-page">
        <div class="container mx-auto px-5 flex-column" style="max-width: 800px;">
            <h4 class="fw-bold mb-3"><?=$title?></h4>  
            <?php 
            foreach($list as $item) { ?>
                <div class="idea-item">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <div>
                                <img class="avatar-user-img" src="<?=base_url()?>assets/img/avatar.png" alt="Avatar">
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-0"><?=$item['full_name']?></h6>
                                <span class="">
                                    <?=$item['created_at']?>
                                </span>
                            </div>
                        </div>
                        <span>
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                    </div>
                    
                    <div class="idea-content py-4">
                        <h5><?=$item['title']?></h5>
                        <div class="idea-detail">
                            <?=$item['detail']?>
                        </div>
                    </div>

                    <div class="idea-action-btns d-flex justify-content-between">
                        <a class="text-primary" href="<?=site_url()?>post/show_post/<?=$item['id']?>" class="">
                            <i class="fa fa-heart me-1"></i>
                            <?=$item['like_count']?> Likes
                        </a>
                        <a class="no-color" href="<?=site_url()?>post/show_post/<?=$item['id']?>" class="">
                            <i class="fa fa-comments-o me-1"></i>
                            <?=$item['comment_count']?> Comments
                        </a>
                        <a class="no-color" href="<?=site_url()?>post/show_post/<?=$item['id']?>">
                            <i class="fa fa-share me-1"></i>
                            0 Share
                        </a>
                    </div>
                    <hr>
                    
                    <div class="idea-footer">
                        <img class="avatar-user-img small-avatar me-5" src="<?=base_url()?>assets/img/avatar.png" alt="Avatar">
                        <input type="text" class="form-control form-control-sm colored-control" aria-label="Dollar amount (with dot and two decimal places)" placeholder="Write your comment">
                        <!-- <div class="input-group">
                            <input type="text" class="form-control form-control-sm" aria-label="Dollar amount (with dot and two decimal places)" placeholder="Write your comment">
                            <span class="input-group-text">
                                <i class="fa fa-link"></i>
                            </span>
                            <span class="input-group-text">
                                <i class="fa fa-smile-o"></i>
                            </span>
                        </div> -->
                    </div>
                </div>
            <?php 
            }
            ?>

            <div class="d-flex justify-content-center">
                <?=$paginetionlinks?>
            </div>
        </div>
    </div>
</section>