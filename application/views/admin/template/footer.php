

 <!-- Footer -->
<footer class="page-footer font-small blue" style="position: relative; bottom: bottom:0;">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">
  	&copy; <?=date('Y')?> Copyright
    <a href="mailto:irpannawawi.ixd@gmail.com">NawawiSoft</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<script type="text/javascript">
	$(document).ready(function(){
			$('#loading').hide();
			// $('#master_barang').DataTable();
			$('#po_list').DataTable();
			$('#table-po').DataTable();
			$('.table-produksi').DataTable();
	})
</script>

<script type="text/javascript" src="<?=base_url('assets/js/manual.js')?>"></script>
</body>
</html>