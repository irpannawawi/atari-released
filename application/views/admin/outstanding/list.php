

<aside class="content">
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Produksi</a></li>
              <li class="breadcrumb-item active">Outstanding Produksi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
     <div class="card">
     	<div class="card-header">
     		<h2 style="float: left;">Oustanding</h2>
     		<a style="float: right;" href="<?=site_url('print_outstanding')?>" target="__blank"><i class="fa fa-print"></i> Print</a>
     	</div>
     	<div class="card-body">
     		<div class="col-12 table-responsive">
     			<table class="table table-bordered table-responsive table-striped table-produksi">
	     			<thead class="thead-dark">
	     				<tr>
	     					<th>No</th>
	     					<th>Running</th>
	     					<th>Customer</th>
			     			<th nowrap>Nama Barang</th>
							<th>Bahan</th>	
							<th>Warna</th>	
							<th nowrap>PO QTY</th>
							<th>CT</th>
							<th>Cav</th>
							<th>BR</th>
							<th>NT</th>
							<th nowrap>Kurang Produksi</th>
						</tr>
	     			</thead>
	     			<tbody>
	     				<?php $n=0; foreach($list_production as $prd){$n++;?>
	     					<tr>
	     						<td><?=$n?></td>
	     						<td class="btn-status-<?=$prd->id_production?>">
	     							<!-- RUNNING -->
	     							 <?php if(!empty($prd->no_mesin) AND $prd->status == "RUNNING"){?>
				                      <!--Value if true-->
				                      <button 
				                      onClick="change_to_stop('<?=$prd->id_production?>','<?=site_url('produksi/change_status/stop/')?>')"
				                      class="btn btn-success">
				                      	Running
				                      </button>
				                    <?php }else{ ?>
				                      <!--value if fale-->
				                      <button 
				                      onClick="change_to_run('<?=$prd->id_production?>','<?=site_url('produksi/change_status/running/')?>')"
				                      class="btn btn-danger">
				                      	Stoped
				                      </button>
				                    <?php } ?>

	     						</td>
	     						<td><?=$prd->nama_customer?></td>
	     						<td nowrap><?=$prd->nama_barang?></td>
	     						<td><?=$prd->bahan?></td>
	     						<td><?=$prd->warna?></td>
	     						<td><?=$prd->qty?></td>
	     						<td><?=$prd->ct?></td>
	     						<td><?=$prd->cav?></td>
	     						<td><?=$prd->bruto?></td>
	     						<td><?=$prd->netto?></td>
	     						<td><?=$prd->blnc_prod?></td>
	     					</tr>
	     				<?php }?>
	     			</tbody>
	     		</table>
     		</div>
     	</div>
     	<div class="card-footer">
     		
     	</div>
     </div>
    </section>
</div>
</aside>

