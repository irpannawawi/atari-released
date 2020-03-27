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
            <h1 class="m-0 text-dark">Tambah PO</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



	
<section class="content">

	<div class="col-12" id="table-wraper" style="background: #e1f4f3; padding: 15px;">
		<?=form_open('admin/act_input_po')?>
			<div class="row">
				<div class="form-group col">
					<label for="po_number">PO# NO</label>
					<input type="text" class="form-control" id="po_number" placeholder="Enter PO Number" name="po" value="<?=!empty($last_po->no_po)?$last_po->no_po:'PO/AT/'.date('y/m/');?>">
				</div>
				<div class="form-group col">
					<label for="part_no">Part No</label>

          <div class="input-group mb-2">
            <input type="text" class="form-control" id="part_no" placeholder="" name="part_no">
            <div class="input-group-append">
              <button 
                type="button" 
                class="btn btn-default input-group-text"
                data-toggle="modal"
                data-target="#modal-browse-barang"
              >
              <i class="fa fa-folder"></i>
            </button>
            </div>
          </div>
				</div>
        <div class="form-group col">
          <label for="Customer">Nama Barang</label>
          <input type="text" class="form-control" id="nama_barang"  name="customer" placeholder="(Opsional)">
        </div>
			</div>
			<div class="row">
				<div class="form-group col">
					<label for="po_customer">PO# CUstomer</label>
					<input type="text" class="form-control" id="po_customer" name="po_customer">
				</div>
				<div class="form-group col">
					<label for="Customer">Nama Customer</label>
					<input type="text" class="form-control" id="nama_customer"  name="customer" placeholder="">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-6">
					<label for="tanggal_po">Tanggal PO</label>
					<input type="text" class="form-control" id="tanggal_po" name="tanggal_po" value="<?=date('m/d/Y')?>">
				</div>
				<div class="form-group col-6">
					<label for="qty">Jumlah PO</label>
					<input type="number" class="form-control" id="qty" name="qty">
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
<!--Modal Bootstrap-->
<div class="modal" id="filterModal"  tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Filter Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col filter">
      <table class="table table-borderless ">
        <tr>
          <td>
            <select id="part_no"  class="form-control">
              <option value="" id="defaultPartNoValue">Part No</option>
            <?php foreach ($list_part_no as $key) { ?>
              <option value="<?=$key->part_no?>"><?=$key->part_no?></option>
            <?php } ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <select id="nama_barang" class="form-control">
                <option value="" id="defaultBarangValue">Nama Barang</option>
              <?php foreach ($list_nama_barang as $key) { ?>
                <option value="<?=$key->nama_barang?>"><?=$key->nama_barang?></option>
              <?php } ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <select id="nama_cust" class="form-control">
                <option value="" id="defaultCustomerValue">Nama Customer</option>
              <?php foreach ($list_nama_customer as $key) { ?>
                <option value="<?=$key->nama_customer_m?>"><?=$key->nama_customer_m?></option>
              <?php } ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <select id="warna" class="form-control">
                <option value="" id="defaultWarnaValue">Warna</option>
              <?php foreach ($list_warna as $key) { ?>
                <option value="<?=$key->warna?>"><?=$key->warna?></option>
              <?php } ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <select id="bahan" class="form-control">
                <option value="" id="defaultBahanValue">Bahan</option>
              <?php foreach ($list_bahan as $key) { ?>
                <option value="<?=$key->bahan?>"><?=$key->bahan?></option>
              <?php } ?>
            </select>
          </td>
        </tr>
      </table>
    </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-danger" id="btnReset">Reset</button>
        <button type="button" class="btn btn-primary" id="btn-apply" data-dismiss="modal">Apply</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!--./Modal-->
  <div class="table-wraper" style="margin-top: 20px; padding: 15px; background: lightgrey;">
        <h3>Data Reference</h3>
    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top: 10px; margin-bottom: 0px;">
  <li class="nav-item">
    <a class="nav-link active" id="database-tab" data-toggle="tab" href="#database" role="tab" aria-controls="database" aria-selected="true">Database</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="po-tab" data-toggle="tab" href="#po" role="tab" aria-controls="po" aria-selected="false">PO</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="database" role="tabpanel" aria-labelledby="database-tab" style="background: white;">
    <button  type="button" data-toggle="modal" data-target="#filterModal" class="btn btn-primary btn-toggle-filter" style="margin: 15px;">
      Filter
      <i id="icon-arrow" class="fa fa-arrow-right"></i>
    </button>
    <h4 align="center">Database</h4>
    <div style="height: 100%; width: 100%; position: absolute; background: white; opacity: 75%;" id="loading">
      <div class="lds-roller" style="margin-left: 35%; opacity: 100%;">
        <div></div>
        <div></div>
        <div></div>
      </div>
      <h1 style="margin-left: 35%;"><b>Loading....</b></h1>
    </div>
    <table id="master_barang" class="table table-bordered table-striped table-hover table-light " >
      <thead>
      <tr>
        <th>Part No</th>
        <th>Nama Barang</th>
        <th>Nama Customer</th>
        <th>Ct</th>
        <th>Cav</th>
        <th>Bruto</th>
        <th>Netto</th>
        <th>Bahan</th>
        <th>Warna</th>
      </tr>
    </thead>
    <tbody id="table-body">
      <?Php foreach($master_barang as $item){ ?>
        <tr>
          <td><?=$item->part_no?></td>
          <td><?=$item->nama_barang?></td>
          <td><?=$item->nama_customer_m?></td>
          <td><?=$item->ct?></td>
          <td><?=$item->cav?></td>
          <td><?=$item->bruto?></td>
          <td><?=$item->netto?></td>
          <td><?=$item->bahan?></td>
          <td><?=$item->warna?></td>
        </tr>
      <?php } ?>
    </tbody>
    </table>
  </div>
<!--===================================================================================
  ======================================TAB 2==========================================
  =====================================================================================-->
  <div class="tab-pane fade" id="po" role="tabpanel" aria-labelledby="po-tab" style="background: white;">
    

    <!--Modal Bootstrap-->
<div class="modal" id="filterModal2"  tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Filter Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col filter">
      <table class="table table-borderless ">
        <tr>
          <td>
            <select id="part_no2"  class="form-control">
              <option value="" id="defaultPartNoValue">Part No</option>
            <?php foreach ($list_part_no as $key) { ?>
              <option value="<?=$key->part_no?>"><?=$key->part_no?></option>
            <?php } ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <select id="nama_barang2" class="form-control">
                <option value="" id="defaultBarangValue">Nama Barang</option>
              <?php foreach ($list_nama_barang as $key) { ?>
                <option value="<?=$key->nama_barang?>"><?=$key->nama_barang?></option>
              <?php } ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <select id="nama_cust2" class="form-control">
                <option value="" id="defaultCustomerValue">Nama Customer</option>
              <?php foreach ($list_nama_customer as $key) { ?>
                <option value="<?=$key->nama_customer_m?>"><?=$key->nama_customer_m?></option>
              <?php } ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <select id="warna2" class="form-control">
                <option value="" id="defaultWarnaValue">Warna</option>
              <?php foreach ($list_warna as $key) { ?>
                <option value="<?=$key->warna?>"><?=$key->warna?></option>
              <?php } ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <select id="bahan2" class="form-control">
                <option value="" id="defaultBahanValue">Bahan</option>
              <?php foreach ($list_bahan as $key) { ?>
                <option value="<?=$key->bahan?>"><?=$key->bahan?></option>
              <?php } ?>
            </select>
          </td>
        </tr>
      </table>
    </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-danger" id="btnReset">Reset</button>
        <button type="button" class="btn btn-primary" id="btn-apply2" data-dismiss="modal">Apply</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!--./Modal-->
<button  type="button" data-toggle="modal" data-target="#filterModal" class="btn btn-primary btn-toggle-filter" style="margin: 15px;">
      Filter
      <i id="icon-arrow" class="fa fa-arrow-right"></i>
    </button>
    <h4 align="center">PO List</h4>
    <table id="po_list" class="table table-bordered table-hover table-light " >
      <thead>
        <tr>
          <th>Tanggal PO</th>
          <th>PO#</th>
          <th>PO# Customer</th>
          <th>Nama Customer</th>
          <th>Nama Barang</th>
          <th>bahan</th>
          <th>Warna</th>
        </tr>
      </thead>
      <tbody id="table-body">
        <?Php foreach($po as $data){ ?>
          <tr>
            <td><?=$data->tanggal_po?></td>
            <td><?=$data->no_po?></td>
            <td><?=$data->no_po_customer?></td>
            <td><?=$data->nama_customer?></td>
            <td><?=$data->nama_barang?></td>
            <td><?=$data->bahan?></td>
            <td><?=$data->warna?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
  </div>
</section>


<!--MODAL BROSE BARANG-->
<div class="modal" id="modal-browse-barang" aria-labelledby="modal_operator" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 align="center" class="modal-title" id="exampleModalLabel">Barang</h3>
        <div class="row">
          <div class="col-12">
            <table class="table table-striped table-hover table-bordered" id="table-modal-barang">
              <thead>
                <tr>
                  <th>Part No</th>
                  <th>Nama Barang</th>
                  <th>Warna</th>
                </tr>
              </thead>
              <tbody>
              <?Php foreach($list_barang as $item){ ?>
                <tr onclick="fill_part_no('<?=$item->part_no?>','<?=$item->nama_barang?>')" data-dismiss="modal">
                  <td><?=$item->part_no?></td>
                  <td><?=$item->nama_barang?></td>
                  <td><?=$item->warna?></td>
                </tr>
              <?php } ?>
              </tbody>
          </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger bt-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  </div>
<!-- ./MODAL BROSE BARANG-->



<script type="text/javascript">
  $('#table-modal-barang').DataTable();
  //filter menu hiden
  var status = false;//false for hiden true for showen
  var arr_left = $('.fa-arrow-left')
  var arr_right = $('.fa-arrow-right')
  var bars = $('.fa-bars')




  var filterMenu = $('.filter');
    


  //filter menu action
  var url = '<?=site_url('admin/barang_filtered')?>'
  var url_search = '<?=site_url('admin/barang_search')?>'
  var table = $('#table-body');
  var loading = $('#loading');
    loading.hide(0);

//==============================TABLE BARANG===================
  $('#btn-apply').click(function(){
    var part_no   = $('#part_no').val();
    console.log(part_no);
    var nama_cust   = $('#nama_cust').val();
    var nama_barang = $('#nama_barang').val();
    var warna     = $('#warna').val();
    var bahan     = $('#bahan').val();
    var postData  = {'part_no':part_no, 'nama_barang':nama_barang, 'nama_cust':nama_cust, 'warna':warna, 'bahan':bahan}
  

  //loading event
    table.hide().removeAttr('hidden');
    loading.fadeIn(500);

    console.log(postData);
    $.post(url, postData, function(data){
      table.html(data);
      table.show(100)
    });
    loading.fadeOut(500)

  });
//==============================./TABLE BARANG===================
//==============================./Tabel PO=======================
  $('#btn-apply2').click(function(){
    var part_no   = $('#part_no2').val();
    var nama_cust   = $('#nama_cust2').val();
    var nama_barang = $('#nama_barang2').val();
    var warna     = $('#warna2').val();
    var bahan     = $('#bahan2').val();
    var postData  = {'part_no':part_no, 'nama_barang':nama_barang, 'nama_cust':nama_cust, 'warna':warna, 'bahan':bahan}
  

  //loading event
    table.hide().removeAttr('hidden');
    loading.fadeIn(500);

    $.post(url, postData, function(data){
      table.html(data);
      table.show(100)
      loading.fadeOut(500)
    })

  });
  //===================================================================

  $('#btnReset').click(function(){
    $('#defaultPartNoValue').removeAttr('selected');
    $('#defaultBahanValue').removeAttr('selected');
    $('#defaultWarnaValue').removeAttr('selected');
    $('#defaultCustomerValue').removeAttr('selected');
    $('#defaultBarangValue').removeAttr('selected');

    $('#defaultPartNoValue').attr({'selected':'true'});
    $('#defaultBahanValue').attr({'selected':'true'});
    $('#defaultWarnaValue').attr({'selected':'true'});
    $('#defaultCustomerValue').attr({'selected':'true'});
    $('#defaultBarangValue').attr({'selected':'true'});
  });

  $('#btn-search').click(function(){

    var keyword = $('#searchBox').val();

    //loading event
    table.hide().removeAttr('hidden');
    loading.fadeIn(500);

    $.post(url_search, {'keyword':keyword}, function(data){
      table.html(data);
      table.show(100)
      loading.fadeOut(500)
    })
  });

  function fill_part_no(part_no,nama_barang)
  {
    $('#part_no').val(part_no);
    $('#nama_barang').val(nama_barang);
  }
</script>
