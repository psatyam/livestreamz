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
                            <a class="btn btn-success add_event pull-right">Add Events</a>
                        </div>
                        <div class="item_hover" >

                            <?php
                            if (isset($eventData) && !empty($eventData)) {
                                foreach ($eventData as $key => $event) {
//                                    print_r($event);exit;
                                    ?>
                                    <div class="row">
                                        <div class="image_hover">
                                            <img src="<?php echo $event['txt_event_image'] != '' ? $event['txt_event_image'] : 'http://placehold.it/145x145"' ?>" alt="">
                                            <!--<a href="#">Learn More</a>-->
                                        </div>
                                        <div class="hover_content">
                                            <a href="<?php echo site_url() ?>/content/event/<?php echo $event['int_event_id']?>"><?php echo $event['txt_event_name'] ?></a><span class="pull-right add_email" id="<?php echo $event['int_event_id'] ?>"><img src="<?php echo base_url() ?>images/event/send-invite-icon.png" height="20" width="20"></span>
                                            <p><?php echo $event['txt_event_desc'] ?></p>
                                            <h3 class="pull-left"><i class="fa fa-user"></i><?php echo $event['user_name'] ?></h3>
                                            <h3 class="pull-left" style="margin-left:10%"><i class="fa fa-map-marker"></i><?php echo $event['txt_venue'] ?></h3>
                                            <h3 class="pull-right"><i class="fa fa-clock-o"></i><?php echo $event['ts_datetime'] ?></h3>
                                        </div>
                                    </div>
                            <hr>
                                <?php } ?>
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
    </div>
</section>
<section class="row events_schedule">
    <div class="container">
        <div class="sec_header_left">
                <h2>Joined Events Schedule</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod to end.</p>
            </div>
        <div class="row events_schedule_content">
            <div class="events_schedule_tab">
                <!--                    <ul class="nav schedules col-md-2 col-sm-3">
                                        
                                    </ul>-->
                <div class="tab-content col-md-8 col-sm-8"  style="overflow-y: scroll;">
                    <div id="home" role="tabpanel" class="tab-pane fade in active" style="margin-top:-10%">
                        
                        <div class="item_hover" >

                            <?php
//                                                        print_r($joinEventData);exit;
                            if (isset($joinEventData) && !empty($joinEventData)) {
                                foreach ($joinEventData as $key => $joinEvent) {
//                                    print_r($event);exit;
                                    ?>
                                    <div class="row">
                                        <div class="image_hover">
                                            <img src="<?php echo $joinEvent['txt_event_image'] != '' ? $joinEvent['txt_event_image'] : 'http://placehold.it/145x145"' ?>" alt="#">
                                            <!--<a href="#">Learn More</a>-->
                                        </div>
                                        <div class="hover_content">
                                            <a href="<?php echo site_url() ?>/content/event/<?php echo $joinEvent['int_event_id']?>"><?php echo $joinEvent['txt_event_name'] ?></a>
                                            <span class="pull-right" style="<?php echo isset($joinEvent) && $joinEvent['int_visiting_prob'] == '1' ? 'color:#00ff00' : '#ff0000' ?>"><?php echo isset($joinEvent) && $joinEvent['int_visiting_prob'] == '1' ? 'Accepted' : 'Rejected' ?></span>
                                            <p><?php echo $joinEvent['txt_event_desc'] ?></p>
                                            <h3 class="pull-left"><i class="fa fa-user"></i><?php echo $joinEvent['user_name'] ?></h3>
                                            <h3 class="pull-left" style="margin-left:10%"><i class="fa fa-map-marker"></i><?php echo $joinEvent['txt_venue'] ?></h3>
                                            <h3 class="pull-right"><i class="fa fa-clock-o"></i><?php echo $joinEvent['ts_datetime'] ?></h3>
                                            
                                        </div>
                                    </div>
                                    <hr>
                                <?php } ?>
                            <?php } else { ?>
                                <div class="hover_content">
                                    <p>No Events Joined ..</p>
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
<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Email For Invite</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form method="post" id="form_modal_invite" action="<?php echo site_url() ?>/content/sendInvite" enctype="multipart/form-data">
                        <div class="form-group">
                            <!--<label class="col-sm-4 control-label" for="txt_sector_name">Event Name<span style="color:#f00;">*</span></label>-->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div id="tags">
                                        
                                        <input type="text" class="form-control" value="" placeholder="Add a Email" />
                                    </div>
                                    <input type="hidden" name="int_event_id" id="int_event_id_email" value="">
                                    <!--<input type="text" id="txt_emails" name="txt_emails" value="" class="form-control" placeholder="">-->
                                </div><!-- /.form-group -->
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <p>OR Share the link</p>
                    <p id="share_link" style="border: 1px aquamarine groove; background-color: #c2c2c2; "></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="send_invite" >Send</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() { // DOM ready

        // ::: TAGS BOX

        $("#tags input").on({
            focusout: function() {
                var txt = this.value.replace(/[^a-z0-9\+\-\.\#\@]/ig, ''); // allowed characters
                if (txt)
                    $("<span/>", {text: txt.toLowerCase(), insertBefore: this});
                this.value = "";
            },
            keyup: function(ev) {
                // if: comma|enter (delimit more keyCodes with | pipe)
                if (/(188|13)/.test(ev.which))
                    $(this).focusout();
            }
        });
        $('#tags').on('click', 'span', function() {
            if (confirm("Remove " + $(this).text() + "?"))
                $(this).remove();
        });

    });
    $('#send_invite').click(function() {
    var html='';
        $('#tags span').each(function(index) {
            html+="<input type='hidden' name='emails[]' value='"+$(this).text()+"'>";
            console.log(index + ": " + $(this).text());
        });
        $('#form_modal_invite').append(html);
        $('#form_modal_invite').submit();
        
        
    });


    $('.add_event').click(function() {
        $('form input').val('');
        $('form textarea').val('');
        $('#myModal').modal('show');
    });
    $('.add_email').click(function() {
        $('form input').val('');
//        $('form textarea').val('');
//alert(this.id);
        $('#int_event_id_email').val(this.id);
        $('#share_link').text('<?php echo site_url()?>/content/event/'+this.id);
        $('#emailModal').modal('show');
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



