
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <img src="<?php echo base_url('assets/pages/img/logo-big.png')?>" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN REGISTRATION FORM -->
            <form class="" action="<?php echo base_url('c_auth/changePassword'); ?>" method="post">
               <h3 class="font-green">Change Password for </h3>
               <h4 class="text-center"><?= $this->session->userdata('reset_email'); ?></h4>
               <?php echo $this->session->flashdata('message'); ?>
                <div class="form-group">
                    <label class="control-label">Password</label>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="New Password..." name="password1" id="password1"/>
                    <?php echo form_error('password1', '<small class="text-danger">', '</small>');?>
                </div>
                <div class="form-group">
                    <label class="control-label">Re-Type Password</label>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-Type Password..." name="password2" id="password2"/>
                    <?php echo form_error('password2', '<small class="text-danger">', '</small>');?>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success uppercase pull-right">Change Password</button>
                </div>
            <!-- END REGISTRATION FORM -->
        </div>