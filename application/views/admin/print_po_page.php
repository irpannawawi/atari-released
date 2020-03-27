<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Print PO</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">PO</a></li>
              <li class="breadcrumb-item active">Print</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    	<div class="wrapper" style="background: white; margin: 7px; padding: 10px;" >
    		<div class="row" >
	    		<div class="col-4">
	    			<table class="table table-borderless">
	    				<tr>
	    					<th>Customer</th>
	    					<td class="customer">
	    						: 
	    					</td>
	    				</tr>
	    				<tr>
	    					<th>Delivery</th>
	    					<td class="delivery">
	    						: 
	    					</td>
	    				</tr><tr>
	    					<th>Customer PO</th>
	    					<td class="customer-po">
	    						: 
	    					</td>
	    				</tr><tr>
	    					<th>PO</th>
	    					<td>
	    						<select class="form-control " id="no_po" >
	    							<option>PO</option>
	    							<?php foreach($list_no_po as $key){ ?>
	    								<option value="<?=$key->no_po?>"><?=$key->no_po?></option>
	    							<?Php } ?>
	    						</select>
	    					</td>
	    				</tr>
	    			</table>
	    		</div>
	    		<div class="col-2">
	    			
	    		</div>
	    		<div class="col-6">
	    			<h2 style="margin-top: 20%; margin-right: 30px; " align="right">Order Produksi</h2>
	    		</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-12">
	    			<button id="print" class="btn btn-primary">print</button>
	    			<table class="table table-bordered table-responsive">
	    				<tr>
	    					<td colspan="3"></td>
	    					<td colspan="7">Product Information</td>
	    					<td colspan="4">Required Material</td>
	    				</tr>
	    				<!--						CT	Cav	Brutto	Netto	Material 1	Material 2	Total Material	Total MB.-->
	    				<tr>
	    					<td nowrap>Part no</td>
	    					<td nowrap>Part Name</td>
	    					<td nowrap>PO. Qty</td>
	    					<td nowrap>Part Color</td>
	    					<td>Material</td>
	    					<td nowrap>Master Batch No.</td>
	    					<td>CT</td>
	    					<td>CAV</td>
	    					<td>Brutto</td>
	    					<td>Netto</td>
	    					<td nowrap>Material 1</td>
	    					<td nowrap>Material 2</td>
	    					<td nowrap>Total Material</td>
	    					<td nowrap>Total MB</td>
	    				</tr>
	    				<tbody class="body-po-table">
	    					
	    				</tbody>
	    			</table>
	    		</div>
	    	</div>
    	</div>















    </section>
  </div>


  <!-- /.content-wrapper -->

  <!--Button Print Act-->
<script type="text/javascript">
	$(document).ready(function(){
		page_header = $('.paper-header')
	})
</script>
<!--./Button Print-->

<!--SELECT PO ACT-->
<script type="text/javascript">
	$('#no_po').change(function(){	
	po = $('#no_po').val();
	url = "<?=site_url('admin/po_table');?>";
	data = {no_po:po}
	$.post(url,data,function(data){
		$('.body-po-table').html(data);
	});

	url_detail_po = "<?=site_url('admin/po_detail')?>";
	$.post(url_detail_po,data,function(data){
		console.log(data);
		$('.customer').html(": "+data.nama_customer);
		$('.delivery').html(": "+data.part_no);
		$('.customer-po').html(": "+data.no_po_customer)
		$('.no_po').html(": "+data.no_po)
	});
});

</script>

<script type="text/javascript">
	$('#print').click(function(){
		url = "<?=site_url('print_page/index/')?>"+po
		window.open(url)
	});
	
</script>

<!--./SELECT PO ACT-->