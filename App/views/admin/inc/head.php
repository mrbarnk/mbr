<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=url('bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=url('bower_components/font-awesome/css/font-awesome.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=url('bower_components/Ionicons/css/ionicons.min.css')?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=url('dist/css/AdminLTE.min.css')?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=url('dist/css/skins/_all-skins.min.css')?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?=url('bower_components/morris.js/morris.css')?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=url('bower_components/jvectormap/jquery-jvectormap.css')?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?=url('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=url('bower_components/bootstrap-daterangepicker/daterangepicker.css')?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?=url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->


  <!-- For the text editor  -->

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=url('css/froala_editor.css')?>">
    <link rel="stylesheet" href="<?=url('css/froala_style.css')?>">
    <link rel="stylesheet" href="<?=url('css/plugins/code_view.css')?>">
    <link rel="stylesheet" href="<?=url('css/plugins/colors.css')?>">
    <link rel="stylesheet" href="<?=url('css/plugins/emoticons.css')?>">
    <link rel="stylesheet" href="<?=url('css/plugins/image_manager.css')?>">
    <link rel="stylesheet" href="<?=url('css/plugins/image.css')?>">
    <link rel="stylesheet" href="<?=url('css/plugins/line_breaker.css')?>">
    <link rel="stylesheet" href="<?=url('css/plugins/table.css')?>">
    <link rel="stylesheet" href="<?=url('css/plugins/char_counter.css')?>">
    <link rel="stylesheet" href="<?=url('css/plugins/video.css')?>">
    <link rel="stylesheet" href="<?=url('css/plugins/fullscreen.css')?>">
    <link rel="stylesheet" href="<?=url('css/plugins/file.css')?>">
    <link rel="stylesheet" href="<?=url('css/plugins/quick_insert.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css"> -->


    <!-- Include all Editor plugins CSS style. -->
    <link rel="stylesheet" href="<?php echo url('css/froala_editor.pkgd.min.css'); ?>">

    <!-- Include Code Mirror CSS. -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">


    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<style>
      .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
      }

      .switch input {
        opacity: 0;
        width: 0;
        height: 0;
      }

      .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
      }

      .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
      }

      input:checked + .slider {
        background-color: #2196F3;
      }

      input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
      }

      input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
      }

      /* Rounded sliders */
      .slider.round {
        border-radius: 34px;
      }

      .slider.round:before {
        border-radius: 50%;
      }
</style>

</head>
