<div class="page-wrapper-row full-height">
<div class="page-wrapper-middle">
<!-- BEGIN CONTAINER -->
<div class="page-container">
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
<!-- BEGIN CONTENT BODY -->
<!-- BEGIN PAGE HEAD-->
<div class="page-head">
<div class="container">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>User Profile
            <small>Halaman User Profile</small>
        </h1>
    </div>
</div>
</div>
<!-- END PAGE HEAD-->
<!-- BEGIN PAGE CONTENT BODY -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMBS -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">Pages</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>User</span>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMBS -->
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="page-content-inner">
                <div class="col-lg-12">
                    <?= $this->session->flashdata('message'); ?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN PROFILE SIDEBAR -->
                        <div class="profile-sidebar">
                            <!-- PORTLET MAIN -->
                            <div class="portlet light profile-sidebar-portlet ">
                                <!-- SIDEBAR USERPIC -->
                                <div class="profile-userpic">
                                        <img src="<?php echo base_url('assets/layouts/layout3/img/') . $user['image'];?>" class="img-responsive" > </div>
                                <!-- END SIDEBAR USERPIC -->
                                <!-- SIDEBAR USER TITLE -->
                                <div class="profile-usertitle">
                                    <div class="profile-usertitle-name"> <?= $user['first_name'] ."&nbsp;". $user['last_name']; ?> </div>
                                    <div class="profile-usertitle-job"> Developer </div>
                                </div>
                                <!-- END SIDEBAR USER TITLE -->
                                <!-- SIDEBAR MENU -->
                                <div class="profile-usermenu">
                                    <ul class="nav">
                                        <li>
                                            <a href="#">
                                                <i class="icon-home"></i> <?php echo $user['email']; ?> </a>
                                        </li>
                                        <li class="active">
                                            <a href="#">
                                                <i class="icon-settings"></i> Account Settings </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-clock"></i> Member since <?php echo date('d F Y', $user['date_created']); ?> </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- END MENU -->
                            </div>
                            <!-- END PORTLET MAIN -->
                        </div>
                        <!-- END BEGIN PROFILE SIDEBAR -->
                        <!-- BEGIN PROFILE CONTENT -->
                        <div class="profile-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light ">
                                        <div class="portlet-title tabbable-line">
                                            <div class="caption caption-md">
                                                <i class="icon-globe theme-font hide"></i>
                                                <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                            </div>
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                                </li>
                                                <li>
                                                    <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                                                </li>
                                                <li>
                                                    <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="tab-content">
                                                <!-- PERSONAL INFO TAB -->
                                                <div class="tab-pane active" id="tab_1_1">
                                                    <form role="form" method="POST" action="<?= base_url('c_user/edit'); ?>" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label class="control-label">First Name</label>
                                                            <input type="text" placeholder="First Name" class="form-control" id=frname name="frname" value="<?= $user['first_name']; ?>" />
                                                            <?php echo form_error('frname', '<small class="text-danger">', '</small>');?>
                                                        </div>
                                                            
                                                        <div class="form-group">
                                                            <label class="control-label">Last Name</label>
                                                            <input type="text" placeholder="Last Name" id="lsname" name="lsname" class="form-control" value="<?= $user['last_name']; ?>" /> 
                                                            <?php echo form_error('lsname', '<small class="text-danger">', '</small>');?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Email</label>
                                                            <input type="text" placeholder="Email" id="email" name="email" class="form-control" value="<?= $user['email']; ?>" readonly/> 
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Mobile Number</label>
                                                            <input type="text" placeholder="+1 646 580 DEMO (6284)" class="form-control" id="phone" name="phone" value="<?= $user['phone']; ?>" /> 
                                                            <?php echo form_error('phone', '<small class="text-danger">', '</small>');?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Website Url</label>
                                                            <input type="text" placeholder="http://www.mywebsite.com" class="form-control" id="website" name="website" value="<?= $user['website_url']; ?>" /> 
                                                            <?php echo form_error('website', '<small class="text-danger">', '</small>');?>
                                                        </div>
                                                        <div class="margin-top-10">
                                                            <button type="submit" class="btn green" name="submit1">
                                                                Save Changes
                                                            </button>
                                                            <a href="javascript:;" class="btn default"> Cancel </a>
                                                        </div>
                                                    <!-- </form> -->
                                                </div>
                                                <!-- END PERSONAL INFO TAB -->
                                                <!-- CHANGE AVATAR TAB -->
                                                <div class="tab-pane" id="tab_1_2">
                                                        <div class="form-group">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                    <img src="<?php echo base_url('assets/layouts/layout3/img/') . $user['image'];?>" alt=""  width="140px"/> </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                <div>
                                                                    <span class="btn default btn-file">
                                                                        <!-- <span class="fileinput-new"> Select image </span>
                                                                        <span class="fileinput-exists"> Change </span> -->
                                                                        <input type="hidden" placeholder="Email" id="email2" name="email2" class="form-control" value="<?= $user['email']; ?>"/>

                                                                        <input type="file" name="image" id="image" class="custom-file-input"> </span>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix margin-top-10">
                                                                <span class="label label-danger">NOTE! </span>
                                                                <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                                            </div>
                                                        </div>
                                                        <div class="margin-top-10">
                                                            <button type="submit" class="btn green" name="submit2">Submit</button>
                                                        </div>
                                                    <!-- </form> -->
                                                </div>
                                                <!-- END CHANGE AVATAR TAB -->
                                                <!-- CHANGE PASSWORD TAB -->
                                                <div class="tab-pane" id="tab_1_3">
                                                        <div class="form-group">
                                                            <label class="control-label">Current Password</label>
                                                            <input type="password" class="form-control" id="current_password" name="current_password" /> 
                                                            <?php echo form_error('current_password', '<small class="text-danger">', '</small>');?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">New Password</label>
                                                            <input type="password" class="form-control" id="new_password1" name="new_password1" /> 
                                                            <?php echo form_error('new_password1', '<small class="text-danger">', '</small>');?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Re-type New Password</label>
                                                            <input type="password" class="form-control" id="new_password2" name="new_password2" /> 
                                                            <?php echo form_error('new_password2', '<small class="text-danger">', '</small>');?>
                                                        </div>
                                                        <div class="margin-top-10">
                                                            <button type="submit" class="btn green" name="submit3">Change Password</button>
                                                            <button type="reset" class="btn default">Reset</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- END CHANGE PASSWORD TAB -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PROFILE CONTENT -->
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT BODY -->
</div>
</div>
<!-- END PAGE CONTENT BODY -->
<!-- END CONTENT BODY -->
</div>
</div>
<!-- END CONTAINER -->
</div>
</div>


