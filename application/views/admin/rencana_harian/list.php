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
              <li class="breadcrumb-item active">Rencana Harian</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
     <div class="card">
     	<div class="card-header">
     		<h2 style="float: left;">Rencana Harian</h2>
     		<a style="float: right;" href="<?=site_url('print_rencana_harian')?>" target="__blank"><i class="fa fa-print"></i> Print</a>
     	</div>
     	<div class="card-body">
     		<div class="col-12">
     			<table class="table table-bordered table-striped table-responsive">
	     			<thead class="thead-dark">
	     				<tr>
	     					<th>No</th>
	     					<th colspan="2">Mesin/TON</th>
			     			<th nowrap>Nama Barang</th>
							<th>Warna</th>	
							<th>Bahan</th>	
							<th nowrap>PO QTY</th>
							<th>CT</th>
							<th>Cav</th>
							<th>BR</th>
							<th>NT</th>
							<th nowrap>Target/ Shift</th>
							<th nowrap>Target /Hari</th>
							<th nowrap>Lama Prod.</th>	
							<th nowrap>Keb. Bahan</th>
							<th nowrap>Sisa Produksi</th>
							<th nowrap>Est. Selesai</th>
							<th>Keterangan</th>
						</tr>
	     			</thead>
	     			<tbody>
	     				<?php $n=0; foreach($list_production as $prd){$n++;?>
	     					<?php 
				                  $target_jam     = round(3600/$prd->ct*$prd->cav);
				                  $target_shift   = $target_jam*8;
				                  $target_hari    = $target_shift*3;
				                  $wip_bln_lalu   = $this->produksi_model->get_wip_lalu(    $prd->no_po,  $prd->part_no);
				                  $wip_bln_ini    = $this->produksi_model->get_wip_bln_ini( $prd->no_po,  $prd->part_no);
				                  $fg_bln_lalu    = $this->produksi_model->get_fg_lalu(     $prd->no_po,  $prd->part_no);
				                  $fg_bln_ini     = $this->produksi_model->get_fg_bln_ini(  $prd->no_po,  $prd->part_no);

				                  //var_dump($wip_bln_ini->result());

				                  $total_wip    = $wip_bln_ini  + $wip_bln_lalu;
				                  $total_fg     = $fg_bln_ini   + $fg_bln_lalu;
				                  $lama_prod    = round($prd->blnc_prod/$target_jam);
				            ?>
	     					<tr>
	     						<td><?=$n?></td>
	     						<td><?=$prd->no_mesin?></td>
	     						<td><?=$prd->tonase?></td>
	     						<td><?=$prd->nama_barang?></td>
	     						<td><?=$prd->warna?></td>
	     						<td><?=$prd->bahan?></td>
	     						<td><?=$prd->qty?></td>
	     						<td><?=$prd->ct?></td>
	     						<td><?=$prd->cav?></td>
	     						<td><?=$prd->bruto?></td>
	     						<td><?=$prd->netto?></td>
	     						<td><?=$target_shift?></td>
	     						<td><?=$target_hari?></td>
	     						<td>
	     							<!-- Lama Produksi -->
	     							<?php 
	     								$lama_prod = round($prd->blnc_prod/$target_jam);
	     							?>
	     							<?=$lama_prod<0?0:$lama_prod;?> jam
	     						</td>
	     						<td><?=round($prd->keb_total_m,2)?></td>
	     						<td><?=$prd->blnc_prod<0?'('.abs($prd->blnc_prod).')':$prd->blnc_prod?></td>
	     						<td>
	     							<!--Sstimasi Selsai hari ini plus lama produki dalam jam-->
	     							<?=date("d M Y",strtotime("+$lama_prod hour"))?>
	     						</td>
	     						<td></td>
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