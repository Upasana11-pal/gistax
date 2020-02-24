   <!-- General JS Scripts -->
 
  <!-- JS Libraies -->
  <script src="<?php echo base_url();?>assets/bundles/datatables/datatables.min.js"></script>
  <script src="<?php echo base_url();?>assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url();?>assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url();?>assets/js/page/datatables.js"></script>
  <!-- Template JS File -->
  <script src="<?php echo base_url();?>assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url();?>assets/js/custom.js"></script>
<script>
    $.(document).ready(function(){
        $('#table1').Datatable();
    });
</script>