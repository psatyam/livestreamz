<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.		

header('Pragma: no-cache'); // HTTP 1.0.

header('Expires: 0'); // Proxies

$user = $this->session->userdata('user');


include("header.php");
?>
<section class="row pricing">
    <div class="container">
        <div class="row ticket_pricing">
                        <div class="sec_header_left">
                            <h2><?php echo $sub_heading;?></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod to end.</p>
                        </div>
            <div class="row m0 pricing_table">
                <div class="col-sm-8 table_part">



                    <?php
                    include("$page" . ".php");
                    ?>
                </div>
                <div class="col-sm-4 table_part">
                    <div class="table_part_inner">
                        <div class="table_head">
                            <h2>My Account</h2>
                            <h6></h6>
                        </div>
                        <ul class="nav">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="<?php echo site_url() ?>/content/accountOrg">Organization</a></li>
                            <li><a href="<?php echo site_url() ?>/content/accountEvents">Events</a></li>
                            <li><a href="<?php echo site_url() ?>/jobs">Jobs</a></li>
                            <li><a href="<?php echo site_url() ?>/content/accountAnnouncements">Announcement</a></li>
                            <li><a href="<?php echo site_url() ?>/gallery">Gallery</a></li>
                            <li><a href="<?php echo site_url() ?>/blogs">Blogs</a></li>
                        </ul>
                        <!--                        <div class="buton">
                                                    <a href="#">buy now!</a>
                                                </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
//include("sidebar.php");


include("footer.php");
?>

</body>