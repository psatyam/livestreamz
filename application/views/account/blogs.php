<section class="row blogs" style="padding: 0;">
    <?php if (isset($blogData) && !empty($blogData)) { ?>
    <div class="row"><button class="add_blog btn btn-success pull-right" ><span><i class="fa fa-plus-circle"></i></span> Add Blog</button></div>
    <div class="row" style="padding: 40px 0">
            <div class="row blogs_inner">
                <?php foreach ($blogData as $blog) {?>
                        
                    
                <div class="blog_item" style="padding-bottom: 50px;">
                    <!--                <div class="item_image">
                                        <img src="http://placehold.it/370x272" alt="#">
                                        <div class="item_icon item_icon_left">
                                            <a href="#"><i class="fa fa-file-image-o"></i></a>
                                        </div>
                                    </div>-->
                    <div class="item_describe">
                        <div class="media">
                            <div class="media-left">
                                <a href="<?php echo site_url()."/".$blog['int_post_id'] ?>">
                                    <img class="media-object" src="<?php echo base_url().$blog['txt_media_url'] ?>" alt="#">
<!--                                    <div class="blog_time">
                                        <h2>09</h2>
                                        <h4>Nov</h4>
                                    </div>-->
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="<?php echo site_url()."/blogs/blog/".$blog['int_post_id'] ?>" class="media-heading"><?php echo $blog['txt_title'] ?></a>
                                <ul class="nav">
                                    <li><a href="#"><i class="fa fa-user"></i><span><?php echo $blog['txt_name'] ?></span></a></li>
                                    <li><a href="#"><i class="fa fa-clock-o"></i><?php echo $blog['dt_created_on'] ?></span></a></li>
                                    <li><a href="#"><i class="fa fa-folder-o"></i><span><?php echo ($blog['int_is_publish']==1)?'published':'Unpublished' ?></span></a></li>
                                    <li><a href="#"><i class="fa fa-comment-o"></i><span><?php echo $blog['commentcount'] ?></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <p><?php echo strlen($blog['txt_description']) >= 100 ? substr($blog['txt_description'], 0, 100):$blog['txt_description'] ?></p>
                        <a href="<?php echo site_url()."/blogs/blog/".$blog['int_post_id'] ?>">read more<i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
               <?php  } ?>
            </div>
            <div class="row page_turning mb0">
                <div class="previous">
                    <?php if (isset($prvLink)) { ?>
                        <a href="<?php echo $prvLink ?>"><i class="fa fa-angle-left"></i>Previous Post</a>
                    <?php } ?>
                </div>
                <div class="next">
                     <?php if (isset($nextLink)) { ?>
                    <a href="<?php echo $nextLink ?>">Next Post<i class="fa fa-angle-right"></i></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <h3> No Blogs from You </h3>
        <button class="add_blog btn btn-success" ><span><i class="fa fa-plus-circle"></i></span> Add Blog</button>
    <?php } ?>
</section>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 75%; height: 75%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Blog</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form method="post" id="form_modal" action="<?php echo site_url() ?>/blogs/blogSave" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt_title">Blog Title<span style="color:#f00;">*</span></label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="hidden" name="int_post_id" id="int_post_id" value="">
                                    <input type="text" id="txt_title" name="txt_title" value="" class="form-control">
                                </div><!-- /.form-group -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="cover_image">Cover Image<span style="color:#f00;">*</span></label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="file" id="cover_image" name="cover_image" value="" class="form-control">
                                </div><!-- /.form-group -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="int_is_publish">Publish<span style="color:#f00;">*</span></label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="checkbox" id="int_is_publish" name="int_is_publish" value="1" class="form-control">
                                </div><!-- /.form-group -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt_description">Blog description<span style="color:#f00;">*</span></label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <textarea type="text" id="txt_description" name="txt_description" value="" rows="10" class="form-control"></textarea>
                                </div><!-- /.form-group -->
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_event" >Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('.add_blog').click(function() {
        $('form input').val('');
        $('form textarea').val('');
        $('#myModal').modal('show');
    });
    $('#save_event').click(function() {
        if ($('#txt_title').val() == '') {
            $('#txt_title').css('border', '1px solid #ff0000');
        } else if ($('#txt_description').val() == '') {
            $('#txt_description').css('border', '1px solid #ff0000');
        } else {
            $('#form_modal').submit();
        }
    });
</script>

