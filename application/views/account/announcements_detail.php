
<?php // print_r($user);exit;    ?>
<section class="row advanced">
    <div class="container">
        <div class="row advanced_bg">
            <div class="col-md-8 advanced_left">
                <div class="advanced_left_inner">
                    <h3><?php echo $announcement_details['txt_topic']; ?></h3>
                    <p><?php echo $announcement_details['txt_description']; ?></p>
                    <ul class="nav">
                        <li><a href="#"><i class="fa fa-clock-o"></i><span><?php echo $announcement_details['ts_datetime'] ?></span></a></li>
                        <li><a href="#"><i class="fa fa-user"></i><span><?php echo $announcement_details['user_name'] ?></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 advanced_right">
                <img src="<?php echo $announcement_details['txt_announcement_image'] ?>" alt="#" height='450' width='310'>

            </div>
        </div>
    </div>
</section>

