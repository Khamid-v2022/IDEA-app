<div class="main-page">
    <div class="container mx-auto mt-5 px-5 flex-column" style="max-width: 800px;">  
        <?php 
        foreach($list as $item) { ?>
            <div class="idea-item">
                <div class="idea-header d-flex justify-content-between text-muted">
                    <span><?=$item['created_at']?></span>
                    <span>@<?=$item['full_name']?></span>
                </div>
                <div class="d-flex py-3">
                    <div>
                        <img class="avatar-user-img" src="<?=base_url()?>assets/img/avatar.png" alt="Avatar">
                    </div>
                    <div class="ms-3">
                        <h6 class="fw-bold"><?=$item['title']?></h6>
                        <span class="text-muted">
                            <?=$item['my_job']?>, looking for <?=$item['looking_job']?>
                        </span>
                    </div>
                </div>
                <div>
                    <?=$item['detail']?>
                </div>
                <div class="idea-footer d-flex justify-content-between pt-3">
                    <div>
                        <a href="<?=site_url()?>post/show_post/<?=$item['id']?>" class="idea-comment-btn"><?=$item['comment_count']?><i class="fa fa-comment-o ms-1"></i></a>
                        <a href="<?=site_url()?>post/show_post/<?=$item['id']?>" class="idea-like-btn ms-2"><?=$item['like_count']?><i class="fa fa-thumbs-o-up ms-1"></i></a>
                    </div>
                    <a href="<?=site_url()?>post/show_post/<?=$item['id']?>">See more</a>
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