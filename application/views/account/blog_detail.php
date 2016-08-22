<section class="row blogs">
    <div class="container">
        <div class="row blogs_inner">
            <div class="blog_item pb25">
                <div class="item_image post_item_image">
                    <img src="<?php echo base_url() . $blog_details['txt_media_url'] ?>" alt="#">
                    <div class="item_icon item_icon_left">
                        <a href="#"><i class="fa fa-file-image-o"></i></a>
                    </div>
                </div>
                <div class="item_describe post_item_describe">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="<?php echo base_url() . $blog_details['txt_media_url'] ?>" alt="#">
                                <!--                                <div class="blog_time">
                                                                    <h2>09</h2>
                                                                    <h4>Nov</h4>
                                                                </div>-->
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="#" class="media-heading"><?php echo $blog_details['txt_title'] ?></a>
                            <ul class="nav">
                                <li><a href="#"><i class="fa fa-user"></i><span><?php echo $blog_details['txt_name'] ?></span></a></li>
                                <li><a href="#"><i class="fa fa-clock-o"></i><span><?php echo $blog_details['dt_created_on'] ?></span></a></li>
                                <!--<li><a href="#"><i class="fa fa-folder-o"></i><span>Web Develpoment</span></a></li>-->
                                <li><a href="#" id="commentcount"><i class="fa fa-comment-o"></i><span><?php echo $blog_details['commentcount'] ?></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <?php echo $blog_details['txt_description'] ?>
                </div>
            </div>
            <div class="sharing">
                <div class="share_left">
                    <!--<a href="#"><i class="fa fa-tags"></i>web design, web, psd, tips</a>-->
                </div>
                <div class="share_right">
                    <h5>Share :</h5>
                    <ul class="social_icon">
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                    </ul>
                </div>
            </div>
            <!--            <div class="page_turning">
                            <div class="previous">
                                <a href="#"><i class="fa fa-angle-left"></i>Previous Post</a>
                            </div>
                            <div class="next">
                                <a href="#">Next Post<i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>-->
            <!--            <div class="author">
                            <h4>About Author:</h4>
                            <div class="members_area">
                                <div class="member">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="http://placehold.it/120x120" alt="#">
                                            </a>
                                        </div>
                                        <div class="media-body member_details">
                                            <h5 class="media-heading">Touhida Moni</h5>
                                            <h6>Founder &amp; CEO</h6>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nos exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
            <?php // print_r($comment_data);exit; ?>
            <div class="leave_comment">
                <h4>Leave A Comment</h4>
                <form  method="post" id="commentform" action="<?php echo site_url() ?>/blogs/addComment">
                    <!--                    <div class="form-inline">
                                        <div class="form-group">
                                            <label class="sr-only" for="inputname">Name</label>
                                            <i class="fa fa-user"></i>
                                            <input type="text" class="form-control textbox" id="inputname" placeholder="Your Name">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="inputemail">Email address</label>
                                            <i class="fa fa-envelope-o"></i>
                                            <input type="email" class="form-control" id="inputemail" placeholder="Email-Address">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="webAddress">Password</label>
                                            <i class="fa fa-phone"></i>
                                            <input type="text" class="form-control" id="webAddress" placeholder="Web Address">
                                        </div>
                                        </div>-->
                    <div class="form-group" style="width: 100%;">
                        <label class="sr-only" for="webAddress">Password</label>
                        <i class="fa fa-comments"></i>
                        <input type="hidden" name="int_blog_id" value="<?php echo $blog_details['int_post_id'] ?>">
                        <input type="hidden" name="int_source_id" value="<?php echo $blog_details['int_post_id'] ?>">
                        <input type="hidden" name="int_comment_for" value="1">
                        <textarea class="form-control" id="txt_comment" name="txt_comment"  rows="11" placeholder="Write message" style="border-radius: 18px 18px 18px 18px;"></textarea>
                    </div>
                </form>
                <a href="#" id="commentformSubmit">comment</a>
            </div>
            <div class="author" id="comment_section">
                <h4><?php echo $blog_details['commentcount'] ?> Comments</h4>
                <?php foreach ($comment_data as $comment) { ?>


                    <div class="members_area">
                        <div class="member">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="<?php echo isset($comment['txt_profile_image']) && $comment['txt_profile_image'] != '' ? base_url() . $comment['txt_profile_image'] : base_url() . 'uploads/no-image.png' ?>" alt="#">
                                    </a>
                                </div>
                                <div class="media-body member_details">
                                    <h5 class="media-heading"><?php echo $comment['txt_name'] ?></h5>
                                    <h6>Posted on <?php echo $comment['dt_created_on'] ?></h6>
                                    <a href="#" id="" data-comment-id="<?php echo $comment['int_comment_id'] ?>" data-comment-for="2" class="comment_reply">Reply</a>
                                    <p> <?php echo $comment['txt_comment'] ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
            
        </div>
    </div>
</section>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Reply</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="leave_comment">
                        <!--<h4>Leave A Comment</h4>-->
                        <form  method="post" id="commentformReply" action="<?php echo site_url() ?>/blogs/addComment">
                            <div class="form-group" style="width: 100%;">
                                <input type="hidden" name="int_blog_id" value="<?php echo $blog_details['int_post_id'] ?>">
                                <input type="hidden" name="int_source_id" id="int_source_id_reply" value="">
                                <input type="hidden" name="int_comment_for" value="2">
                                <textarea class="form-control" id="txt_comment_reply" name="txt_comment"  rows="11" placeholder="Write message" style="border-radius: 18px 18px 18px 18px;"></textarea>
                            </div>
                        </form>
                        <!--<a href="#" id="commentformSubmit">comment</a>-->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_event" >Reply</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var baseUrl = '<?php echo base_url(); ?>';
        $('#commentformSubmit').click(function(e) {
            e.preventDefault();
            if ($('#txt_comment').val() == '') {
                $('#txt_comment').css('border', '1px solid #ff0000');
                return false;
            } else {
                var data = $('#commentform').serialize();
                $.ajax({
                    url: "<?php echo site_url() ?>/blogs/addComment",
                    method: 'POST',
                    data: data,
                    success: function(result) {
                        var obj = $.parseJSON(result);
                        console.log(obj);
                        var userimage = baseUrl + 'uploads/no-image.png';
                        if (obj.txt_profile_image != '') {
                            userimage = baseUrl + obj.txt_profile_image;
                        }
                        var html = '<div class="members_area">';
                        html += '<div class="member">';
                        html += '<div class="media">';
                        html += '<div class="media-left">';
                        html += '<a href="#">';
                        html += '<img class="media-object" src="' + userimage + '" alt="#">';
                        html += '</a>';
                        html += '</div>';
                        html += '<div class="media-body member_details">';
                        html += '<h5 class="media-heading">' + obj.txt_name + '</h5>';
                        html += '<h6>Posted on ' + obj.dt_created_on + '</h6>';
                        html += '<a href="#" id="" data-comment-id="' + obj.int_comment_id + '" data-comment-for="2" class="comment_reply">Reply</a>';
                        html += '<p>' + obj.txt_comment + '</p>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        console.log(html);
                        $('#comment_section').append(html);
                        var commentCount = parseInt($('#commentcount').text());
                        commentCount = commentCount + 1;
                        $('#comment_section h4').html(commentCount + ' Comments');
                        $('#commentcount span').text(commentCount);
                    }
                });
                return false;
            }
        });
    });

</script>
<script>
    $('.comment_reply').click(function(e) {
//        $('form input').val('');
e.preventDefault();
        var sourceId=$(this).attr('data-comment-id');
        $('#int_source_id_reply').val(sourceId);
        $('form textarea').val('');
        $('#myModal').modal('show');
    });
    $('#save_event').click(function(e){
        e.preventDefault();
            if ($('#txt_comment_reply').val() == '') {
                $('#txt_comment_reply').css('border', '1px solid #ff0000');
                return false;
            } else {
                var data = $('#commentformReply').serialize();
                $.ajax({
                    url: "<?php echo site_url() ?>/blogs/addComment",
                    method: 'POST',
                    data: data,
                    success: function(result) {
                        var obj = $.parseJSON(result);
                        console.log(obj);
                        var userimage = baseUrl + 'uploads/no-image.png';
                        if (obj.txt_profile_image != '') {
                            userimage = baseUrl + obj.txt_profile_image;
                        }
                        var html = '<div class="members_area">';
                        html += '<div class="member">';
                        html += '<div class="media">';
                        html += '<div class="media-left">';
                        html += '<a href="#">';
                        html += '<img class="media-object" src="' + userimage + '" alt="#">';
                        html += '</a>';
                        html += '</div>';
                        html += '<div class="media-body member_details">';
                        html += '<h5 class="media-heading">' + obj.txt_name + '</h5>';
                        html += '<h6>Posted on ' + obj.dt_created_on + '</h6>';
                        html += '<a href="#" id="" data-comment-id="' + obj.int_comment_id + '" data-comment-for="2" class="comment_reply">Reply</a>';
                        html += '<p>' + obj.txt_comment + '</p>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        console.log(html);
                        $('#comment_section').append(html);
                        var commentCount = parseInt($('#commentcount').text());
                        commentCount = commentCount + 1;
                        $('#comment_section h4').html(commentCount + ' Comments');
                        $('#commentcount span').text(commentCount);
                    }
                });
                return false;
            }
    });
</script>