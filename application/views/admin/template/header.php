<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?=$title?></title>
  
   <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url('assets/AdminLTE/')?>plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/AdminLTE/')?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url('assets/AdminLTE/')?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!--Sweet Alert-->
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/multiLevelModal/')?>bs.sm.css">
  <!--dATATABLESS-->
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/DataTables/')?>css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <style type="text/css">
    .nowrap{
      white-space: nowrap;
    }
    .form-control{
      margin-bottom: 8px;
    }
    
    .lds-roller {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-roller div {
  animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  transform-origin: 40px 40px;
}
.lds-roller div:after {
  content: " ";
  display: block;
  position: absolute;
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: #000;
  margin: -4px 0 0 -4px;
}
.lds-roller div:nth-child(1) {
  animation-delay: -0.036s;
}
.lds-roller div:nth-child(1):after {
  top: 63px;
  left: 63px;
}
.lds-roller div:nth-child(2) {
  animation-delay: -0.072s;
}
.lds-roller div:nth-child(2):after {
  top: 68px;
  left: 56px;
}
.lds-roller div:nth-child(3) {
  animation-delay: -0.108s;
}
.lds-roller div:nth-child(3):after {
  top: 71px;
  left: 48px;
}
.lds-roller div:nth-child(4) {
  animation-delay: -0.144s;
}
.lds-roller div:nth-child(4):after {
  top: 72px;
  left: 40px;
}
.lds-roller div:nth-child(5) {
  animation-delay: -0.18s;
}
.lds-roller div:nth-child(5):after {
  top: 71px;
  left: 32px;
}
.lds-roller div:nth-child(6) {
  animation-delay: -0.216s;
}
.lds-roller div:nth-child(6):after {
  top: 68px;
  left: 24px;
}
.lds-roller div:nth-child(7) {
  animation-delay: -0.252s;
}
.lds-roller div:nth-child(7):after {
  top: 63px;
  left: 17px;
}
.lds-roller div:nth-child(8) {
  animation-delay: -0.288s;
}
.lds-roller div:nth-child(8):after {
  top: 56px;
  left: 12px;
}
@keyframes lds-roller {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

.sub-menu{
  color: black;
}

#paper{
  transform: rotate(90deg);
  visibility: hidden;
}
</style>
<!-- ===========================================JAVASCRIPT========================================== -->
<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- JQUERY UI -->
<script
        src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
        integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
        crossorigin="anonymous"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/AdminLTE/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/AdminLTE/')?>dist/js/adminlte.js"></script>



<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- daterangepicker -->
<script src="<?=base_url('assets/AdminLTE/')?>plugins/moment/moment.min.js"></script>
<script src="<?=base_url('assets/AdminLTE/')?>plugins/daterangepicker/daterangepicker.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url('assets/AdminLTE/')?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=base_url('assets/AdminLTE/')?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url('assets/AdminLTE/')?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- ===========================================JAVASCRIPT========================================== -->

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url('assets/AdminLTE/')?>dist/js/demo.js"></script>
<!-- <script src="<?=base_url('assets/AdminLTE/')?>dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->

<script src="<?=base_url('assets/AdminLTE/')?>dist/js/manual.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@master/dist/latest/bootstrap-autocomplete.min.js"></script>

  <script type="text/javascript" src="<?=base_url('assets/multiLevelModal/')?>bs.sm.js"></script>

  <!-- DATa tables button -->
  <script type="text/javascript" src="<?=base_url('assets/DataTables/')?>datatables.min.js"></script>
  <script type="text/javascript" src="<?=base_url('assets/DataTables/')?>Buttons-1.6.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="<?=base_url('assets/DataTables/')?>Buttons-1.6.1/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" src="<?=base_url('assets/DataTables/')?>Buttons-1.6.1/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="<?=base_url('assets/DataTables/')?>Buttons-1.6.1/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<style type="text/css">
  .paginate_button{
    padding: 1px;
  }
  .bg-form-grey{
    background: #f2f2f2;
  }
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">



