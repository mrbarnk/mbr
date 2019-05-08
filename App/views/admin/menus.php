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
          <h3 class="box-title">Menu &nbsp;&nbsp;&nbsp; <a href="<?=url('admin/menus');?>"><i class="fa fa-plus"></i></a> </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

          <div class="col-sm-6">
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            	<thead>
            		<tr role="row">
            			<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 182.467px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Title</th>
            			<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 155.9px;" aria-label="Engine version: activate to sort column ascending">Created</th>
            			<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 55.9px;" aria-label="Engine version: activate to sort column ascending">Action</th>
            		</tr>
            	</thead>
            	<tbody>
            		<?php
                // print_r($data['menus']);
                  if ($data['menus']->count() > 0) {
                    foreach ($data['menus'] as $topic) {
                      ?>
                        <tr role="row" class="odd">
                    			<td class="sorting_1"><?=$topic->title; ?></td>
                          <td><?=$topic->created_at; ?></td>
                          <td><a href="<?=url('admin/menus/'.$topic->id.'/edit'); ?>"><i class="fa fa-edit"></i></a> || <a href="#"><i class="fa fa-trash"></i></a> || <a href="#"><i class="fa fa-eye"></i></a></td>
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

</div>

          <div class="col-sm-6">
            <?php if (isset($data['menu'])): ?>
              <form class="" action="<?=url('menu/update');?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?=$data['menu']->id ?>">
                    <label>Title (*)</label>
                    <?php //echo (json_encode($_GET)); ?>
                    <input type="text" class="form-control" name="title" placeholder="Title ..." required value="<?=$data['menu']->title ?>">
                </div>
                <div class="form-group">
                    <label>Url</label>
                    <?php //echo (json_encode($_GET)); ?>
                    <input type="url" class="form-control" name="url" placeholder="Link to ..." value="<?=$data['menu']->url ?>">
                </div>
                <div class="form-group">
                    <label>Parent Menu</label>
                    <?php //echo (json_encode($_GET)); ?>
                    <select type="text" class="form-control" name="parent_id">
                      <?php
                      // print_r($data['menus']);
                        if ($data['menus']->count() > 0) {
                          foreach ($data['menus'] as $menu) {
                            ?>
                              <option value="<?php echo $menu->id ?>"><?php echo $menu->title; ?></option>
                            <?php
                          }
                        }
                      ?>
                    </select>
                </div>

              <div class="form-group">
                <label for="">Status</label>
                <br>
                <?php
                  if($data['menu']->status == '0') {
                    $data['menu']->status = '';
                  }else {
                    $data['menu']->status = 'checked';
                  }
                 ?>
                <label class="switch">
                  <input name="status" type="checkbox" value="0" <?=$data['menu']->status ?>>
                  <span class="slider round"></span>
                </label>
              </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <br>

              </form>
            <?php else: ?>
              <form class="" action="<?=url('menu/store');?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Title (*)</label>
                    <?php //echo (json_encode($_GET)); ?>
                    <input type="text" class="form-control" name="title" placeholder="Title ..." required value="<?=old('title') ?>">
                </div>
                <div class="form-group">
                    <label>Url</label>
                    <?php //echo (json_encode($_GET)); ?>
                    <input type="url" class="form-control" name="url" placeholder="Link to ..." value="<?=old('url') ?>">
                </div>
                <div class="form-group">
                    <label>Parent Menu</label>
                    <?php //echo (json_encode($_GET)); ?>
                    <select type="text" class="form-control" name="parent_id">
                      <?php
                      // print_r($data['menus']);
                        if ($data['menus']->count() > 0) {
                          foreach ($data['menus'] as $menu) {
                            ?>
                              <option value="<?php echo $menu->id ?>"><?php echo $menu->title; ?></option>
                            <?php
                          }
                        }
                      ?>
                    </select>
                </div>

              <div class="form-group">
                <label for="">Status</label>
                <br>
                <label class="switch">
                  <input name="status" type="checkbox" value="0" checked>
                  <span class="slider round"></span>
                </label>
              </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <br>

              </form>
            <?php endif; ?>
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

        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php includeFile('admin.inc.footer'); ?>
