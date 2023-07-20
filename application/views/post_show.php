<script type="text/javascript" src="<?=base_url()?>assets/js/posts.js"></script>
<section class="main-section">
    <div class="post-show-page">
        <div class="container mx-auto px-5 flex-column" style="max-width: 700px;">  

            <!-- Post Content -->
            <div class="idea-item">
                <input type="hidden" id="post_id" value="<?=$post['id']?>">
                <div class="d-flex justify-content-between">
                    <div class="d-flex">
                        <div>
                            <img class="avatar-user-img" src="<?=base_url()?>assets/img/avatar.png" alt="Avatar">
                        </div>
                        <div class="ms-3">
                            <h6 class="text-muted mb-0"><?=$post['full_name']?></h6>
                            <span class="small-font">
                                <?=$post['created_at']?>
                            </span>
                        </div>
                    </div>
                    <span>
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                </div>
                
                <div class="idea-content py-4">
                    <h4><?=$post['title']?></h4>
                    <div class="idea-detail">
                        <?=$post['detail']?>
                    </div>
                </div>

                <div class="idea-action-btns d-flex justify-content-between">
                    <a class="no-color small-font" href="" class="">
                        <i class="fa fa-heart me-1"></i>
                        <?=$post['like_count']?> Likes
                    </a>
                    <a class="text-primary small-font" href="" class="">
                        <i class="fa fa-comments-o me-1"></i>
                        <?=$post['comment_count']?> Comments
                    </a>
                    <a class="no-color small-font" href="">
                        <i class="fa fa-share me-1"></i>
                        0 Share
                    </a>
                </div>

                <hr class="mt-5">
                <!-- Discussion -->
                <div class="discusstion mt-5">
                    <?php if(isset($this->session->user_data) && $this->session->user_data['is_loggedin']) {
                        ?>
                        <div class="mb-6">
                            <h5 class="font-bold mb-3">Comments (<?=$post['comment_count']?>)</h5>
                            <form id="submit_comment_form">
                                <textarea class="form-control" rows="8" placeholder="Write a comment..." id="comment_input" required></textarea>
                                <div class="mt-3">
                                    <button class="btn btn-outline-primary" type="submit">Post Comment</button>
                                </div>
                            </form>
                        </div>
                    <?php } else { ?>
                        <div class="d-flex mb-6">
                            <h5 class="font-bold mb-3">Comments (<?=$post['comment_count']?>)</h5>
                            <a class="ms-3 no-color" href="<?=site_url()?>sign_in">Sign In to comment</a>
                        </div>
                    <?php }?>
                    

                    <div class="comments mt-4">
                        <?php 
                        foreach($main_comments as $main_comment) {
                        ?>
                            <?php 
                            if($main_comment['reply_count'] > 0)
                            ?>
                            <div class="comment-item <?=$main_comment['reply_count'] > 0 ? 'exist-sub-comment':''?>" data-comment_id = "<?=$main_comment['id']?>">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img class="avatar-user-img me-3" src="<?=base_url()?>assets/img/avatar.png" alt="Avatar">
                                        <h6 class="text-muted"><?=$main_comment['full_name']?></h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="text-main-color"><?=$main_comment['created_at']?></small>
                                        <span class="text-main-color ms-3"><i class="fa fa-ellipsis-h"></i></span>
                                    </div>
                                </div>
                                <div class="ps-5">
                                    <?=$main_comment['content']?>
                                </div>
                                
                                <div class="reply-box">
                                    <div class="d-flex justify-content-between mt-3 ps-5">
                                        <div>
                                            <small>3 Likes</small>
                                            <small class="ms-3"><?=$main_comment['reply_count']?> Replies</small>
                                        </div>
                                        <?php if(isset($this->session->user_data) && $this->session->user_data['is_loggedin']) { ?>
                                        <small><a href="javascript:;" class="text-muted comment-reply-btn">Reply</a></small>
                                        <?php } ?>
                                    </div>
                                    <?php if(isset($this->session->user_data) && $this->session->user_data['is_loggedin']) { ?>
                                    <div class="each-comment-box d-none mt-4 ps-5">
                                        <form class="each-comment-form" data-comment_parent_id="<?=$main_comment['id']?>">
                                            <textarea class="form-control" rows="8" placeholder="Write a comment..." required></textarea>
                                            <div class="d-flex justify-content-between mt-3">
                                                <button class="btn btn-outline-primary" type="submit">Post Comment</button>
                                                <button class="btn btn-outline-secondary reply-cancel-btn" type="button">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                    <?php } ?>
                                </div>

                                <?php 
                                foreach($sub_comments as $sub_comment) {
                                    if($sub_comment['parent_comment_id'] == $main_comment['id']){
                                ?>
                                <div class="sub-comment-item" data-comment_id = "<?=$sub_comment['id']?>">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="avatar-user-img me-3" src="<?=base_url()?>assets/img/avatar.png" alt="Avatar">
                                            <h6 class="text-muted"><?=$sub_comment['full_name']?></h6>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="text-main-color"><?=$sub_comment['created_at']?></span>
                                            <span class="text-main-color ms-3"><i class="fa fa-ellipsis-h"></i></span>
                                        </div>
                                    </div>
                                    <div class="ps-5">
                                        <?=$sub_comment['content']?>
                                    </div>
                                    
                                    <div class="reply-box">
                                        <div class="d-flex justify-content-between mt-3 ps-5">
                                            <div>
                                                <small>3 Likes</small>
                                            </div>
                                            <?php if(isset($this->session->user_data) && $this->session->user_data['is_loggedin']) { ?>
                                            <small><a href="javascript:;" class="text-muted comment-reply-btn">Reply</a></small>
                                            <?php } ?>
                                        </div>
                                        <?php if(isset($this->session->user_data) && $this->session->user_data['is_loggedin']) { ?>
                                        <div class="each-comment-box d-none mt-4 ps-5">
                                            <form class="each-comment-form" data-comment_parent_id="<?=$main_comment['id']?>">
                                                <textarea class="form-control" rows="8" placeholder="Write a comment..." required></textarea>
                                                <div class="d-flex justify-content-between mt-3">
                                                    <button class="btn btn-outline-primary" type="submit">Post Comment</button>
                                                    <button class="btn btn-outline-secondary reply-cancel-btn" type="button">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        <?php 
                        } ?>
                    </div>
                </div>
            </div>

         
        </div>
    </div>
</section>