<?php @includeFile('admin.inc.head'); ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php includeFile('admin.inc.header') ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php includeFile('admin.inc.sidebar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <!-- <small>it all starts here</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Admin</a></li>
        <li class="active">Home</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php @includeFile('error.errors') ?>

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All posts</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row" hidden>
                  <div class="col-sm-6">
                    <div class="dataTables_length" id="example1_length">
                      <label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                      </select> entries</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div id="example1_filter" class="dataTables_filter">
                      <label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label>
                    </div>
                  </div>
              </div>
        <div class="row">
          <div class="col-sm-12">
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            	<thead>
            		<tr role="row">
            			<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 182.467px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Post title</th>
            			<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 225.017px;" aria-label="Browser: activate to sort column ascending">Category</th>
            			<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 198.733px;" aria-label="Platform(s): activate to sort column ascending">Images</th>
            			<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 155.9px;" aria-label="Engine version: activate to sort column ascending">Created</th>
            			<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 25.9px;" aria-label="Engine version: activate to sort column ascending">Action</th>
            		</tr>
            	</thead>
            	<tbody>
            		<?php
                  if ($data->count() > 0) {
                    foreach ($data as $topic) {
                      ?>
                        <tr role="row" class="odd">
                    			<td class="sorting_1"><?=$topic->title; ?></td>
                    			<td><?=$topic->category; ?></td>
                    			<td><img width="50" height="50" src="<?=url('postimages/'.$topic->featured_image); ?>" alt=""> </td>
                          <td><?=$topic->created_at; ?></td>
                          <td><a href="#"><i class="fa fa-edit"></i></a> || <a href="#"><i class="fa fa-trash"></i></a> || <a href="#"><i class="fa fa-eye"></i></a></td>
                    		</tr>
                      <?php
                    }
                  }
                ?>
            	</tbody>
            	<tfoot hidden>
            		<tr>
            			<th rowspan="1" colspan="1">Rendering engine</th>
            			<th rowspan="1" colspan="1">Browser</th>
            			<th rowspan="1" colspan="1">Platform(s)</th>
            			<th rowspan="1" colspan="1">Engine version</th>
            			<th rowspan="1" colspan="1">CSS grade</th>
            		</tr>
            	</tfoot>
            </table>

</div></div>
</div>
            </div>
            <!-- /.box-body -->
          </div>

        </div>
        <div class="box-body">
          <div class="col-sm-12">

          </div>
        </div>
      </div>

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Write A Post</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="col-sm-12">
            <form class="" action="<?=url('post/store');?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                  <label>Featured Image (*)</label>
                  <input type="file" class="form-control" name="file" required>
              </div>
              <!-- <br> -->
              <?php
                // print_r($_SESSION);
              ?>

              <div class="form-group">
                  <label>Text (*)</label>
                  <input type="text" class="form-control" name="title" placeholder="Title ..." required value="<?=old('title') ?>">
              </div>
              <br>
              <div class="form-group">
                <label for="">Content (*)</label>
                <textarea id="edit" name="message" class="form-control" required><?=old('message') ?></textarea>
                <br>
                <input type="submit" name="save" class="btn btn-primary" value="Save">
              </div>
            </form>
          </div>
        </div>

        <?php

        //  if (isset($_POST)) {
        //     print_r($_POST);
        //
        //     if (isset($_FILES)) {
        //         print_r($_FILES);
        //     }
        //
        // } ?>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php includeFile('admin.inc.footer'); ?>
