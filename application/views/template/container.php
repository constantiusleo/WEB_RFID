<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?php echo base_url('assets/img/logo/aiia-logo.png'); ?>" rel="icon">
  <title>RFID - Dashboard</title>
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
  <!-- Select2 -->
  <link href="<?php echo base_url('assets/vendor/select2/dist/css/select2.min.css'); ?>" rel="stylesheet" type="text/css">
  <!-- Bootstrap DatePicker -->
  <link href="<?php echo base_url('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css'); ?>" rel="stylesheet" type="text/css">
  <!-- Bootstrap Touchspin -->
  <link href="<?php echo base_url('assets/vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css'); ?>" rel="stylesheet" type="text/css">
  <!-- ClockPicker -->
  <link href="<?php echo base_url('assets/vendor/clock-picker/clockpicker.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/ruang-admin.min.css'); ?>" rel="stylesheet">

</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php $this->load->view('template/sidebar'); ?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php $this->load->view('template/topbar'); ?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <?php $this->load->view($content); ?>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <?php $this->load->view('template/footer'); ?>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/ruang-admin.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/demo/chart-area-demo.js'); ?>"></script>

  <!-- Select2 -->
  <script src="<?php echo base_url('assets/vendor/select2/dist/js/select2.min.js'); ?>"></script>
  <!-- Bootstrap Datepicker -->
  <script src="<?php echo base_url('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
  <!-- Bootstrap Touchspin -->
  <script src="<?php echo base_url('assets/vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js'); ?>"></script>
  <!-- ClockPicker -->
  <script src="<?php echo base_url('assets/vendor/clock-picker/clockpicker.js'); ?>"></script>

  <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover

      $('.select2-single').select2();

      // Select2 Single  with Placeholder
      $('.select2-single-placeholder').select2({
        placeholder: "Select a Province",
        allowClear: true
      });

      // Select2 Multiple
      $('.select2-multiple').select2();

      // Bootstrap Date Picker
      $('#simple-date1 .input-group.date').datepicker({
        format: 'dd/mm/yyyy',
        todayBtn: 'linked',
        todayHighlight: true,
        autoclose: true,
      });

      $('#simple-date2 .input-group.date').datepicker({
        startView: 1,
        format: 'dd/mm/yyyy',
        autoclose: true,
        todayHighlight: true,
        todayBtn: 'linked',
      });

      $('#simple-date3 .input-group.date').datepicker({
        startView: 2,
        format: 'dd/mm/yyyy',
        autoclose: true,
        todayHighlight: true,
        todayBtn: 'linked',
      });

      $('#simple-date4 .input-daterange').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        todayHighlight: true,
        todayBtn: 'linked',
      });

      // TouchSpin

      $('#touchSpin1').TouchSpin({
        min: 0,
        max: 100,
        boostat: 5,
        maxboostedstep: 10,
        initval: 0
      });

      $('#touchSpin2').TouchSpin({
        min: 0,
        max: 100,
        decimals: 2,
        step: 0.1,
        postfix: '%',
        initval: 0,
        boostat: 5,
        maxboostedstep: 10
      });

      $('#touchSpin3').TouchSpin({
        min: 0,
        max: 100,
        initval: 0,
        boostat: 5,
        maxboostedstep: 10,
        verticalbuttons: true,
      });

      $('#clockPicker1').clockpicker({
        donetext: 'Done'
      });

      $('#clockPicker2').clockpicker({
        autoclose: true
      });

      let input = $('#clockPicker3').clockpicker({
        autoclose: true,
        'default': 'now',
        placement: 'top',
        align: 'left',
      });

      $('#check-minutes').click(function(e) {
        e.stopPropagation();
        input.clockpicker('show').clockpicker('toggleView', 'minutes');
      });


    });
  </script>

</body>

</html>