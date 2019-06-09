
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <img src="<?php echo base_url('assets/pages/img/logo-big.png')?>" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="" action="<?php echo base_url('c_auth') ?>" method="post">
                <h3 class="form-title font-green">Sign In</h3>
                <?php echo $this->session->flashdata('message'); ?>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" placeholder="Username" name="email" id="email" value="<?php echo set_value('email'); ?> " /> 
                    <?php echo form_error('email', '<small class="text-danger">', '</small>');?>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" placeholder="Password" name="password" id="password" /> 
                    <?php echo form_error('password', '<small class="text-danger">', '</small>');?>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn green uppercase">Login</button>
                    <a href="<?= base_url('c_auth/forgotPassword'); ?>" id="forget-password" class="forget-password">Forgot Password?</a>
                </div>
                <div class="create-account">
                    <p>
                        <a href="<?php echo base_url('c_auth/registration'); ?>" id="register-btn" class="uppercase">Create an account</a>
                    </p>
                </div>
            </form>
            <!-- END LOGIN FORM -->
        </div>