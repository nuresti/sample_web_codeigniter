	<!-- 

	-- Isi Surat beisi surat master yang secara default sudah ada di dalam database
	-- surat master tersebut hanya bisa di update oleh bagian kabag dan kadiv keuangan.
		jika login sebagai kabag/kadiv, akan muncul tombol edit dan hapus

		di action tersedia 3 tombol
		1. tombol edit (kadiv/kabag)
		2. tombol hapus (kadiv/kabag)
		3. tombol preview (seluruh akses dapat melihat) -> untuk melihat hasil ouput surat digital default

	-- ketika surat master dilakukan update, maka akan terbentuk data surat update-annya beserta tgl update nya
	-->

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
        <h1>Master Surat
            <small>Halaman Master Surat</small>
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
            <span>Master Surat</span>
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
                                <span class="caption-subject bold uppercase"> Master Surat</span>
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
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?> "></div>
					<?php if($this->session->flashdata('flash')): ?>

					<?php endif; ?>
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
									<th>Nama Jenis Surat</th>
									<th>Isi Surat</th>
									<th>Action</th>
								</tr>
                            </thead>
                            <tbody id="data-srt">
						<?php 
							$no = 1;
							foreach ($isi_surat as $is) {
								?>
								<tr id="<?php echo $is->id; ?>">
									<td><?php echo $no++; ?></td>
									<td><?php echo $is->nama_surat; ?></td>
									<td><?php echo $is->isian_surat; ?></td>
									<td>
										<a data-toggle="modal" data-target="#edit_<?php echo $is->id; ?>"><button class="btn btn-info"><i class="fa fa-pencil"></i></button></a>
										<a href="<?php echo base_url()."kartu_piutang/laporan_pdf"; ?>" target="_blank"><button type="button" class="btn btn-success btn-xs"><i class="fa fa-file"></i></button></a>
										<a><button type="button" class="btn btn-danger btn-xs remove"><i class="fa fa-trash-o"></i></button></a>
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
                <!-- Modal Tambah Master  Surat -->
<div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Jenis Surat</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body p-5">
				<div class="row">
					<form action="<?php echo base_url()."c_surat_master/ks_add_surat_jenis"; ?>" method="POST">
						<div class="form-group">
							<label for="nama_surat">Nama Jenis Surat</label>
							<select class="select_nama_surat" name="id_jenis_surat" id="id_jenis_surat">
									  <option selected="selected">-- Pilih Opsi --</option>
									  <?php 
									  		foreach ($jenis_surat as $js) {

									   ?>
									   		<option value="<?php echo $js->id_jenis_surat ?>"> <?php echo $js->nama_surat ?></option>
									   <?php 
									   	}
									    ?>
							</select>
						</div>
						<div class="form-group">
			                        <label for="isian_surat">Isi Surat</label>
			                        <textarea class="summernote" name="isian_surat" id="isian_surat"></textarea>
		                </div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
							<button class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal Tambah Master Jenis Surat -->

<!-- Modal Update Master Jenis Surat -->
<?php 
	foreach ($isi_surat as $is) {

 ?>
<div class="modal fade" id="edit_<?php echo $is->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h5 class="modal-title" id="exampleModalLongTitle">Edit Data Surat Master</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body p-5">
				<div class="row">
					<form action="<?php echo base_url()?>kartu_piutang/ks_update_surat_master" method="POST">
						<div class="form-group">
							<input type="hidden" name="id" id="id" value="<?php echo $is->id; ?>">
							<label for="nama_surat">Nama Jenis Surat</label>
								<select class="select_nama_surat" name="id_jenis_surat" id="id_jenis_surat">
 
									<option value="<?php echo $is->id_jenis_surat ?>" selected> <?php echo $is->nama_surat ?></option>
									  
									<?php 
									  	foreach ($jenis_surat as $ej) {
									?>
									   <option value="<?php echo $ej->id_jenis_surat ?>"> <?php echo $ej->nama_surat ?></option>
									   
									<?php
										}
									?>
								</select>
						</div>
						<div class="form-group">
			                        <label for="isian_surat">Isi Surat</label>
			                        <textarea class="summernote" name="isian_surat" id="isian_surat" ><?php echo $is->isian_surat ?></textarea>
		                </div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
							<button type="submit" nama="submit" id="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<!-- Modal Update Master Isi Surat --> 
			
<div class="row mt">
	<div class="modal fade" id="loading-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<br/>
				<div class="progress progress-striped active">
					<div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
						<span>Loading</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
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
<script>
	$(document).ready(function() {
		$('#dt').DataTable({
			paging: true,
		});
		$('.summernote').summernote({
				height:300
			});
		//$('.select_nrk').select2();
	    $('.select_nama_surat').select2();
	});


	$(document).ready(function(){
		$(".remove").click(function(){
	        var id = $(this).parents("tr").attr("id");
	    
	       swal({
	        title: "Anda yakin akan menghapus data ini ?",
	        text: "Data yang telah di hapus tidak bisa di kembalikan",
	        type: "warning",
	        showCancelButton: true,
	        confirmButtonClass: "btn-danger",
	        confirmButtonText: "Ya, Hapus",
	        cancelButtonText: "Batal",
	        closeOnConfirm: false,
	        closeOnCancel: false
	      },
	      function(isConfirm) {
	        if (isConfirm) {
	          $.ajax({
	             url: '<?php echo base_url() ?>kartu_piutang/ks_delete_surat_master/'+id,
	             type: 'DELETE',
	             error: function() {
	                alert('Something is wrong');
	             },
	             success: function(data) {
	                  $("#"+id).remove();
	                  swal("Deleted!", "Data berhasil di Hapus.", "success");
	             }
	          });
	        } else {
	          swal("Cancelled", "Data berhasil disimpan kembali :)", "error");
	        }
	      });
	     
	    });
	});
    
</script>
