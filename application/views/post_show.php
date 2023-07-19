<script type="text/javascript" src="<?=base_url()?>assets/js/posts.js"></script>

<div class="post-show-page">
    <div class="container mx-auto mt-5 px-5 flex-column" style="max-width: 800px;">  

        <!-- buttons header -->
        <div class="d-flex justify-content-between post-show-header">
            <input type="hidden" id="post_id" value="<?=$post['id']?>">
            <div>
                <a href="#" class=""><i class="fa fa-bookmark-o ms-1"></i></a>
                <a href="#" class="ms-2"><i class="fa fa-send-o ms-1"></i></a>
            </div>
            <a href="#" class="idea-like-btn ms-2"><?=$post['like_count']?><i class="fa fa-thumbs-o-up ms-1"></i></a>
        </div>

        <!-- Post Content -->
        <div class="idea-item mt-3">
            <div class="idea-header d-flex justify-content-between text-muted">
                <span><?=$post['created_at']?></span>
                <span>@<?=$post['full_name']?></span>
            </div>
            <div class="d-flex py-3">
                <div>
                    <img class="avatar-user-img" src="<?=base_url()?>assets/img/avatar.png" alt="Avatar">
                </div>
                <div class="ms-3">
                    <h6 class="fw-bold"><?=$post['title']?></h6>
                    <span class="text-muted">
                        <?=$post['my_job']?>, looking for <?=$post['looking_job']?>
                    </span>
                </div>
            </div>
            <div clsss="py-3">
                <?=$post['detail']?>
            </div>
        </div>

        <!-- Discussion -->
        <div class="discusstion p-4">
            <h4>Discusstion (<?=$post['comment_count']?>)</h4>
            <form id="submit_comment_form">
                <textarea class="form-control" rows="8" placeholder="Write a comment..." id="comment_input" required></textarea>
                <div class="mt-3">
                    <button class="btn btn-outline-primary" type="submit">Post Comment</button>
                </div>
            </form>

            <div class="comments mt-4">
                <?php 
                foreach($main_comments as $main_comment) {
                ?>
                    <div class="comment-item" data-comment_id = "<?=$main_comment['id']?>">
                        <div class="d-flex">
                            <div>
                                <img class="avatar-user-img me-3" src="<?=base_url()?>assets/img/avatar.png" alt="Avatar">
                                <?=$main_comment['full_name']?>
                            </div>
                        </div>
                        <div class="py-3">
                            <?=$main_comment['content']?>
                        </div>
                        <div>
                            <a href="javascript:;" class="text-muted comment-reply-btn"><i class="fa fa-comment-o me-1"></i> Reply</a>
                        </div>
                        <div class="each-comment-box d-none mt-4">
                            <form class="each-comment-form" data-comment_parent_id="<?=$main_comment['id']?>">
                                <textarea class="form-control" rows="8" placeholder="Write a comment..." required></textarea>
                                <div class="d-flex justify-content-between mt-3">
                                    <button class="btn btn-outline-primary" type="submit">Post Comment</button>
                                    <button class="btn btn-outline-secondary reply-cancel-btn" type="button">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <?php 
                        foreach($sub_comments as $sub_comment) {
                            if($sub_comment['parent_comment_id'] == $main_comment['id']){
                    ?>
                        <div class="comment-item sub-comment-item" data-comment_id = "<?=$sub_comment['id']?>">
                            <div class="d-flex">
                                <div>
                                    <img class="avatar-user-img me-3" src="<?=base_url()?>assets/img/avatar.png" alt="Avatar">
                                    <?=$sub_comment['full_name']?>
                                </div>
                            </div>
                            <div class="py-3">
                                <?=$sub_comment['content']?>
                            </div>
                            <div>
                                <a href="javascript:;" class="text-muted comment-reply-btn"><i class="fa fa-comment-o me-1"></i> Reply</a>
                            </div>
                            <div class="each-comment-box d-none mt-4">
                                <form class="each-comment-form" data-comment_parent_id="<?=$main_comment['id']?>">
                                    <textarea class="form-control" rows="8" placeholder="Write a comment..." required></textarea>
                                    <div class="d-flex justify-content-between mt-3">
                                        <button class="btn btn-outline-primary" type="submit">Post Comment</button>
                                        <button class="btn btn-outline-secondary reply-cancel-btn" type="button">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>