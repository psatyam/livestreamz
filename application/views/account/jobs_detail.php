
<?php // print_r($application_data);exit;         ?>
<section class="row advanced">
    <div class="container">
        <div class="row-border">
            <div style="<?php echo $job_details['int_user_id'] == $user['int_user_id'] ? 'display:none' : '' ?>">
                <div id="join_buttons" style="<?php echo isset($application_data) && !empty($application_data) ? 'display:none' : '' ?>">
                    <h3></h3>
                    <button class="btn btn-success add_event pull-right" id="1">Apply</button>
                </div> 
                <div id="join_status" style="<?php echo isset($application_data) && !empty($application_data) ? '' : 'display:none' ?>">
                    <h3 style="color : #00ff00" class="pull-right">Applied</h3>
                </div>
            </div>
        </div>
        <div class="row advanced_bg">
            <div class="col-md-12 advanced_left">
                <div class="advanced_left_inner">
                    <h3><?php echo $job_details['txt_title']; ?></h3>
                    <p><?php echo $job_details['txt_description']; ?></p>
                    <hr>
                    <h5><i class="fa fa-list"></i> Applicant Should Have Following Skills:</h5>
                    <ul class="nav following_events">
                        <?php
                        $skills = json_decode($job_details['txt_skills']);
                        foreach ($skills as $skill) {
                            ?>

                            <li><a href="#"><span><?php echo $skill; ?></span></a></li>
                        <?php }
                        ?>
                    </ul>
                    <hr>
                    <ul class="nav">
                        <li><a href="#"><i class="fa fa-user"></i><?php echo $job_details['user_name'] ?> (Founder, <?php echo $job_details['org_name'] ?>)</a></li>
                        <li><a href="#"><i class="fa fa-map-marker"></i><?php echo $job_details['txt_location'] ?></a></li>
                        <li><a href="#"><i class="fa fa-clock-o"></i><?php echo $job_details['dt_expire'] ?></a></li>
<!--                                    <li><a href="schedule.html"><span>3</span>Use font awesome icons or your own image</a></li>
                        <li><a href="schedule.html"><span>4</span>Easily specify the icon color, circle color</a></li>-->
                    </ul>

                    <!--                                <ul class="nav followers">
                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                                                    </ul>-->
                </div>
            </div>
        </div>
    </div>
</section>
<section class="row blogs">
    <div class="container">
        <div class="sec_header_left">
            <h2>All Applicants</h2>
            <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod to end.</p>-->
        </div>
        <div class="row blogs_inner">
            <?php foreach ($allApplicants as $applicant) { ?>


                <div class="blog_item">
                    <!--                <div class="item_image item_image_right">
                                        <img src="http://placehold.it/370x272" alt="#">
                                        <div class="item_icon item_icon_right">
                                            <a href="#"><i class="fa fa-file-video-o"></i></a>
                                        </div>
                                        
                                    </div>-->
                    <div class="item_describe item_describe_right">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="<?php echo isset($applicant['txt_profile_image']) && $applicant['txt_profile_image'] != '' ? base_url() . $applicant['txt_profile_image'] : base_url() . 'uploads/no-image.png' ?>" alt="#">
                                    <!--                                <div class="blog_time">
                                                                        <h2>10</h2>
                                                                        <h4>Nov</h4>
                                                                    </div>-->
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="blog_post.html" class="media-heading"><?php echo $applicant['txt_name'] ?></a>
                                <ul class="nav">
                                    <li><a href="<?php echo base_url() . $applicant['txt_cv_path'] ?>"><i class="fa fa-user"></i><span>Resume</span></a></li>
                                    <?php if ($applicant['int_selection_type'] == '') { ?>
                                        <li><a href="#" class="selection" data-applicantionId="<?php echo $applicant['int_application_id'] ?>" data-selection="1"><span>Select</span></a></li>
                                        <li><a href="#" class="selection" data-applicantionId="<?php echo $applicant['int_application_id'] ?>" data-selection="2"><span>Reject</span></a></li>
                                    <?php } else { ?>
                                        <li><a href="#" class="selected"><span style="<?php echo $applicant['int_selection_type'] == '1' ? 'color:#00ff00' : 'color:#ff0000'; ?>"><?php echo $applicant['int_selection_type'] == '1' ? 'SELECTED' : 'REJECTED'; ?></span></a></li>

                                    <?php } ?>
        <!--<li><a href="#"><i class="fa fa-comment-o"></i><span>3 Comments</span></a></li>-->
                                </ul>
                            </div>
                        </div>
    <!--                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore to magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate. </p>
                        <a href="blog_post.html">read more<i class="fa fa-long-arrow-right"></i></a>-->
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Please Upload Your Resume</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form method="post" id="form_modal" action="<?php echo site_url() ?>/jobs/jobApply" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt_sector_name">Resume<span style="color:#f00;">*</span></label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="hidden" name="int_job_id" id="int_job_id" value="<?php echo $job_details['int_job_id'] ?>">
                                    <input type="file" id="txt_cv_path" name="txt_cv_path" value="" class="form-control">
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
    var txt_visitor_name = '<?php echo $user['txt_name'] ?>';
    var int_visitor_id = '<?php echo $user['int_user_id'] ?>';
    var int_job_id = '<?php echo $job_details['int_job_id'] ?>';
    $('.event_response').click(function() {
        var int_visiting_prob = this.id;
        var data = {'txt_visitor_name': txt_visitor_name, 'int_visitor_id': int_visitor_id, 'int_job_id': int_job_id, 'int_visiting_prob': int_visiting_prob};
        $.ajax({
            url: '<?php echo site_url(); ?>/content/saveVisitor',
            type: "POST",
            data: data,
            dataType: "json",
            success: function(result) {
                if (result.success == true) {
                    $('#join_buttons').hide();
                    $('#join_status h3').text(result.status);
                    $('#join_status').show();

                } else {
                    alert('Something wrong please try again');
                }
            }
        });
    });
</script>
<script>
    $('.add_event').click(function() {
        $('form input').val('');
        $('form textarea').val('');
        $('#int_job_id').val('<?php echo $job_details['int_job_id'] ?>');
        $('#myModal').modal('show');
    });

    $('#save_event').click(function() {
        if ($('#txt_cv_path').val() == '') {
            $('#txt_cv_path').css('border', '1px solid #ff0000');
        } else {
            $('#form_modal').submit();
        }
    });

    $(".selection").click(function() {
        var int_application_id = $(this).attr('data-applicantionId');
        var int_selection_type = $(this).attr('data-selection');
        var int_job_id = '<?php echo $job_details['int_job_id'] ?>';
        var data = {'int_application_id': int_application_id, 'int_selection_type': int_selection_type, 'int_job_id': int_job_id};
        $.ajax({
            url: '<?php echo site_url() ?>/jobs/selection',
            data: data,
            method: 'POST',
            dataType: 'json',
            success: function(result) {
                console.log(result);
                if (result.success == true) {
                    $('.selection').hide();
                    if(int_selection_type==1){
                    var html='<li><a href="#" class="selected"><span style="color:#00ff00">SELECTED</span></a></li>';
                    }else{
                    var html='<li><a href="#" class="selected"><span style="color:#ff0000">REJECTED</span></a></li>';
                    }
                    $('.media-body ul').append(html);
                }
            }
        });
//        alert(int_application_id);
        return false;
    });
</script>
