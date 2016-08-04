
<aside id="sidebar" class="sidebar c-overflow">
    <div class="s-profile">
        <a href="#" data-ma-action="profile-menu-toggle">
            <div class="sp-pic">
            <?php if($user['txt_profile_image']){?>
                <img src="<?php echo base_url().$user['txt_profile_image']?>" alt="">
                <?php }else{?>
                <img src="<?php echo base_url();?>uploads/no-image.png" alt="">
                <?php }?>
            </div>

            <div class="sp-info">
                <?php echo $user['txt_name']?>

                <i class="zmdi zmdi-caret-down"></i>
            </div>
        </a>

        <ul class="main-menu">
            <li>
                <a href="profile-about.html"><i class="zmdi zmdi-account"></i> View Profile</a>
            </li>
            <li>
                <a href="#"><i class="zmdi zmdi-input-antenna"></i> Privacy Settings</a>
            </li>
            <li>
                <a href="#"><i class="zmdi zmdi-settings"></i> Settings</a>
            </li>
            <li>
                <a href="<?php echo site_url().'/user/signout'?>"><i class="zmdi zmdi-time-restore"></i> Logout</a>
            </li>
        </ul>
    </div>

    <ul class="main-menu">
        <li class="active">
            <a href="index-2.html"><i class="zmdi zmdi-home"></i> Home</a>
        </li>
        <li class="sub-menu">
            <a href="#" data-ma-action="submenu-toggle"><i class="zmdi zmdi-view-compact"></i> Skills</a>

            <ul>
                <li><a href="#">Add</a></li>
                <li><a href="#">Manage</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="#" data-ma-action="submenu-toggle"><i class="zmdi zmdi-widgets"></i> Events</a>
            <ul>
                <li><a href="#">Add</a></li>
                <li><a href="#">Manage</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="#" data-ma-action="submenu-toggle"><i class="zmdi zmdi-widgets"></i> Jobs</a>
            <ul>
                <li><a href="#">Add</a></li>
                <li><a href="#">Manage</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="#" data-ma-action="submenu-toggle"><i class="zmdi zmdi-widgets"></i> Organizations</a>
            <ul>
                <li><a href="#">Add</a></li>
                <li><a href="#">Manage</a></li>
            </ul>
        </li>
        <li><a href="typography.html"><i class="zmdi zmdi-format-underlined"></i> Members</a></li>
        <li class="sub-menu">
            <a href="#" data-ma-action="submenu-toggle"><i class="zmdi zmdi-widgets"></i> Contacts</a>
            <ul>
                <li><a href="#">Add</a></li>
                <li><a href="#">Manage</a></li>
            </ul>
        </li>        
    </ul>
</aside>