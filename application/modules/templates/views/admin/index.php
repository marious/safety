<?php require '_includes/head.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php require '_includes/header.php'; ?>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php require '_includes/sidebar.php'; ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo isset($page_header) ? $page_header : ''; ?>
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo isset($page_header) ? $page_header : ''; ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                <?php echo $this->session->flashdata('success'); ?>
              </div>
    <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

      <?php
      if (isset($view_file)) {
        $this->load->view($view_module . '/' . $view_file);
      }
      ?>
      <!-- Small boxes (Stat box) -->
        <!-- <div class="row"></div> -->
      <!-- /.row -->
      <!-- Main row -->
      <!-- <div class="row"></div> -->
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; <?= date('Y'); ?></strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script>var root = '<?= site_url(); ?>'</script>
<!-- jQuery 3 -->
<script src="<?= base_url() . '/assets/admin/'; ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<!-- <script src="bower_components/jquery-ui/jquery-ui.min.js"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- <script> -->
  <!-- $.widget.bridge('uibutton', $.ui.button); -->
<!-- </script> -->
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() . '/assets/admin/'; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() . '/assets/admin/'; ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- Slimscroll -->
<script src="<?= base_url() . '/assets/admin/'; ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() . '/assets/admin/'; ?>bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?= base_url() . 'assets/admin/'?>bower_components/select2/dist/js/select2.min.js"></script>
<script src="<?= base_url() . '/assets/admin/'; ?>bower_components/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() . '/assets/admin/'; ?>dist/js/adminlte.min.js"></script>

<script>
  $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
  });
  $('.select2').select2()

  function showContentInputArea(elem) {
    if (elem.value == '1') {
      $('.page-content').show();
    } else {
      $('.page-content').hide();
    }
  }
</script>

<?php if (isset($js_file)): ?>
<?php if (is_array($js_file)): ?>
<?php foreach ($js_file as $file): ?>
<script src="<?= $file; ?>"></script>
<?php endforeach; ?>
<?php else: ?>
<script src="<?= $js_file; ?>"></script>
<?php endif; ?>
<?php endif; ?>

<?php if(isset($icheck) && $icheck == true): ?>
<script>
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass   : 'iradio_minimal-blue'
    });

</script>
<?php endif; ?>

<?php if (isset($_SESSION['success_toastr'])): ?>
<script>
    toastr['success']("<?php echo $_SESSION['success_toastr'] ?>");
</script>
<?php endif; ?>

<?php if (isset($footer_script)){ echo $footer_script; }  ?>


</body>
</html>
