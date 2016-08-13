
<?php // print_r($job_details);exit;      ?>
<section class="row advanced">
    <div class="container">
        <div class="row-border">
<!--            <div style="<?php echo $job_details['int_user_id'] == $user['int_user_id'] ? 'display:none' : '' ?>">
                <div id="join_buttons" style="<?php echo isset($visiting_data) && !empty($visiting_data) ? 'display:none' : '' ?>">
                    <h3></h3>
                    <button class="btn btn-success event_response" id="1">Apply</button>
                </div> 
                <div id="join_status" style="<?php echo isset($visiting_data) && !empty($visiting_data) ? '' : 'display:none' ?>">
                    <h3 style="<?php echo isset($visiting_data) && $visiting_data['int_visiting_prob'] == '1' ? 'color:#00ff00' : '#ff0000' ?>"><?php echo isset($visiting_data) && $visiting_data['int_visiting_prob'] == '1' ? 'Accepted' : 'Rejected' ?></h3>
                </div>
            </div>-->
        </div>
        <div class="row advanced_bg">
            <div class="col-md-8 advanced_left">
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
