
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <img src="<?php echo base_url('assets/pages/img/logo-big.png')?>" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN REGISTRATION FORM -->
            <form class="" action="<?php echo base_url('c_auth/forgotPassword'); ?>" method="post">
               <h3 class="font-green">Forget Password ?</h3>
               <?php echo $this->session->flashdata('message'); ?>
                <p> Enter your e-mail address below to reset your password. </p>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Full Name</label>
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" id="email" value="<?php echo set_value('email'); ?> "/>
                    <?php echo form_error('email', '<small class="text-danger">', '</small>');?>
                </div>
                <div class="form-actions">
                    <a href="<?= base_url('c_auth') ?>"><button type="button" id="back-btn" class="btn green btn-outline">Back</button></a>
                    <button type="submit" class="btn btn-success uppercase pull-right">Reset Password</button>
                </div> 
            <!-- END REGISTRATION FORM -->
        </div>