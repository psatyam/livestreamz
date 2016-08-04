<div class="divide80"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div role="tabpanel" class="login-regiter-tabs">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs text-center" role="tablist">
                            <li role="presentation" class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">Login</a></li>
                            <li role="presentation"><a href="#profile" id="href-register" aria-controls="profile" role="tab" data-toggle="tab">Register</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="login">
                                <form method="POST" action="<?php echo site_url()?>/user/loginSub">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="txt_email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="txt_password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                    </div>                                  
                                    <div class="pull-left">

                                        <p><a href="#">Forget password?</a></p>

                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-theme-dark">Login</button>
                                    </div>                                     
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <a href="<?php echo $login_url?>" id="btn_facebook"  name="btn_facebook" class="btn" style="background-color: #3b5998;color: #fff;" >Login via Facebook</a>                                        
                                    </div>
                                </form>
                            </div><!--login tab end-->
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <form method="POST" action="<?php echo site_url()?>/user/registerSub">
                                    <div class="form-group">
                                        <label for="exampleInputname">First Name</label>
                                        <input type="text" name="txt_fname" class="form-control" id="exampleInputname" placeholder="Enter First Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputname">Last Name</label>
                                        <input type="text" name="txt_lname" class="form-control" id="exampleInputname" placeholder="Enter Last Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail11">Email address</label>
                                        <input type="email" name="txt_email" class="form-control" id="exampleInputEmail11" placeholder="Enter email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword11">Password</label>
                                        <input type="password" name="txt_password" class="form-control" id="exampleInputPassword11" placeholder="Password" required>
                                    </div>    
                                    <div class="form-group">
                                        <label for="exampleInputPassword111">Re-Password</label>
                                        <input type="password" name="txt_conf_password" class="form-control" id="exampleInputPassword111" placeholder="Password" required>
                                    </div> 
                                    <div class="pull-left checkbox">
                                        <label>
                                            <input type="checkbox" required> Accept terms & condition.
                                        </label>

                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-theme-dark btn-lg">Register</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div><!--register tab end-->
                        </div>

                    </div>
                </div>
            </div>
        </div>
<script>
    $(document).ready(function(){
    <?php if($this->uri->segment(3)=='register'){?>
        $("#href-register").trigger("click");
    <?php }?>
    });
</script>