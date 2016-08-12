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



    #tags{
        float:left;
        border:1px solid #ccc;
        padding:5px;
        font-family:Arial;
        width: 100%;
    }
    #tags > span{
        cursor:pointer;
        display:block;
        float:left;
        color:#fff;
        background:#789;
        padding:5px;
        padding-right:25px;
        margin:4px;
    }
    #tags > span:hover{
        opacity:0.7;
    }
    #tags > span:after{
        position:absolute;
        content:"×";
        border:1px solid;
        padding:2px 5px;
        margin-left:3px;
        font-size:11px;
    }
    #tags > input{
        background:#eee;
        border:0;
        margin:4px;
        padding:7px;
        width:auto;
    }
</style>
<?php // print_r($orgData);exit; ?>
<section class="row events_schedule">
    <div class="container">

        <div class="row events_schedule_content">
            <div class="events_schedule_tab">
                <!--                    <ul class="nav schedules col-md-2 col-sm-3">
                                        
                                    </ul>-->
                <div class="tab-content col-md-8 col-sm-8"  style="overflow-y: scroll;">
                    <div id="home" role="tabpanel" class="tab-pane fade in active" style="margin-top:-10%">
                        <div class="close_menu row">
                            <a class="btn btn-success add_event pull-right">Add Announcement</a>
                        </div>
                        <div class="item_hover" >

                            <?php
                            if (isset($announcementsData) && !empty($announcementsData)) {
                                foreach ($announcementsData as $key => $announcement) {
//                                    print_r($event);exit;
                                    ?>
                                    <div class="row">
                                        <div class="image_hover">
                                            <img src="<?php echo $announcement['txt_announcement_image'] != '' ? $announcement['txt_announcement_image'] : 'http://placehold.it/145x145"' ?>" alt="#">
                                            <!--<a href="#">Learn More</a>-->
                                        </div>
                                        <div class="hover_content">
                                            <a href="<?php echo site_url() ?>/content/announcement/<?php echo $announcement['int_announcement_id']?>"><?php echo $announcement['txt_topic'] ?></a>
                                            <p><?php echo $announcement['txt_description'] ?></p>
                                            <h3 class="pull-left"><i class="fa fa-user"></i><?php echo $announcement['user_name'] ?></h3>
                                            <!--<h3 class="pull-left" style="margin-left:10%"><i class="fa fa-map-marker"></i><?php // echo $event['txt_venue'] ?></h3>-->
                                            <h3 class="pull-right"><i class="fa fa-clock-o"></i><?php echo $announcement['ts_datetime'] ?></h3>
                                            
                                        </div>
                                    </div>
                            <hr>
                                <?php } ?>
                            <?php } else { ?>
                                <div class="hover_content">
                                    <p>No Announcements..</p>
                                </div>
                            <?php } ?>
                        </div>
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
                <h4 class="modal-title" id="myModalLabel">Add Announcement</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form method="post" id="form_modal" action="<?php echo site_url() ?>/content/announcementSave" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt_sector_name">Announcement Name<span style="color:#f00;">*</span></label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="hidden" name="int_announcement_id" id="int_announcement_id" value="">
                                    <input type="text" id="txt_topic" name="txt_topic" value="" class="form-control">
                                </div><!-- /.form-group -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt_sector_name">Announcement description<span style="color:#f00;">*</span></label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <textarea type="text" id="txt_description" name="txt_description" value="" class="form-control"></textarea>
                                </div><!-- /.form-group -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt_sector_name">Announcement Date<span style="color:#f00;">*</span></label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" id="ts_datetime" name="ts_datetime" value="" class="form-control">
                                </div><!-- /.form-group -->
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt_announcement_image">Announcement Image<span style="color:#f00;">*</span></label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="file" id="txt_announcement_image" name="txt_announcement_image" value="" class="form-control">
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
        if ($('#txt_topic').val() == '') {
            $('#txt_topic').css('border', '1px solid #ff0000');
        } else if ($('#txt_description').val() == '') {
            $('#txt_description').css('border', '1px solid #ff0000');
        } else if ($('#ts_datetime').val() == '') {
            $('#ts_datetime').css('border', '1px solid #ff0000');
        } else {
            $('#form_modal').submit();
        }
    });
</script>
<script>
    $('#save_org').click(function() {
//        alert();
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



