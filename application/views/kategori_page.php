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
        <h1>Kategori
            <small>Halaman Kategori</small>
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
            <span>Kategori</span>
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
                                <span class="caption-subject bold uppercase"> Managed Table</span>
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
                            <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a class="" data-toggle="modal" href="#basic">
                                        <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                            <i class="fa fa-plus"></i>
                                        </button></a>
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
                                    <th>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                            <span></span>
                                        </label>
                                    </th>
                                    <th> No </th>
                                    <th> Nama Kategori </th>
                                    <th> Deskripsi </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody id="show_data">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
                <!-- ADD -->
                <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Add Kategori Baru</h4>
                            </div>
                            <div class="modal-body"> 
                                <div class="portlet-body form">
                                    <form role="form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Nama Kategori</label>
                                                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder=""> 
                                            </div>
                                            <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea class="form-control summernote" name="deskripsi" id="deskripsi"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="submit" id="btn_save" class="btn green">Save changes</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- ADD -->
                <!-- /.modal -->
                 <!-- EDIT -->
                <div class="modal fade" id="edit" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Update Kategori </h4>
                            </div>
                            <div class="modal-body"> 
                                <div class="portlet-body form">
                                    <form role="form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <input type="hidden" name="id" id="id" class="form-control">
                                                <label>Nama Kategori</label>
                                                <input type="text" class="form-control" placeholder="" name="nama_kategori" id="nama_kategori"> 
                                            </div>
                                            <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea class="form-control summernote" name="deskripsi" id="deskripsi"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="button" id="btn_update" class="btn green">Save Update</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- EDIT -->
                <!-- /.modal -->
                 <!-- DELETE -->
                <div class="modal fade" id="delete" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Delete Kategori</h4>
                            </div>
                            <div class="modal-body"> 
                                <div class="portlet-body form">
                                    <p>Yakin akan menghapus data ini ?</p>
                                    <form role="form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <input type="hidden" name="id" id="id" class="form-control">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="button" id="btn_delete" class="btn red">Hapus</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- DELETE -->
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


