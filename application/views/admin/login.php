<!DOCTYPE html>
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    
<!--  /login.html   29:52 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LiveStreamz</title>
        <!-- Vendor CSS -->
        <link href="<?php echo base_url()?>admin_assets/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>admin_assets/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- CSS -->
        <link href="<?php echo base_url()?>admin_assets/css/app_1.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>admin_assets/css/app_2.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="login-content">
            <!-- Login -->
            
            <div class="lc-block toggled" id="l-login">
            <form method="POST" action="<?php echo site_url()?>/user/loginSub" id="form1">
                <div class="lcb-form">
                    <div class="input-group m-b-20">
                        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                        <div class="fg-line">
                            <input type="text" id="username" name="txt_username" class="form-control" placeholder="Username">
                        </div>
                    </div>

                    <div class="input-group m-b-20">
                        <span class="input-group-addon"><i class="zmdi zmdi-male"></i></span>
                        <div class="fg-line">
                            <input type="password" id="password" name="txt_password" class="form-control" placeholder="Password">
                        </div>
                    </div>

                    <!-- <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            <i class="input-helper"></i>
                            Keep me signed in
                        </label>
                    </div> -->

                    <a href="#" class="btn btn-login btn-success btn-float" id="btn_login"><i class="zmdi zmdi-arrow-forward"></i></a>
                </div>

                <div class="lcb-navigation">
                    <a href="#" data-ma-action="login-switch" data-ma-block="#l-register"><i class="zmdi zmdi-plus"></i> <span>Register</span></a>
                    <a href="#" data-ma-action="login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
                </div>
                <div class="form-group">
                    <a href="<?php echo $login_url?>" id="btn_facebook"  name="btn_facebook" class="btn" style="background-color: #3b5998;color: #fff;" >Login via Facebook</a>                                        
                </div>
                </form>
            </div>
            
            <!-- Register -->
            
            <div class="lc-block" id="l-register">
            <form method="POST" action="<?php echo site_url()?>/user/registerSub" id="form2">
                <div class="lcb-form">
                    <div class="input-group m-b-20">
                        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                        <div class="fg-line">
                            <input type="text" class="form-control" id="reg_username" name="txt_username" placeholder="Username">
                        </div>
                    </div>

                    <div class="input-group m-b-20">
                        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                        <div class="fg-line">
                            <input type="text" class="form-control" id="reg_email" name="txt_email" placeholder="Email Address">
                        </div>
                    </div>
            
                    <div class="input-group m-b-20">
                        <span class="input-group-addon"><i class="zmdi zmdi-male"></i></span>
                        <div class="fg-line">
                            <input type="password" id="reg_password" name="txt_password" class="form-control" placeholder="Password">
                        </div>
                    </div>

                    <div class="input-group m-b-20">
                        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                        <div class="fg-line">
                            <input type="text" class="form-control" id="reg_name" name="txt_name" placeholder="Name">
                        </div>
                    </div>

                    <div class="input-group m-b-20">
                        <span class="input-group-addon"><i class="zmdi zmdi-phone"></i></span>
                        <div class="fg-line">
                            <input type="text" class="form-control" id="reg_phone" name="txt_phone" placeholder="Phone">
                        </div>
                    </div>

                    <a href="#" class="btn btn-login btn-success btn-float" id="btn_register"><i class="zmdi zmdi-check"></i></a>
                </div>

                <div class="lcb-navigation">
                    <a href="#" data-ma-action="login-switch" data-ma-block="#l-login"><i class="zmdi zmdi-long-arrow-right"></i> <span>Sign in</span></a>
                    <a href="#" data-ma-action="login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
                </div>
                <div class="form-group">
                    <a href="<?php echo $login_url?>" id="btn_facebook"  name="btn_facebook" class="btn" style="background-color: #3b5998;color: #fff;" >Login via Facebook</a>                                        
                </div>
                </form>
            </div>
            
            <!-- Forgot Password -->
            <div class="lc-block" id="l-forget-password">
                <div class="lcb-form">
                    <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu risus. Curabitur commodo lorem fringilla enim feugiat commodo sed ac lacus.</p>

                    <div class="input-group m-b-20">
                        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                        <div class="fg-line">
                            <input type="text" class="form-control" placeholder="Email Address">
                        </div>
                    </div>

                    <a href="#" class="btn btn-login btn-success btn-float"><i class="zmdi zmdi-check"></i></a>
                </div>

                <div class="lcb-navigation">
                    <a href="#" data-ma-action="login-switch" data-ma-block="#l-login"><i class="zmdi zmdi-long-arrow-right"></i> <span>Sign in</span></a>
                    <a href="#" data-ma-action="login-switch" data-ma-block="#l-register"><i class="zmdi zmdi-plus"></i> <span>Register</span></a>
                </div>
            </div>
        </div>


        <!-- Older IE warning message -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="img/browsers/chrome.png" alt="">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="img/browsers/firefox.png" alt="">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="img/browsers/ie.png" alt="">
                                <div>IE (New)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>
        <![endif]-->

        <!-- Javascript Libraries -->
        <script src="<?php echo base_url()?>admin_assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url()?>admin_assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <script src="<?php echo base_url()?>admin_assets/vendors/bower_components/Waves/dist/waves.min.js"></script>

        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url()?>admin_assets/js/app.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $("#btn_login").click(function(){
                if($("#username").val()!='' && $("#password").val()!=''){
                    $("#form1").submit();
                }
            });
            $("#btn_register").click(function(){
                if($("#reg_username").val()!='' && $("#reg_password").val()!='' && $("#reg_email").val()!=''){
                    $("#form2").submit();
                }
            });    
        });
        </script>
    </body>
</html>
