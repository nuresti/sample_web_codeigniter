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
        <h1>Master Tanda Tangan Surat
            <small>Halaman Master Tanda Tangan Surat</small>
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
            <span>Master Tanda Tangan Surat</span>
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
                                <span class="caption-subject bold uppercase"> Master Tanda Tangan Surat</span>
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
                            <?php echo form_error('no_nrk', '<div class="alert alert-danger" role="alert">', '</div>');?>

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
                          <th>NRK</th>
                          <th>Alamat URL</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="show_data">
                        <?php 
                            $no = 1;
                            foreach ($ttd_digital as $st) {
                            ?>
                            <tr id="<?php echo $st->id_ttd; ?>">
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $st->no_nrk; ?></td>
                                <td> <img src="<?php echo $st->alamat_url; ?>" width="100"></td>
                                <td>
                                    <a class="" data-toggle="modal" data-target="#edit_<?php echo $st->id_ttd; ?>"><button class="btn btn-info"><i class="fa fa-pencil"></i></button></a>
                                    <a class="" data-toggle="modal" data-target="#delete_<?php echo $st->id_ttd; ?>"><button class="btn btn-danger remove"><i class="fa fa-trash-o"></i></button></a>
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
                        <form action="<?php echo base_url()."c_surat_ttd/ks_add_ttd"; ?>" method="POST" id=upload_ttd enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Tambah Data Tanda Tangan Surat</h4>
                            </div>
                            <div class="modal-body"> 
                                <div class="portlet-body form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="no_nrk">Nomor NRK / Nama</label>
                                                <select class="select_nrk" name="no_nrk" id="no_nrk">
                                                  <option selected="selected">-- Pilih Opsi --</option>
                                                  <?php 
                                                        foreach ($tab_sdm as $td) {

                                                   ?>
                                                        <option value="<?php echo $td->nrk ?>"> <?php echo $td->nrk ?> / <?php echo $td->nama ?> </option>
                                                   <?php 
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="upload">Upload TTD</label>
                                                <input type="file" name="alamat_url" id="alamat_url" class="form-control">
                                                <small>format gif, jpg, jpeg, png. (Ukuran Maksimal 10MB)</small>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="submit" nama="btn_simpan" id="btn_simpan" class="btn green">Save changes</button>
                            </div>
                        </div>
                        </form>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- ADD -->
                <?php 
                	foreach ($ttd_digital as $td) {
                 ?>

                    <!-- EDIT -->
                <div class="modal fade" id="edit_<?php echo $td->id_ttd; ?>" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="<?php echo base_url()?>c_surat_ttd/ks_update_ttd" method="POST" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Tambah Data Tanda Tangan Surat</h4>
                            </div>
                            <div class="modal-body"> 
                                <div class="portlet-body form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="no_nrk">Nomor NRK / Nama</label>
                                                <input type="hidden" name="id_ttd" value="<?php echo $td->id_ttd ?>">
                                                <select class="select_nrk" name="no_nrk" id="no_nrk">

                                                  <option value="<?php echo $td->no_nrk ?>"> <?php echo $td->no_nrk ?></option>
                                                  
                                                  <?php 
                                                        foreach ($tab_sdm as $ts) {

                                                   ?>
                                                        <option value="<?php echo $ts->nrk ?>"> <?php echo $ts->nrk ?> / <?php echo $ts->nama ?> </option>
                                                   <?php 
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_surat">Upload TTD</label>
                                                <input type="hidden" name="old" id="old" value="<?php echo $td->alamat_url; ?> " class="form-control">
                                                <input type="file" name="alamat_url" id="alamat_url" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <center><img src="<?php echo $td->alamat_url;?>" width="100"></center>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="submit" nama="submit" id="submit" class="btn green">Save changes</button>
                            </div>
                        </div>
                        </form>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- EDIT -->
                <!-- DELETE -->
                <div class="modal fade" id="delete_<?php echo $td->id_ttd ?>" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class= "modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Delete Master Tanda Tangan</h4>
                            </div>
                            <div class="modal-body"> 
                                <div class="portlet-body form">
                                    <p>Yakin akan menghapus data ini ?</p>
                                    <form action="<?php echo base_url()?>c_surat_ttd/ks_delete_ttd" method="POST">
                                                <input type="hidden" name="id_ttd" id="id_ttd" value="<?php echo $td->id_ttd; ?>">
                                    
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
    // $(document).ready(function() {
    //     // $('.select_nrk').select2();

    //     tampil_data();  
         
    //     $('#data_ttd').dataTable();
          
    //     //FUNGSI TAMPIL DATA
    //     function tampil_data(){
    //         $.ajax({
    //             type  : 'ajax',
    //             url   : '<?php //echo base_url()."c_surat_ttd/ks_surat_ttd_list" ?>',
    //             secureuri :false,
    //             fileElementId   :'userfile',
    //             dataType : 'json',
    //             success : function(data){
    //                 var html = '';
    //                 no = 1;
    //                 var num =+ no;
    //                 var i;
    //                 for(i=0; i<data.length; i++){
    //                     num = i + 1;
    //                     html += '<tr>'+
    //                             '<td>'+ num +'</td>'+
    //                             '<td>'+data[i].no_nrk+'</td>'+
    //                             '<td><img src="'+data[i].alamat_url+'" width="100"></td>'+
    //                             '<td style="text-align:;">'+
    //                                 '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].id_ttd+'"><i class="fa fa-pencil"></i></a>'+' '+
    //                                 '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].id_ttd+'"><i class="fa fa-trash-o"></i></a>'+
    //                             '</td>'+
    //                             '</tr>';
    //                 }
    //                 $('#show_data').html(html);
    //             }
 
    //         });
        //}
        //  //ADD SURAT JENIS
        // $('#btn_simpan').on('click',function(){
        //         var no_nrk=$('#no_nrk').val();
        //         var alamat_url=$('#alamat_url').val();

        //         console.log(no_nrk);
                
        //         $.ajax({
        //             type : "POST",
        //             url  : "<?php //echo base_url()."c_surat_ttd/ks_add_ttd"; ?>",
        //             beforeSend :function () {
        //               swal({
        //                   title: 'Menunggu',
        //                   html: 'Memproses data',
        //                   onOpen: () => {
        //                     swal.showLoading()
        //                   }
        //                 })      
        //               },
        //             dataType : "JSON",
        //             data : {no_nrk:no_nrk, alamat_url:alamat_url},
        //             success: function(data){
        //                 $('[name="no_nrk"]').val("");
        //                 $('[name="alamat_url"]').val("");
        //                 $('#m_modal_1').modal('hide');
        //                 swal("Added!", "Data berhasil di tambahkan.", "success");
        //                 tampil_data();
        //             }
        //         });
        //         return false;
        //     });

  //        //HAPUS SURAT JENIS
  //       $('#show_data').on('click','.item_hapus',function(){
  //           var id=$(this).attr('data');
  //           $('#hapus').modal('show');
  //           $('[name="id_jenis_surat"]').val(id);
  //       });   

     //    $('#btn_hapus').on('click',function(){
     //            var id_jenis_surat=$('#id_jenis_surat').val();
     //            $.ajax({
     //            type : "POST",
     //            url  : "<?php //echo base_url('kartu_piutang/ks_delete_surat_jenis')?>",
     //            dataType : "JSON",
     //                    data : {id_jenis_surat: id_jenis_surat},
     //                    success: function(data){
     //                            $('#hapus').modal('hide');
     //                            swal("Deleted!", "Data berhasil di Hapus.", "success");
     //                            tampil_data();
     //                    }
     //                });
     //                return false;
     //            });     


     //     //UPDATE SURAT JENIS
  //       $('#show_data').on('click','.item_edit',function(){
  //           var id_jenis_surat=$(this).attr('data');
  //           $.ajax({
  //               type : "GET",
  //               url  : "<?php // echo base_url('kartu_piutang/ks_get_data_jenis')?>",
  //               dataType : "JSON",
  //               data : {id_jenis_surat:id_jenis_surat},
  //               success: function(data){
  //                   $.each(data,function(id_jenis_surat, nama_surat){
  //                       $('#edit').modal('show');
  //                       $('[name="id_jenis_surat2"]').val(data.id_jenis_surat);
  //                       $('[name="nama_surat2"]').val(data.nama_surat);
  //                   });
  //               }
  //           });
  //           return false;
  //       });

  //       //Update Barang
  //       $('#btn_update').on('click',function(){
  //           var id_jenis_surat=$('#id_jenis_surat2').val();
  //           var nama_surat=$('#nama_surat2').val();
  //           $.ajax({
  //               type : "POST",
  //               url  : "<?php // echo base_url('kartu_piutang/ks_update_surat_jenis')?>",
  //               dataType : "JSON",
  //               data : {id_jenis_surat:id_jenis_surat , nama_surat:nama_surat},
  //               success: function(data){
  //                   $('[name="id_jenis_surat"]').val("");
  //                   $('[name="nama_surat"]').val("");
  //                   $('#edit').modal('hide');
  //                   swal("Updated!", "Data berhasil di ubah.", "success");
  //                   tampil_data();
  //               }
  //           });
  //           return false;
  //       });

    //});
</script>