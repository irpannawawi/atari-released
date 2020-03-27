  <?php
  function date_switcher($m){
  	switch ($m) {
  		case '1':
  			return "Januari";
  			break;
  		case '2':
  			return "Februari";
  			break;
  		case '3':
  			return "Maret";
  			break;
  		case '4':
  			return "April";
  			break;
  		case '5':
  			return "Mei";
  			break;
  		case '6':
  			return "Juni";
  			break;
  		case '7':
  			return "Juli";
  			break;
  		case '8':
  			return "Agustus";
  			break;
  		case '9':
  			return "September";
  			break;
  		case '10':
  			return "Oktober";
  			break;
  		case '11':
  			return "November";
  			break;
  		case '12':
  			return "Desember";
  			break;
  		default:
  			return "UNKNOWN";
  			break;
  	}
  }

  ?>



  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pre Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



	
<section class="content">
		<div class="card">
			<div class="card-header">
				<a href="<?=site_url('admin/tambah_po')?>" class="btn btn-primary">Tambah PO</a>
			</div>
			<div class="card-body table-responsive-lg">
				<table class="table table-striped table-bordered table-responsive " id="table-po">
					<thead>
						<tr>
							<th>No</th>
							<th>Month</th>
							<th>Date</th>
							<th>PO#</th>
							<th>Customer</th>
							<th nowrap>PO# Customer</th>
							<th nowrap>Part No.</th>
							<th nowrap>Part Name</th>
							<th nowrap>PO. Qty</th>
							<th nowrap>Part Color</th>
							<th>Material</th>
							<th nowrap>Mtr 1</th>
							<th nowrap>Mtr 2</th>
							<th nowrap>Master Batch No.</th>
							<th>Proportion</th>
							<th>CT</th>
							<th>Cav</th>
							<th>Brutto</th>
							<th>Netto </th>
							<th nowrap>Kebutuhan Total</th>
							<th nowrap>Keb. M1 </th>
							<th nowrap>Keb. M2 </th>
							<th nowrap>Keb. MB </th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $n=0; foreach ($po_list as $key) { $n++; ?>
							<tr>
								<td><?=$n?></td>
								<td><?php
								$month = explode('/',$key->tanggal_po);
								$month = $month[0];
								echo date_switcher($month);
								?></td>
								<td><?=$key->tanggal_po?></td>
								<td><?=$key->no_po?></td>
								<td><?=$key->nama_customer?></td>
								<td><?=$key->no_po_customer?></td>
								<td><?=$key->part_no?></td>
								<td nowrap><?=$key->nama_barang?></td>
								<td><?=$key->qty?></td>
								<td><?=$key->warna?></td>
								<td><?=$key->bahan?></td>
								<td><?=$key->komposisi_1?></td>
								<td><?=$key->komposisi_2?></td>
								<td><?=$key->total_mb_name?></td>
								<td><?=$key->total_mb_val*100?>%</td>
								<td><?=$key->ct?></td>
								<td><?=$key->cav?></td>
								<td><?=$key->bruto?></td>
								<td><?=$key->netto?></td>
								<td><?=$key->keb_total_m?></td>
								<td><?=$key->keb_m1?></td>
								<td><?=$key->keb_m2?></td>
								<td><?=$key->keb_mb?></td>
								<td>
									<div class="btn-group">
										<a href="<?=site_url('admin/delete_po/'.$key->id)?>" class="btn btn-danger">Delete</a>
										<a href="<?=site_url('admin/delete_po/'.$key->id)?>" class="btn btn-warning">Edit</a>
									</div>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>		
</section>















<script type="text/javascript">
</script>