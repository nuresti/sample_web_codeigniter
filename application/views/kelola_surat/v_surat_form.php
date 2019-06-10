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
        <h1>Surat Digitalisasi
            <small>Halaman Surat Digitalisasi</small>
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
            <span>Surat Digitalisasi</span>
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
                <div class="panel-body">
                    <!-- ALERT -->
                    <?php echo form_error('nama_surat', '<div class="alert alert-danger" role="alert">', '</div>');?>

                    <?php echo $this->session->flashdata('message'); ?>
                <div class="col-xs-2">
                
                </div>
                <div class="col-xs-8">
                <form action="<?php echo base_url()."c_surat_form/ks_add_surat_digital"; ?>" method="POST" enctype="" role="form" id="form_surat">
                <div class="panel-body">
                    <div class="form-group">    
                      <label>Jenis Surat</label>
                      <select class="select" name="id_surat_master" id="id_surat_master">
                        <option selected>-- Pilih Jenis Surat --</option>
                        <?php 
                            foreach ($data_jenis as $dj)
                            {
                         ?>
                        <option value="<?php echo $dj->id_jenis_surat ?> "><?php echo $dj->nama_surat ?> / <?php echo $dj->nama ?></option>
                        <?php 
                            }
                         ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>ID Mitra</label>
                      <div class="row">
                        <div class="col-xs-10">
                            <input type="text" name="id_mitra" id="id_mitra" class="form-control" placeholder="ID Mitra">
                        </div>
                        <div class="col-xs-2">
                            <button class="btn btn-primary" id="btn-cari" >Cari
                            </button>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="no_surat">Nomor Surat</label>
                      <input type="hidden" class="form-control" name="nama_mitra" id="nama_mitra">
                      <input type="text" class="form-control" name="no_surat" id="no_surat" placeholder="Nomor Surat">
                    </div>
                    <div class="form-group">
                      <label for="tgl_surat">Tanggal Surat</label>
                      <input type="date" class="form-control" name="tgl_surat" id="tgl_surat" placeholder="Tanggal Surat">
                    </div>
                    <div class="form-group">
                      <label for="lampiran">Lampiran</label>
                      <input type="text" class="form-control" name="lampiran" id="lampiran" placeholder="Lampiran">
                    </div>
                    <div class="form-group">
                      <label for="perihal">Perihal</label>
                      <input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal">
                      <input type="hidden" class="form-control" name="alamat" id="alamat" value="alamat" >
                      <input type="hidden" class="form-control" name="kabkot" id="kabkot" value="kabkot">
                      <input type="hidden" class="form-control" name="provinsi" id="provinsi" value="provinsi">
                    </div>
                    <!-- Isian surat akan otomatis terisi ketika onchange jenis surat berubah. dibuat disabled. hanya dapat di edit oleh kabag/kadiv keuangan -->
                    <div class="form-group">
                      <label for="isian_surat">Isian Surat</label>

                      <textarea class="summernote" name="isian_surat" id="isian_surat"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Tanda Tangan</label>
                      <select class="select" name="id_ttd" id="id_ttd">
                        <option selected>-- Pilih Tanda Tangan --</option>
                        <?php 
                            foreach ($data_ttd as $ttd)
                            {
                         ?>
                        <option value="<?php echo $ttd->id_ttd ?> "><?php echo $ttd->no_nrk ?> / <?php echo $ttd->nama ?></option>
                        <?php 
                            }  
                         ?>
                        
                      </select>
                    </div>
                    <!-- jika kosongkan tembusan di check, maka akan mendisable smua aktifitas tembusan yang sudah disediakan.  -->
                    <div class="form-group">
                      <label>
                        <input type="checkbox" name="tembusan" id="tembusan" onclick="yesnoCheck();" value="ya"> Tambahkan Tembusan ?
                      </label>
                    </div>

                    <!-- hidden input field -->
                    <div class="table-scrollable" id="tambah_tembusan" style="display:none;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td colspan="6">
                                        <input type="button" name="add_btn" value="Tambah" id="add_btn" class="btn btn-dark">
                                    </td>
                                </tr>
                                <tr>
                                    <td>No</td>
                                    <td>Tembusan Kepada</td>
                                    <td>Keterangan <small>(opsional)</small></td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody id="container"><!--Isian row--></tbody>
                        </table>
                    </div>
                    <!-- hidden input field -->

                    <div class="box-footer">
                        <button type="button" class="btn btn-primary">Generate</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
            </div>
            <div class="col-xs-2">
                
            </div>
        </div>
            </div>
                </div>
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
<script type="text/javascript">
  
  $(document).ready(function() {
    $('.summernote').summernote({
        height:300
      });
    //$('.select_nrk').select2();
      $('.select').select2({});
  });

</script>