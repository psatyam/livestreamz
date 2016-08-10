<style>
    .contact .contact_form .form-inline input {
        border: 1px solid #c2c2c2;
        border-radius: 10px;
        float: left;
        height: 60px;
        margin-bottom: 30px;
        padding: 20px 25px;
        width: 355px;
    }
    .contact .contact_form .form-inline select {
        border: 1px solid #c2c2c2;
        border-radius: 10px;
        float: left;
        height: 60px;
        margin-bottom: 30px;
        padding: 20px 25px;
        width: 355px;
    }
    .contact .contact_form .form-inline button {
        background: #e74c3c none repeat scroll 0 0;
        border-radius: 50px;
        color: #fff;
        display: inline-block;
        font: 14px/1 "Montserrat",sans-serif;
        padding: 20px 40px;
        text-transform: capitalize;
    }
</style>
<?php // print_r($orgData);exit; ?>
<section class="row events_schedule">
    <div class="container">

        <div class="row events_schedule_content">
            <div class="events_schedule_tab">
                <!--                    <ul class="nav schedules col-md-2 col-sm-3">
                                        
                                    </ul>-->
                <div class="tab-content col-md-8 col-sm-8">
                    <div id="home" role="tabpanel" class="tab-pane fade in active">
                        <div class="close_menu">
                            <a class="btn btn-success add_event pull-right">Add Events</a>
                        </div>
                        <div class="item_hover">

                            <?php
                            if (isset($eventData) && !empty($eventData)) {
                                foreach ($eventData as $key => $event) {
//                                    print_r($event);exit;
                                    ?>
                                    <div class="image_hover">
                                        <img src="<?php echo $event['txt_event_image']!=''?$event['txt_event_image']:'http://placehold.it/145x145"'?>" alt="#">
                                        <!--<a href="#">Learn More</a>-->
                                    </div>
                                    <div class="hover_content">
                                        <div class="row">
                                            <a href="#"><?php echo $event['txt_event_name'] ?></a>
                                        
                                            <h3 class=""><i class="fa fa-clock-o"></i><?php echo $event['ts_datetime'] ?></h3>
                                        <p><?php echo $event['txt_event_desc'] ?></p>
                                        <h3 class="pull-left"><i class="fa fa-user"></i><?php echo $event['user_name'] ?> (Founder, <?php echo $event['txt_name'] ?>)</h3>
                                        <h3><i class="fa fa-map-marker"></i><?php echo $event['txt_venue'] ?></h3>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } else { ?>
                                <div class="hover_content">
                                    <p>No Events..</p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
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
                <h4 class="modal-title" id="myModalLabel">Add Event</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form method="post" id="form_modal" action="<?php echo site_url() ?>/content/eventSave" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt_sector_name">Event Name<span style="color:#f00;">*</span></label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="hidden" name="int_event_id" id="int_event_id" value="">
                                    <input type="text" id="txt_event_name" name="txt_event_name" value="" class="form-control">
                                </div><!-- /.form-group -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt_sector_name">Event description<span style="color:#f00;">*</span></label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <textarea type="text" id="txt_event_desc" name="txt_event_desc" value="" class="form-control"></textarea>
                                </div><!-- /.form-group -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt_sector_name">Event Date<span style="color:#f00;">*</span></label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" id="ts_datetime" name="ts_datetime" value="" class="form-control">
                                </div><!-- /.form-group -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt_venue">Event Venue<span style="color:#f00;">*</span></label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" id="txt_venue" name="txt_venue" value="" class="form-control">
                                </div><!-- /.form-group -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt_event_image">Event Image<span style="color:#f00;">*</span></label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="file" id="txt_event_image" name="txt_event_image" value="" class="form-control">
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
    $('.add_event').click(function() {
        $('form input').val('');
        $('form textarea').val('');
        $('#myModal').modal('show');
    });
    $('#ts_datetime').datetimepicker({
        inline: true,
        sideBySide: true
    });
    $('#save_event').click(function() {
        if ($('#txt_event_name').val() == '') {
            $('#txt_event_name').css('border', '1px solid #ff0000');
//            alert('Please enter name');
        } else if ($('#txt_event_desc').val() == '') {
            $('#txt_event_desc').css('border', '1px solid #ff0000');
        } else if ($('#ts_datetime').val() == '') {
            $('#ts_datetime').css('border', '1px solid #ff0000');
        } else if ($('#txt_venue').val() == '') {
            $('#txt_venue').css('border', '1px solid #ff0000');
        } else {
            $('#form_modal').submit();
        }
    });
</script>
<script>
    $('#save_org').click(function() {
        alert();
        if ($('#txt_name').val() == '') {
            alert('please enter name');
            return false;
        }
        else if ($('#txt_field').val() == '') {
            alert('please select Field');
            return false;
        }
        else if ($('#txt_address').val() == '') {
            alert('please enter name');
            return false;
        }
        else if ($('#txt_contact_no').val() == '') {
            alert('please enter name');
            return false;
        }
        else {
            $('#orgForm').submit();

        }

    });
</script>



