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
                  <label>Categories (*)</label>
                  <select class="form-control" name="category" required>
                    <option value="">Select categories</option>
                    <?php if (isset($data)): ?>
                      <?php foreach ($data as $keyvalue): ?>
                        <option value="<?php echo $keyvalue->id ?>"><?php echo $keyvalue->title ?></option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
              </div>

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
        <!-- <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php includeFile('admin.inc.footer'); ?>
