
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <img src="<?php echo base_url('assets/pages/img/logo-big.png')?>" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN REGISTRATION FORM -->
            <form class="" action="<?php echo base_url('c_auth/registration'); ?>" method="post">
                <h3 class="font-green">Sign Up</h3>
                <p class="hint"> Enter your personal details below: </p>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Full Name</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="Full Name" name="name" id="name" value="<?php echo set_value('name'); ?>" />
                    <?php echo form_error('name', '<small class="text-danger">', '</small>');?>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" id="email" value="<?php echo set_value('email');?>" /> 
                    <?php echo form_error('email', '<small class="text-danger">', '</small>');?>
                </div>
                <p class="hint"> Enter your account details below: </p>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password1" name="password1" /> 
                    <?php echo form_error('password1', '<small class="text-danger">', '</small>');?>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="password2" id="password2" /> </div>
                <div class="form-actions">
                    <button type="submit" id="" class="btn btn-success uppercase pull-right">Submit</button>
                </div>
                <br>
                <br>
                	<div class="text-center">
                		<a class="small" href="<?php echo base_url('c_auth'); ?>">Already have an account ? Login !</a>
                	</div>
            </form>
            <!-- END REGISTRATION FORM -->
        </div>