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
        <h1>Master Jenis Surat
            <small>Halaman Master Jenis Surat</small>
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
            <span>Master Jenis Surat</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMBS -->
    <!-- BEGIN PAGE CONTENT INNER -->
    <div class="page-content-inner">
        <div class="mt-content-body">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase"> Master Jenis Surat</span>
                            </div>
                            <div class="actions">
                                <div class="btn-group btn-group-devided" data-toggle="buttons">
                                    <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                        <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                    <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                        <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                        	<!-- ALERT -->
                            <?php echo form_error('nama_surat', '<div class="alert alert-danger" role="alert">', '</div>');?>

					       <?php echo $this->session->flashdata('message'); ?>
                            <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a data-toggle="modal" data-target="#m_modal_1" class="btn btn-primary">
							<span>
								<i class="fa fa-user-plus"></i>
								<span>
									Tambah Baru
								</span>
							</span>
						</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group pull-right">
                                        <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-print"></i> Print </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column mydata" id="mydata">
                            <thead>
                                <tr>
                                   <th>No</th>
							<th>Nama Surat</th>
							<th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="data-srt">
						<?php 
							$no = 1;
							foreach ($surat_jenis as $sj) {
							?>
							<tr id="<?php echo $sj->id_jenis_surat; ?>">
								<td><?php echo $no++; ?></td>
								<td><?php echo $sj->nama_surat; ?></td>
								<td>
                                    <a class="" data-toggle="modal" data-target="#edit_<?php echo $sj->id_jenis_surat; ?>"><button class="btn btn-info"><i class="fa fa-pencil"></i></button></a>
                                    <a class="" data-toggle="modal" data-target="#delete_<?php echo $sj->id_jenis_surat; ?>"><button class="btn btn-danger remove"><i class="fa fa-trash-o"></i></button></a>
								</td>
							</tr>
							<?php  
						}
						?>
					</tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
                <!-- ADD -->
                <div class="modal fade" id="m_modal_1" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="<?php echo base_url()."c_surat_jenis/ks_add_surat_jenis"; ?>" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Jenis Surat</h5>
                            </div>
                            <div class="modal-body"> 
                                <div class="portlet-body form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="nama_surat">Nama Jenis Surat</label>
                                                <input type="text" name="nama_surat" id="nama_surat" placeholder="Nama Jenis Surat" class="form-control">
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn green">Save changes</button>
                            </div>
                        </div>
                        </form>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- ADD -->

        <!-- Modal Update Master Jenis Surat -->
        <?php 
        	foreach ($surat_jenis as $sj) {

         ?>
        <div class="modal fade" id="edit_<?php echo $sj->id_jenis_surat ?>" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <form action="<?php echo base_url()?>c_surat_jenis/ks_update_surat_jenis" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Jenis Surat</h5>
                    </div>
                    <div class="modal-body"> 
                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="nama_surat">Nama Jenis Surat</label>
                                    <input type="hidden" name="id_jenis_surat" id="id_jenis_surat" value="<?php echo $sj->id_jenis_surat; ?>">
                                    <input type="text" name="nama_surat" id="nama_surat" placeholder="Nama Jenis Surat" class="form-control" value="<?php echo $sj->nama_surat ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn green">Save changes</button>
                    </div>
                </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- DELETE -->
        <div class="modal fade" id="delete_<?php echo $sj->id_jenis_surat ?>" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class= "modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Delete Menu</h4>
                    </div>
                    <div class="modal-body"> 
                        <div class="portlet-body form">
                            <p>Yakin akan menghapus data ini ?</p>
                            <form action="<?php echo base_url()?>c_surat_jenis/ks_delete_surat_jenis" method="POST">
                                        <input type="hidden" name="id_jenis_surat" id="id_jenis_surat" value="<?php echo $sj->id_jenis_surat; ?>">
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn red">Hapus</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- DELETE -->
        <?php } ?>
        <!-- Modal Update Master Jenis Surat --> 
                <!-- /.modal -->
            </div>
        </div>
        </div>
    </div>
    <!-- END PAGE CONTENT INNER -->
</div>
</div>
<!-- END PAGE CONTENT BODY -->
<!-- END CONTENT BODY -->
</div>
</div>
<!-- END CONTAINER -->
</div>
</div>