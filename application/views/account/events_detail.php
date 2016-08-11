
<?php // print_r($user);exit;    ?>
<section class="row advanced">
    <div class="container">
        <div class="row-border">
            <div style="<?php echo $event_details['int_added_by']==$user['int_user_id'] ? 'display:none' : '' ?>">
                <div id="join_buttons" style="<?php echo isset($visiting_data) && !empty($visiting_data) ? 'display:none' : '' ?>">
                    <h3>Are you interested in the event</h3>
                    <button class="btn btn-success event_response" id="1">Yes</button><button class="btn btn-danger event_response" id="2" style="margin-left: 20px;">No</button>
                </div> 
                <div id="join_status" style="<?php echo isset($visiting_data) && !empty($visiting_data) ? '' : 'display:none' ?>">
                    <h3 style="<?php echo isset($visiting_data) && $visiting_data['int_visiting_prob'] == '1' ? 'color:#00ff00' : '#ff0000' ?>"><?php echo isset($visiting_data) && $visiting_data['int_visiting_prob'] == '1' ? 'Accepted' : 'Rejected' ?></h3>
                </div>
            </div>
        </div>
        <div class="row advanced_bg">
            <div class="col-md-8 advanced_left">
                <div class="advanced_left_inner">
                    <h3><?php echo $event_details['txt_event_name']; ?></h3>
                    <p><?php echo $event_details['txt_event_desc']; ?></p>
                    <ul class="nav">
                        <li><a href="#"><i class="fa fa-clock-o"></i><span><?php echo $event_details['ts_datetime'] ?></span></a></li>
                        <li><a href="#"><i class="fa fa-map-marker"></i><span><?php echo $event_details['txt_venue'] ?></span></a></li>
                        <li><a href="#"><i class="fa fa-user"></i><span><?php echo $event_details['user_name'] ?></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 advanced_right">
                <img src="<?php echo $event_details['txt_event_image'] ?>" alt="#" height='450' width='310'>

            </div>
        </div>
    </div>
</section>
<script>
    var txt_visitor_name = '<?php echo $user['txt_name'] ?>';
    var int_visitor_id = '<?php echo $user['int_user_id'] ?>';
    var int_event_id = '<?php echo $event_details['int_event_id'] ?>';
    $('.event_response').click(function() {
        var int_visiting_prob = this.id;
        var data = {'txt_visitor_name': txt_visitor_name, 'int_visitor_id': int_visitor_id, 'int_event_id': int_event_id, 'int_visiting_prob': int_visiting_prob};
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
