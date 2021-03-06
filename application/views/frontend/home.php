<?php // print_r($announcements);exit;   ?>
 <section class="row newsletter">
                        <div class="container">
                            <div class="row content">
                                <h2>Search For <span>Jobs</span></h2>
                                <form class="form-inline" method="get" action="<?php echo site_url() ?>/content/home">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="exampleInputAmount" name="job_query" placeholder="Search Query" value="<?php isset($_GET['job_query']) ? $_GET['job_query'] : '' ?>">
                                        <input type="submit" class="sub_btn" value="Search">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
<?php if (isset($jobs) && !empty($jobs)) { ?>
    <section class="row blogs" >
        <div class="container">
            <div class="sec_header_left">
                <h2>Matched Jobs</h2>
                <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod to end.</p>-->
            </div>
            <div class="row blogs_inner">
                <?php
//                echo '<pre>';
//                print_r($jobs);exit;
                foreach ($jobs as $job) {
                    ?>


                    <div class="blog_item" style="padding-bottom: 26px;">
                        <!--                <div class="item_image item_image_right">
                                            <img src="http://placehold.it/370x272" alt="#">
                                            <div class="item_icon item_icon_right">
                                                <a href="#"><i class="fa fa-file-video-o"></i></a>
                                            </div>
                                            
                                        </div>-->
                        <div class="item_describe item_describe_right">
                            <div class="media">
                                <!--                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object" src="<?php echo isset($job['txt_profile_image']) && $job['txt_profile_image'] != '' ? base_url() . $job['txt_profile_image'] : base_url() . 'uploads/no-image.png' ?>" alt="#">
                                                                                                        <div class="blog_time">
                                                                                                            <h2>10</h2>
                                                                                                            <h4>Nov</h4>
                                                                                                        </div>
                                                                    </a>
                                                                </div>-->
                                <div class="media-body">
                                    <a href="<?php echo site_url() ?>/jobs/job/<?php echo $job['int_job_id'] ?>" class="media-heading"><?php echo $job['txt_title'] ?></a>
                                    <ul class="nav">
                                        <li><a href="#" title="Recruiter Name"><i class="fa fa-user"></i><span><?php echo $job['user_name'] ?> (Founder, <?php echo $job['org_name'] ?>)</span></a></li>
                                        <li><a href="#" title="Job Location"><i class="fa fa-map-marker"></i><span><?php echo $job['txt_location'] ?></span></a></li>
                                        <li><a href="#" title="Job Expiry"><i class="fa fa-clock-o"></i><span><?php echo $job['dt_expire'] ?></span></a></li>
                                        <li><a href="#" title="Vacancy"><i class="fa fa-users"></i><span><?php echo $job['int_opening_counts'] ?></span></a></li>
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
<?php } ?>
<section class="row speakers">
    <div class="container">
        <div class="row sec_header_left">
            <h2>Recent Events</h2>
            <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod to end.</p>-->
        </div>
        <div class="row slider_area speakers_slider_area pb0">
            <!-- Place somewhere in the <body> of your page -->
            <div id="slider" class="flexslider">
                <ul class="slides">
<?php foreach ($events as $event) { ?>
                        <li>

                            <img src="<?php echo isset($event['txt_event_image']) ? $event['txt_event_image'] : 'http://placehold.it/584x454' ?>" alt="#" width="584" height="454">
                            <div class="speakers_right">
                                <h4><a href="<?php echo site_url() ?>/content/event/<?php echo $event['int_event_id'] ?>"><?php echo $event['txt_event_name']; ?></a></h4>
                                <h6><i class="fa fa-user"></i><?php echo $event['user_name'] ?></h6>
                                <p><?php echo $event['txt_event_desc']; ?></p>
                                <!--<h5><i class="fa fa-list"></i> Will Speak in Following Events:</h5>-->
                                <ul class="nav following_events">
                                    <li><h6 class="pull-left"><i class="fa fa-map-marker"></i><?php echo $event['txt_venue'] ?></h6></li>
                                    <li><h6 class="pull-right"><i class="fa fa-clock-o"></i><?php echo $event['ts_datetime'] ?></h6></li>
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
                        </li>
<?php } ?>

                    <!-- items mirrored twice, total of 12 -->
                </ul>
            </div>
            <div id="carousel-2" class="flexslider">
                <ul class="slides">
<?php foreach ($events as $event) { ?>
                        <li>
                            <img src="<?php echo isset($event['txt_event_image']) ? $event['txt_event_image'] : 'http://placehold.it/140x140' ?>" alt="<?php $event['txt_event_name']; ?>" width="140" height="240">
                        </li>
<?php } ?>
                    <!-- items mirrored twice, total of 12 -->
                </ul> 
                <div class="custom-navigation">
                    <a href="#flex-next" class="flex-prev"><i class="fa fa-angle-left"></i></a>
                    <a href="#flex-next" class="flex-next"><i class="fa fa-angle-right"></i></a>
                </div>  
            </div> 
        </div>
    </div>
</section>

<section class="row speakers">
    <div class="container">
        <div class="row sec_header_left">
            <h2>Recent Announcements</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod to end.</p>
        </div>
        <div class="row slider_area speakers_slider_area pb0">
            <!-- Place somewhere in the <body> of your page -->
            <div id="slider1" class="flexslider">
                <ul class="slides">
<?php foreach ($announcements as $announcement) { ?>
                        <li>

                            <img src="<?php echo isset($announcement['txt_announcement_image']) && file_exists($announcement['txt_announcement_image']) ? $announcement['txt_announcement_image'] : 'http://placehold.it/584x454' ?>" alt="#" width="584" height="454">
                            <div class="speakers_right">
                                <h4><?php echo $announcement['txt_topic']; ?></h4>
                                <h6><i class="fa fa-user"></i><?php echo $announcement['user_name'] ?></h6>
                                <p><?php echo $announcement['txt_description']; ?></p>
                                <!--<h5><i class="fa fa-list"></i> Will Speak in Following Events:</h5>-->
                                <ul class="nav following_events">
                                    <!--<li><h6 class="pull-left"><i class="fa fa-map-marker"></i><?php // echo $announcement['txt_venue']   ?></h6></li>-->
                                    <li><h6 class="pull-right"><i class="fa fa-clock-o"></i><?php echo $announcement['ts_datetime'] ?></h6></li>
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
                        </li>
<?php } ?>

                    <!-- items mirrored twice, total of 12 -->
                </ul>
            </div>
            <div id="carousel1" class="flexslider">
                <ul class="slides">
<?php foreach ($announcements as $announcement) { ?>
                        <li>
                            <img src="<?php echo isset($announcement['txt_announcement_image']) && file_exists($announcement['txt_announcement_image']) ? $announcement['txt_announcement_image'] : 'http://placehold.it/140x140' ?>" alt="<?php $announcement['txt_topic']; ?>" width="140" height="240">
                        </li>
<?php } ?>
                    <!-- items mirrored twice, total of 12 -->
                </ul> 
                <div class="custom-navigation">
                    <a href="#flex-next" class="flex-prev"><i class="fa fa-angle-left"></i></a>
                    <a href="#flex-next" class="flex-next"><i class="fa fa-angle-right"></i></a>
                </div>  
            </div> 
        </div>
    </div>
</section>





<!--<section class="row event">
    <div class="container">
        <div class="row event_inside">
            <div class="col-md-8 event_left">
                <div class="row">
                    <div class="col-sm-6 event_describe">
                        <div class="media item">
                            <div class="media-left media-middle icon_side">
                                <a href="#">
                                    <i class="fa fa-gift"></i>
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Biggest Event</h4>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipisc, sed diam nonummy nibh euismod tincidunt laore dolore magna aliquam erat volutpat. </p>
                    </div>
                    <div class="col-sm-6 event_describe">
                        <div class="media item">
                            <div class="media-left media-middle icon_side">
                                <a href="#">
                                    <i class="fa fa-users"></i>
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">10 Countries Attend</h4>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipisc, sed diam nonummy nibh euismod tincidunt laore dolore magna aliquam erat volutpat. </p>
                    </div>
                    <div class="col-sm-6 event_describe">
                        <div class="media item">
                            <div class="media-left media-middle icon_side">
                                <a href="#">
                                    <i class="fa fa-ticket"></i>
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Online Tickets</h4>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipisc, sed diam nonummy nibh euismod tincidunt laore dolore magna aliquam erat volutpat. </p>
                    </div>
                    <div class="col-sm-6 event_describe">
                        <div class="media item">
                            <div class="media-left media-middle icon_side">
                                <a href="#">
                                    <i class="fa fa-film"></i>
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Video streaming</h4>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipisc, sed diam nonummy nibh euismod tincidunt laore dolore magna aliquam erat volutpat. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 event_right">
                <img src="images/event/1.png" alt="#">
            </div>
        </div>
    </div>
</section>

<section class="row events_schedule">
    <div class="container">
        <div class="row sec_header">
            <h2>Events Schedule</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod to end.</p>
        </div>
        <div class="row events_schedule_content">
            <div class="events_schedule_tab">
                <ul class="nav schedules col-md-2 col-sm-3">
                    <li class="active"><a data-toggle="tab" href="#home"><h3>Day 01 </h3><h6>08/03/2016</h6></a></li>
                    <li><a data-toggle="tab" href="#menu1"><h3>Day 02 </h3><h6>09/03/2016</h6></a></li>
                    <li><a data-toggle="tab" href="#menu2"><h3>Day 03 </h3><h6>10/03/2016</h6></a></li>
                    <li><a data-toggle="tab" href="#menu3"><h3>Day 04 </h3><h6>11/03/2016</h6></a></li>
                    <li><a data-toggle="tab" href="#menu4"><h3>Day 05 </h3><h6>12/03/2016</h6></a></li>
                </ul>
                <div class="tab-content col-md-10 col-sm-9">
                    <div class="close_menu">
                        <ul class="nav closemenu">
                            <li class="active"><a data-toggle="tab" href="#home">09.00 AM - 11.30 AM</a></li>
                            <li><a data-toggle="tab" href="#menu1"> 12.00 PM - 02.00 PM</a></li>
                            <li><a data-toggle="tab" href="#menu2">02.30 PM - 05.00 PM</a></li>
                            <li><a data-toggle="tab" href="#menu3">05.30 PM - 08.00 PM</a></li>
                        </ul>
                    </div>
                    <div id="home" role="tabpanel" class="tab-pane fade in active">
                        <div class="item_hover">
                            <div class="image_hover">
                                <img src="images/event_schedule/1.png" alt="#">
                                <a href="#">Learn More</a>
                            </div>
                            <div class="hover_content">
                                <a href="schedule.html">Basic to Advanced Web Design Tips &amp; Tricks</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incut  and  the labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation to it a ullo laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.</p>
                                <h3 class="pull-left"><i class="fa fa-user"></i>Touhida Moni (Founder, Lawem.com)</h3>
                                <h3><i class="fa fa-map-marker"></i>Hall # 2 (Windy Town)</h3>
                            </div>
                        </div>
                        <div class="item_hover">
                            <div class="image_hover">
                                <img src="images/event_schedule/2.png" alt="#">
                                <a href="#">Learn More</a>
                            </div>
                            <div class="hover_content">
                                <a href="schedule.html">Theme Development &amp; Design for ThemeForest</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incut  and  the labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation to it a ullo laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.</p>
                                <h3 class="pull-left"><i class="fa fa-user"></i>Touhida Moni (Founder, Lawem.com)</h3>
                                <h3><i class="fa fa-map-marker"></i>Hall # 2 (Windy Town)</h3>
                            </div>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade" role="tabpanel">
                        <div class="item_hover">
                            <div class="image_hover">
                                <img src="images/event_schedule/1.jpg" alt="#">
                                <a href="#">Learn More</a>
                            </div>
                            <div class="hover_content">
                                <a href="schedule.html">Theme Development &amp; Design for ThemeForest</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incut  and  the labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation to it a ullo laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.</p>
                                <h3 class="pull-left"><i class="fa fa-user"></i>Touhida Moni (Founder, Lawem.com)</h3>
                                <h3><i class="fa fa-map-marker"></i>Hall # 2 (Windy Town)</h3>
                            </div>
                        </div>
                        <div class="item_hover">
                            <div class="image_hover">
                                <img src="images/event_schedule/2.jpg" alt="#">
                                <a href="#">Learn More</a>
                            </div>
                            <div class="hover_content">
                                <a href="schedule.html">Basic to Advanced Web Design Tips &amp; Tricks</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incut  and  the labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation to it a ullo laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.</p>
                                <h3 class="pull-left"><i class="fa fa-user"></i>Touhida Moni (Founder, Lawem.com)</h3>
                                <h3><i class="fa fa-map-marker"></i>Hall # 2 (Windy Town)</h3>
                            </div>
                        </div>
                    </div>
                    <div id="menu2" role="tabpanel" class="tab-pane fade">
                        <div class="item_hover">
                            <div class="image_hover">
                                <img src="images/event_schedule/3.jpg" alt="#">
                                <a href="#">Learn More</a>
                            </div>
                            <div class="hover_content">
                                <a href="schedule.html">Basic to Advanced Web Design Tips &amp; Tricks</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incut  and  the labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation to it a ullo laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.</p>
                                <h3 class="pull-left"><i class="fa fa-user"></i>Touhida Moni (Founder, Lawem.com)</h3>
                                <h3><i class="fa fa-map-marker"></i>Hall # 2 (Windy Town)</h3>
                            </div>
                        </div>
                        <div class="item_hover">
                            <div class="image_hover">
                                <img src="images/event_schedule/4.jpg" alt="#">
                                <a href="#">Learn More</a>
                            </div>
                            <div class="hover_content">
                                <a href="schedule.html">Theme Development &amp; Design for ThemeForest</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incut  and  the labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation to it a ullo laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.</p>
                                <h3 class="pull-left"><i class="fa fa-user"></i>Touhida Moni (Founder, Lawem.com)</h3>
                                <h3><i class="fa fa-map-marker"></i>Hall # 2 (Windy Town)</h3>
                            </div>
                        </div>
                    </div>
                    <div id="menu3" role="tabpanel" class="tab-pane fade">
                        <div class="item_hover">
                            <div class="image_hover">
                                <img src="images/event_schedule/5.jpg" alt="#">
                                <a href="#">Learn More</a>
                            </div>
                            <div class="hover_content">
                                <a href="schedule.html">Theme Development &amp; Design for ThemeForest</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incut  and  the labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation to it a ullo laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.</p>
                                <h3 class="pull-left"><i class="fa fa-user"></i>Touhida Moni (Founder, Lawem.com)</h3>
                                <h3><i class="fa fa-map-marker"></i>Hall # 2 (Windy Town)</h3>
                            </div>
                        </div>
                        <div class="item_hover">
                            <div class="image_hover">
                                <img src="images/event_schedule/6.jpg" alt="#">
                                <a href="#">Learn More</a>
                            </div>
                            <div class="hover_content">
                                <a href="schedule.html">Basic to Advanced Web Design Tips &amp; Tricks</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incut  and  the labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation to it a ullo laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.</p>
                                <h3 class="pull-left"><i class="fa fa-user"></i>Touhida Moni (Founder, Lawem.com)</h3>
                                <h3><i class="fa fa-map-marker"></i>Hall # 2 (Windy Town)</h3>
                            </div>
                        </div>
                    </div>
                    <div id="menu4" role="tabpanel" class="tab-pane fade">
                        <div class="item_hover">
                            <div class="image_hover">
                                <img src="images/event_schedule/7.jpg" alt="#">
                                <a href="#">Learn More</a>
                            </div>
                            <div class="hover_content">
                                <a href="schedule.html">Basic to Advanced Web Design Tips &amp; Tricks</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incut  and  the labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation to it a ullo laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.</p>
                                <h3 class="pull-left"><i class="fa fa-user"></i>Touhida Moni (Founder, Lawem.com)</h3>
                                <h3><i class="fa fa-map-marker"></i>Hall # 2 (Windy Town)</h3>
                            </div>
                        </div>
                        <div class="item_hover">
                            <div class="image_hover">
                                <img src="images/event_schedule/2.jpg" alt="#">
                                <a href="#">Learn More</a>
                            </div>
                            <div class="hover_content">
                                <a href="schedule.html">Theme Development &amp; Design for ThemeForest</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incut  and  the labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation to it a ullo laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.</p>
                                <h3 class="pull-left"><i class="fa fa-user"></i>Touhida Moni (Founder, Lawem.com)</h3>
                                <h3><i class="fa fa-map-marker"></i>Hall # 2 (Windy Town)</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="row newsletter">
    <div class="container">
        <div class="row content">
            <h2>Subscribe to <span>Newsletter</span> &amp; Get Event Updates</h2>
            <form class="form-inline">
                <div class="input-group">
                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Your email address..">
                    <a href="#" class="sub_btn">subscribe</a>
                </div>
            </form>
        </div>
    </div>
</section> 

<section class="row speakers">
    <div class="container">
        <div class="row sec_header_left">
            <h2>Our Speakers</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod to end.</p>
        </div>
        <div class="row slider_area">
             Place somewhere in the <body> of your page 
            <div id="slider" class="flexslider">
                <ul class="slides">
                    <li>
                        <img src="images/speakers/1.jpg" alt="#">
                        <div class="speakers_right">
                            <h4>Ashiful Haque Pappu</h4>
                            <h6>Public Speaker &amp; Motivator</h6>
                            <p>Vestibulum varius fermentum risus vitae lacinia neque auctor nec. Nunc ac a rutrum nulla. Nulla maximus dolor in quam euismod ac viverra libero.</p>
                            <h5><i class="fa fa-list"></i> Will Speak in Following Events:</h5>
                            <ul class="nav following_events">
                                <li><a href="schedule.html"><span>1</span>Specify the background color for the icon-boxed</a></li>
                                <li><a href="schedule.html"><span>2</span>Use each set with either 1-4 items per column</a></li>
                                <li><a href="schedule.html"><span>3</span>Use font awesome icons or your own image</a></li>
                                <li><a href="schedule.html"><span>4</span>Easily specify the icon color, circle color</a></li>
                            </ul>
                            <ul class="nav followers">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <img src="images/speakers/2.jpg" alt="#">
                        <div class="speakers_right">
                            <h4>Ashiful Haque Pappu</h4>
                            <h6>Public Speaker &amp; Motivator</h6>
                            <p>Vestibulum varius fermentum risus vitae lacinia neque auctor nec. Nunc ac a rutrum nulla. Nulla maximus dolor in quam euismod ac viverra libero.</p>
                            <h5><i class="fa fa-list"></i> Will Speak in Following Events:</h5>
                            <ul class="nav following_events">
                                <li><a href="schedule.html"><span>1</span>Specify the background color for the icon-boxed</a></li>
                                <li><a href="schedule.html"><span>2</span>Use each set with either 1-4 items per column</a></li>
                                <li><a href="schedule.html"><span>3</span>Use font awesome icons or your own image</a></li>
                                <li><a href="schedule.html"><span>4</span>Easily specify the icon color, circle color</a></li>
                            </ul>
                            <ul class="nav followers">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <img src="images/speakers/3.jpg" alt="#">
                        <div class="speakers_right">
                            <h4>Ashiful Haque Pappu</h4>
                            <h6>Public Speaker &amp; Motivator</h6>
                            <p>Vestibulum varius fermentum risus vitae lacinia neque auctor nec. Nunc ac a rutrum nulla. Nulla maximus dolor in quam euismod ac viverra libero.</p>
                            <h5><i class="fa fa-list"></i> Will Speak in Following Events:</h5>
                            <ul class="nav following_events">
                                <li><a href="schedule.html"><span>1</span>Specify the background color for the icon-boxed</a></li>
                                <li><a href="schedule.html"><span>2</span>Use each set with either 1-4 items per column</a></li>
                                <li><a href="schedule.html"><span>3</span>Use font awesome icons or your own image</a></li>
                                <li><a href="schedule.html"><span>4</span>Easily specify the icon color, circle color</a></li>
                            </ul>
                            <ul class="nav followers">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <img src="images/speakers/4.jpg" alt="#">
                        <div class="speakers_right">
                            <h4>Ashiful Haque Pappu</h4>
                            <h6>Public Speaker &amp; Motivator</h6>
                            <p>Vestibulum varius fermentum risus vitae lacinia neque auctor nec. Nunc ac a rutrum nulla. Nulla maximus dolor in quam euismod ac viverra libero.</p>
                            <h5><i class="fa fa-list"></i> Will Speak in Following Events:</h5>
                            <ul class="nav following_events">
                                <li><a href="schedule.html"><span>1</span>Specify the background color for the icon-boxed</a></li>
                                <li><a href="schedule.html"><span>2</span>Use each set with either 1-4 items per column</a></li>
                                <li><a href="schedule.html"><span>3</span>Use font awesome icons or your own image</a></li>
                                <li><a href="schedule.html"><span>4</span>Easily specify the icon color, circle color</a></li>
                            </ul>
                            <ul class="nav followers">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <img src="images/speakers/8.jpg" alt="#">
                        <div class="speakers_right">
                            <h4>Ashiful Haque Pappu</h4>
                            <h6>Public Speaker &amp; Motivator</h6>
                            <p>Vestibulum varius fermentum risus vitae lacinia neque auctor nec. Nunc ac a rutrum nulla. Nulla maximus dolor in quam euismod ac viverra libero.</p>
                            <h5><i class="fa fa-list"></i> Will Speak in Following Events:</h5>
                            <ul class="nav following_events">
                                <li><a href="schedule.html"><span>1</span>Specify the background color for the icon-boxed</a></li>
                                <li><a href="schedule.html"><span>2</span>Use each set with either 1-4 items per column</a></li>
                                <li><a href="schedule.html"><span>3</span>Use font awesome icons or your own image</a></li>
                                <li><a href="schedule.html"><span>4</span>Easily specify the icon color, circle color</a></li>
                            </ul>
                            <ul class="nav followers">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <img src="images/speakers/6.jpg" alt="#">
                        <div class="speakers_right">
                            <h4>Ashiful Haque Pappu</h4>
                            <h6>Public Speaker &amp; Motivator</h6>
                            <p>Vestibulum varius fermentum risus vitae lacinia neque auctor nec. Nunc ac a rutrum nulla. Nulla maximus dolor in quam euismod ac viverra libero.</p>
                            <h5><i class="fa fa-list"></i> Will Speak in Following Events:</h5>
                            <ul class="nav following_events">
                                <li><a href="schedule.html"><span>1</span>Specify the background color for the icon-boxed</a></li>
                                <li><a href="schedule.html"><span>2</span>Use each set with either 1-4 items per column</a></li>
                                <li><a href="schedule.html"><span>3</span>Use font awesome icons or your own image</a></li>
                                <li><a href="schedule.html"><span>4</span>Easily specify the icon color, circle color</a></li>
                            </ul>
                            <ul class="nav followers">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <img src="images/speakers/1.jpg" alt="#">
                        <div class="speakers_right">
                            <h4>Ashiful Haque Pappu</h4>
                            <h6>Public Speaker &amp; Motivator</h6>
                            <p>Vestibulum varius fermentum risus vitae lacinia neque auctor nec. Nunc ac a rutrum nulla. Nulla maximus dolor in quam euismod ac viverra libero.</p>
                            <h5><i class="fa fa-list"></i> Will Speak in Following Events:</h5>
                            <ul class="nav following_events">
                                <li><a href="schedule.html"><span>1</span>Specify the background color for the icon-boxed</a></li>
                                <li><a href="schedule.html"><span>2</span>Use each set with either 1-4 items per column</a></li>
                                <li><a href="schedule.html"><span>3</span>Use font awesome icons or your own image</a></li>
                                <li><a href="schedule.html"><span>4</span>Easily specify the icon color, circle color</a></li>
                            </ul>
                            <ul class="nav followers">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <img src="images/speakers/2.jpg" alt="#">
                        <div class="speakers_right">
                            <h4>Ashiful Haque Pappu</h4>
                            <h6>Public Speaker &amp; Motivator</h6>
                            <p>Vestibulum varius fermentum risus vitae lacinia neque auctor nec. Nunc ac a rutrum nulla. Nulla maximus dolor in quam euismod ac viverra libero.</p>
                            <h5><i class="fa fa-list"></i> Will Speak in Following Events:</h5>
                            <ul class="nav following_events">
                                <li><a href="schedule.html"><span>1</span>Specify the background color for the icon-boxed</a></li>
                                <li><a href="schedule.html"><span>2</span>Use each set with either 1-4 items per column</a></li>
                                <li><a href="schedule.html"><span>3</span>Use font awesome icons or your own image</a></li>
                                <li><a href="schedule.html"><span>4</span>Easily specify the icon color, circle color</a></li>
                            </ul>
                            <ul class="nav followers">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <img src="images/speakers/3.jpg" alt="#">
                        <div class="speakers_right">
                            <h4>Ashiful Haque Pappu</h4>
                            <h6>Public Speaker &amp; Motivator</h6>
                            <p>Vestibulum varius fermentum risus vitae lacinia neque auctor nec. Nunc ac a rutrum nulla. Nulla maximus dolor in quam euismod ac viverra libero.</p>
                            <h5><i class="fa fa-list"></i> Will Speak in Following Events:</h5>
                            <ul class="nav following_events">
                                <li><a href="schedule.html"><span>1</span>Specify the background color for the icon-boxed</a></li>
                                <li><a href="schedule.html"><span>2</span>Use each set with either 1-4 items per column</a></li>
                                <li><a href="schedule.html"><span>3</span>Use font awesome icons or your own image</a></li>
                                <li><a href="schedule.html"><span>4</span>Easily specify the icon color, circle color</a></li>
                            </ul>
                            <ul class="nav followers">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <img src="images/speakers/4.jpg" alt="#">
                        <div class="speakers_right">
                            <h4>Ashiful Haque Pappu</h4>
                            <h6>Public Speaker &amp; Motivator</h6>
                            <p>Vestibulum varius fermentum risus vitae lacinia neque auctor nec. Nunc ac a rutrum nulla. Nulla maximus dolor in quam euismod ac viverra libero.</p>
                            <h5><i class="fa fa-list"></i> Will Speak in Following Events:</h5>
                            <ul class="nav following_events">
                                <li><a href="schedule.html"><span>1</span>Specify the background color for the icon-boxed</a></li>
                                <li><a href="schedule.html"><span>2</span>Use each set with either 1-4 items per column</a></li>
                                <li><a href="schedule.html"><span>3</span>Use font awesome icons or your own image</a></li>
                                <li><a href="schedule.html"><span>4</span>Easily specify the icon color, circle color</a></li>
                            </ul>
                            <ul class="nav followers">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <img src="images/speakers/8.jpg" alt="#">
                        <div class="speakers_right">
                            <h4>Ashiful Haque Pappu</h4>
                            <h6>Public Speaker &amp; Motivator</h6>
                            <p>Vestibulum varius fermentum risus vitae lacinia neque auctor nec. Nunc ac a rutrum nulla. Nulla maximus dolor in quam euismod ac viverra libero.</p>
                            <h5><i class="fa fa-list"></i> Will Speak in Following Events:</h5>
                            <ul class="nav following_events">
                                <li><a href="schedule.html"><span>1</span>Specify the background color for the icon-boxed</a></li>
                                <li><a href="schedule.html"><span>2</span>Use each set with either 1-4 items per column</a></li>
                                <li><a href="schedule.html"><span>3</span>Use font awesome icons or your own image</a></li>
                                <li><a href="schedule.html"><span>4</span>Easily specify the icon color, circle color</a></li>
                            </ul>
                            <ul class="nav followers">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <img src="images/speakers/6.jpg" alt="#">
                        <div class="speakers_right">
                            <h4>Ashiful Haque Pappu</h4>
                            <h6>Public Speaker &amp; Motivator</h6>
                            <p>Vestibulum varius fermentum risus vitae lacinia neque auctor nec. Nunc ac a rutrum nulla. Nulla maximus dolor in quam euismod ac viverra libero.</p>
                            <h5><i class="fa fa-list"></i> Will Speak in Following Events:</h5>
                            <ul class="nav following_events">
                                <li><a href="schedule.html"><span>1</span>Specify the background color for the icon-boxed</a></li>
                                <li><a href="schedule.html"><span>2</span>Use each set with either 1-4 items per column</a></li>
                                <li><a href="schedule.html"><span>3</span>Use font awesome icons or your own image</a></li>
                                <li><a href="schedule.html"><span>4</span>Easily specify the icon color, circle color</a></li>
                            </ul>
                            <ul class="nav followers">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                    </li>
                     items mirrored twice, total of 12 
                </ul>
            </div>
            <div id="carousel" class="flexslider speaker_car">
                <ul class="slides">
                    <li>
                        <img src="images/speakers/thumbnail/1.jpg" alt="#">
                    </li>
                    <li>
                        <img src="images/speakers/thumbnail/2.jpg" alt="#">
                    </li>
                    <li>
                        <img src="images/speakers/thumbnail/3.jpg" alt="#">
                    </li>
                    <li>
                        <img src="images/speakers/thumbnail/4.jpg" alt="#">
                    </li>
                    <li>
                        <img src="images/speakers/thumbnail/17.jpg" alt="#">
                    </li>
                    <li>
                        <img src="images/speakers/thumbnail/6.jpg" alt="#">
                    </li>
                    <li>
                        <img src="images/speakers/thumbnail/1.jpg" alt="#">
                    </li>
                    <li>
                        <img src="images/speakers/thumbnail/2.jpg" alt="#">
                    </li>
                    <li>
                        <img src="images/speakers/thumbnail/3.jpg" alt="#">
                    </li>
                    <li>
                        <img src="images/speakers/thumbnail/4.jpg" alt="#">
                    </li>
                    <li>
                        <img src="images/speakers/thumbnail/17.jpg" alt="#">
                    </li>
                     items mirrored twice, total of 12 
                </ul> 
                <div class="custom-navigation">
                    <a href="#flex-next" class="flex-prev"><i class="fa fa-angle-left"></i></a>
                    <a href="#flex-next" class="flex-next"><i class="fa fa-angle-right"></i></a>
                </div>  
            </div>
        </div>
    </div>
</section>

<section class="row comment">
    <div class="container">
        <div class="row comment_box">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                 Wrapper for slides 
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div class="total_items">
                            <div class="col-sm-6 item_left">
                                <div class="item_bg">
                                    <p><span>“</span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna to  aliqua. I enim ad minim veniam, quis nostrud exercitation.</p>
                                </div>
                                <div class="media item_profile">
                                    <div class="media-left media-middle icon_side">
                                        <a href="#">
                                            <img src="images/comment/1.png" alt="#">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Nurjahan Mukty</h4>
                                        <h6>CTO, AsceticDesigners</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 item item_right">
                                <div class="item_bg">
                                    <p><span>“</span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna to  aliqua. I enim ad minim veniam, quis nostrud exercitation.</p>
                                </div>
                                <div class="media item_profile">
                                    <div class="media-left media-middle icon_side">
                                        <a href="#">
                                            <img src="images/comment/2.png" alt="#">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">ABdul Wadud</h4>
                                        <h6>CEO, FashionDesigners</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="total_items">
                            <div class="col-sm-6 item item_left">
                                <div class="item_bg">
                                    <p><span>“</span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna to  aliqua. I enim ad minim veniam, quis nostrud exercitation.</p>
                                </div>
                                <div class="media item_profile">
                                    <div class="media-left media-middle icon_side">
                                        <a href="#">
                                            <img src="images/comment/1.png" alt="#">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Nurjahan Mukty</h4>
                                        <h6>CTO, AsceticDesigners</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 item item_right">
                                <div class="item_bg">
                                    <p><span>“</span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna to  aliqua. I enim ad minim veniam, quis nostrud exercitation.</p>
                                </div>
                                <div class="media item_profile">
                                    <div class="media-left media-middle icon_side">
                                        <a href="#">
                                            <img src="images/comment/2.png" alt="#">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">ABdul Wadud</h4>
                                        <h6>CEO, FashionDesigners</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="total_items">
                            <div class="col-sm-6 item item_left">
                                <div class="item_bg">
                                    <p><span>“</span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna to  aliqua. I enim ad minim veniam, quis nostrud exercitation.</p>
                                </div>
                                <div class="media item_profile">
                                    <div class="media-left media-middle icon_side">
                                        <a href="#">
                                            <img src="images/comment/1.png" alt="#">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Nurjahan Mukty</h4>
                                        <h6>CTO, AsceticDesigners</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 item item_right">
                                <div class="item_bg">
                                    <p><span>“</span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna to  aliqua. I enim ad minim veniam, quis nostrud exercitation.</p>
                                </div>
                                <div class="media item_profile">
                                    <div class="media-left media-middle icon_side">
                                        <a href="#">
                                            <img src="images/comment/2.png" alt="#">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">ABdul Wadud</h4>
                                        <h6>CEO, FashionDesigners</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->
<!--
<section class="row pricing">
    <div class="container">
        <div class="row ticket_pricing">
            <div class="sec_header">
                <h2>Tickets Pricing</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod to end.</p>
            </div>
            <div class="row m0 pricing_table">
                <div class="col-sm-4 table_part">
                    <div class="table_part_inner">
                        <div class="table_head">
                            <h2>&#36; 9.99</h2>
                            <h6>silver pass</h6>
                        </div>
                        <ul class="nav">
                            <li><a href="#">Front Seats</a></li>
                            <li><a href="#">Free Entrance</a></li>
                            <li><a href="#">Free Snacks</a></li>
                            <li><a href="#">Free Checkouts</a></li>
                            <li><a href="#">1x Speech Listening</a></li>
                        </ul>
                        <div class="buton">
                            <a href="#">buy now!</a>
                        </div>

                    </div>
                </div>
                <div class="col-sm-4 table_part">
                    <div class="table_part_inner">
                        <div class="table_head">
                            <h2>$ 19.99</h2>
                            <h6>early bird</h6>
                            <i class="fa fa-bookmark"></i>
                        </div>
                        <ul class="nav">
                            <li><a href="#">Front Seats</a></li>
                            <li><a href="#">Free Entrance</a></li>
                            <li><a href="#">VIP Badge</a></li>
                            <li><a href="#">Free Checkouts</a></li>
                            <li><a href="#">5x Speech Listening</a></li>
                        </ul>
                        <div class="buton">
                            <a href="#">buy now!</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 table_part">
                    <div class="table_part_inner">
                        <div class="table_head">
                            <h2>$ 29.99</h2>
                            <h6>gold pass</h6>
                        </div>
                        <ul class="nav">
                            <li><a href="#">Front Seats</a></li>
                            <li><a href="#">Free Entrance</a></li>
                            <li><a href="#">Free Snacks</a></li>
                            <li><a href="#">VIP lounge</a></li>
                            <li><a href="#">10x Speech Listening</a></li>
                        </ul>
                        <div class="buton">
                            <a href="#">buy now!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="row ticket">
    <div class="container">
        <div class="row booking_ticket">
            <h2><span>Book</span> Your <span>Tickets</span> Now to Confirm Your Seat!</h2>
            <div class="register_form">
                <form class="form-inline">
                    <div class="form-group">
                        <label for="InputName"><i class="fa fa-user"></i></label>
                        <input type="text" class="form-control" id="InputName" placeholder="full name">
                    </div>
                    <div class="form-group">
                        <label for="InputEmail"><i class="fa fa-envelope"></i></label>
                        <input type="email" class="form-control" id="InputEmail" placeholder="email id">
                    </div>
                    <div class="form-group">
                        <label for="Inputphone"><i class="fa fa-phone"></i></label>
                        <input type="text" class="form-control" id="Inputphone" placeholder="phone no">
                    </div>
                    <a href="#">register now</a>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="row blog">
    <div class="container">
        <div class="row blog_inner">
            <div class="row m0 sec_header_left">
                <h2>Blog &amp; News</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod to end.</p>
            </div>
            <div class="row m0 blog_details">
                <div class="blog_details_left col-md-6">
                    <div class="blog_details_left_inner">
                        <div class="blog_text">
                            <h6>09 Nov, 2016</h6>
                            <a href="blog_post.html">Next Web Design  Event at Sunday</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna to aliqua. Ut enim ad mini veniam, quis nostrud exercitation ullamco.</p>
                        </div>
                    </div>
                </div>
                <div class="blog_details_right col-md-6">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <h2>09</h2>
                                <h4>Nov</h4>
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="blog_post.html" class="media-heading">Next Web Design  Event at Sunday</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus a aliquet orci. Ut interdum mauris sem, non aliquet felis inter.</p>
                            <a href="#">read more <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#" class="media-2">
                                <h2>16</h2>
                                <h4>Mar</h4>
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="blog_post.html" class="media-heading">Top 10 Tips for Graphics Designer</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus a aliquet orci. Ut interdum mauris sem, non aliquet felis inter.</p>
                            <a href="#">read more <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#" class="media-3">
                                <h2>25</h2>
                                <h4>May</h4>
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="blog_post.html" class="media-heading">Top 20 Tips for Web Developers</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus a aliquet orci. Ut interdum mauris sem, non aliquet felis inter.</p>
                            <a href="#">read more <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="row sponsor">
    <div class="container">
        <div class="row sponsor_inner">
            <h2>our <span>sponsors</span></h2>
            <div class="protfolio_content"> 
                <div class="gallery_filter">
                    <ul>
                        <li class="filter active" data-filter="all">silver sponsors</li>
                        <li class="filter" data-filter=".bedroom">gold sponsors</li>
                        <li class="filter" data-filter=".indoor">platinum sponsors</li> 
                    </ul>
                </div>
                <div class="gallery_item flexslider">
                    <ul class="slides">
                        <li class="mix item bedroom indoor garage Kitchen bathroom" data-my-order="1"> 
                            <img src="images/sponsors/01.png" alt="#"> 
                        </li>
                        <li class="mix item indoor basement Kitchen" data-my-order="2"> 
                            <img src="images/sponsors/02.png" alt="#">
                        </li>
                        <li class="mix item bedroom indoor basement bathroom" data-my-order="3">
                            <img src="images/sponsors/03.png" alt="#">
                        </li>
                        <li class="mix item bedroom garage Kitchen" data-my-order="4">
                            <img src="images/sponsors/04.png" alt="#">
                        </li>
                        <li class="mix item bedroom basement garage bathroom" data-my-order="5">
                            <img src="images/sponsors/05.png" alt="#">
                        </li>
                        <li class="mix item bedroom basement garage bathroom" data-my-order="5">
                            <img src="images/sponsors/06.png" alt="#">
                        </li>
                        <li class="mix item bedroom basement garage bathroom" data-my-order="5">
                            <img src="images/sponsors/01.png" alt="#">
                        </li>
                        <li class="mix item bedroom basement garage bathroom" data-my-order="5">
                            <img src="images/sponsors/02.png" alt="#">
                        </li>
                        <li class="mix item bedroom indoor basement bathroom" data-my-order="3">
                            <img src="images/sponsors/03.png" alt="#">
                        </li>
                        <li class="mix item bedroom indoor basement bathroom" data-my-order="3">
                            <img src="images/sponsors/05.png" alt="#">
                        </li>
                        <li class="mix item bedroom indoor garage Kitchen bathroom" data-my-order="1"> 
                            <img src="images/sponsors/06.png" alt="#"> 
                        </li>
                        <li class="mix item bedroom basement garage bathroom" data-my-order="5">
                            <img src="images/sponsors/01.png" alt="#">
                        </li>
                        <li class="mix item bedroom basement garage bathroom" data-my-order="5">
                            <img src="images/sponsors/02.png" alt="#">
                        </li>
                        <li class="mix item bedroom indoor basement bathroom" data-my-order="3">
                            <img src="images/sponsors/03.png" alt="#">
                        </li>
                        <li class="mix item bedroom basement bathroom" data-my-order="3">
                            <img src="images/sponsors/05.png" alt="#">
                        </li>
                        <li class="mix item bedroom indoor garage Kitchen bathroom" data-my-order="1"> 
                            <img src="images/sponsors/06.png" alt="#"> 
                        </li>
                        <li class="mix item bedroom basement garage bathroom" data-my-order="5">
                            <img src="images/sponsors/01.png" alt="#">
                        </li> 
                        <li class="mix item bedroom basement garage bathroom" data-my-order="5">
                            <img src="images/sponsors/01.png" alt="#">
                        </li>
                        <li class="mix item bedroom basement garage bathroom" data-my-order="5">
                            <img src="images/sponsors/02.png" alt="#">
                        </li>
                        <li class="mix item bedroom indoor basement bathroom" data-my-order="3">
                            <img src="images/sponsors/03.png" alt="#">
                        </li>
                        <li class="mix item bedroom basement bathroom" data-my-order="3">
                            <img src="images/sponsors/05.png" alt="#">
                        </li>
                        <li class="mix item bedroom indoor garage Kitchen bathroom" data-my-order="1"> 
                            <img src="images/sponsors/06.png" alt="#"> 
                        </li>
                        <li class="mix item bedroom basement garage bathroom" data-my-order="5">
                            <img src="images/sponsors/01.png" alt="#">
                        </li> 
                        <li class="mix item bedroom basement garage bathroom" data-my-order="5">
                            <img src="images/sponsors/01.png" alt="#">
                        </li>
                        <li class="mix item bedroom basement garage bathroom" data-my-order="5">
                            <img src="images/sponsors/02.png" alt="#">
                        </li>
                        <li class="mix item bedroom indoor basement bathroom" data-my-order="3">
                            <img src="images/sponsors/03.png" alt="#">
                        </li>
                        <li class="mix item bedroom basement bathroom" data-my-order="3">
                            <img src="images/sponsors/05.png" alt="#">
                        </li>
                        <li class="mix item bedroom indoor garage Kitchen bathroom" data-my-order="1"> 
                            <img src="images/sponsors/06.png" alt="#"> 
                        </li>
                        <li class="mix item bedroom basement garage bathroom" data-my-order="5">
                            <img src="images/sponsors/01.png" alt="#">
                        </li> 
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="row g_map">
     Map 
    <div id="map"></div> 

    <div class="container">
        <div class="row contact_info">
            <h3>LiveStreamz Contact Info:</h3>
            <div class="widget row m0">
                <ul>
                    <li>
                        <i class="fa fa-map-marker"></i>
                        <div class="location_address fleft">
                            House # 00, Road # 00, Block # ABC, <br>
                            Mirpur-11, Dhaka, Bangladesh.
                        </div>

                    </li>
                    <li>
                        <i class="fa fa-phone"></i>
                        <div class="fleft contact_no">
                            <a href="#">+88 01719 45 75 93</a> 
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-paper-plane"></i>
                        <div class="fleft contact_mail">
                            <a href="#">info@LiveStreamz.com</a>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-mobile"></i>
                        <div class="fleft service_time">
                            +88 01193 40 26 65
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-clock-o"></i>
                        <div class="fleft service_time">
                            09:00 AM - 08:00 PM
                        </div>
                    </li>
                </ul>
            </div>
            <ul class="nav followers">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
        </div>
    </div>
</section>-->
