<div class="divide80"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 margin20">
                    <h3 class="heading"><?php echo $user_details['txt_fname']." ".$user_details['txt_lname'];?></h3>
                
                    <p><?php echo $user_details['txt_description']?></p>
                    <p><a href="#" class="btn border-black btn-lg">Follow</a></p>
                </div>
                <div class="col-md-6">
                    <img src="<?php echo ($user_details['txt_profile_image'])?base_url().$user_details['txt_profile_image']:base_url().'assets/img/mas-1.jpg'; ?>" class="img-responsive" alt="">
                </div>
            </div><!--about intro-->
            <div class="divide60"></div>
            <div class="row">
                <div class="col-md-4 margin20">
                    <h3 class="heading">About Me</h3>
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        <i class="fa fa-desktop"></i>    Basic Details
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p>Name: <?php echo $user_details['txt_fname']." ".$user_details['txt_lname']?></p>
                                    <p>Email: <?php echo $user_details['txt_email']?></p>
                                    <p>Cell No.: <?php echo $user_details['txt_cell_no']?></p>
                                    <p>Office Address.: <?php echo $user_details['txt_office_address']." ".$user_details['city_name']." ".$user_details['state_name']." ".$user_details['country_name']?></p>

                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        <i class="fa fa-crop"></i>    Professional Details
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Experience (Year): <?php echo $user_details['txt_experience']?></p>
                                    <p>Hourly Charges: <?php echo $user_details['txt_hourly_charge']?></p>
                                    <p>Roles: <?php echo $user_details['txt_fashion_community_roles']?></p>
                                    <p>Biographic Information: <?php echo $user_details['txt_biographic_info']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--why hire us-->
                <div class="col-md-4 margin20">
                    <h3 class="heading">Social Links</h3>
                    <div class="skills-wrapper wow animated bounceIn animated" data-wow-delay="0.2s">
                    <?php foreach ($social_details as $val) {?>
                           <div><strong><?php echo $val['txt_title']?> : </strong><?php echo $val['txt_url']?></div>            
                    <?php }?>                        
                    </div><!--skills-->
                </div><!--col-->
                <div class="col-md-4 margin20">
                    <h3 class="heading">Business Information</h3>
					<?php foreach($business_details as $val){?>
					<div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        <i class="fa fa-desktop"></i>    Business Details
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                   <div>Name:<?php echo $val['txt_name']?></div>
                                <div>Description:<?php echo $val['txt_description']?></div>
                                <div>Website:<?php echo $val['txt_website']?></div>
								 </div>
                            </div>
                        </div>
                    </div>
					 <?php } ?>
                </div>
            </div><!--row of skills collapse and highlights-->
            
            <h3 class="heading">Business Information</h3>
            <div id="masnory-container" class="cbp">
            <?php 
            foreach($media_details as $val){
                $profile_path=base_url().$val['txt_path'];
                ?>
                <div class="cbp-item identity">
                    <a class="cbp-caption cbp-lightbox" data-title="Easy Note<br>by Cosmin Capitanu" href="<?php echo $profile_path;?>">
                        <div class="cbp-caption-defaultWrap">
                            <img src="<?php echo $profile_path;?>" alt="">
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignCenter">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title"></div>
                                    <div class="cbp-l-caption-desc"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
               <?php } ?> 
            </div>

        </div><!--.container-->