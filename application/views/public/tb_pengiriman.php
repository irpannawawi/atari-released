
<?php require 'template/header.php'; ?>
<?php require 'template/sidebar.php'; ?>
<script type="text/javascript">
  var table = $('#table-body');
  var loading = $('#loading');
    loading.hide(1);


  function search(event){

    if (event.keyCode === 13 && $('#searchBox').val() != '') {

      var keyword = $('#searchBox').val();
        //loading event
        table.hide().removeAttr('hidden');
        loading.fadeIn(500);
          $.post("<?=site_url('Lap_pengiriman/pengiriman_search')?>", {'keyword':keyword}, function(data){
            table.html(data);
            table.show(100)
            loading.fadeOut(500)
          });
    }
}
</script>
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Pengiriman Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->




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
                <option value="<?=$key->nama_cust?>"><?=$key->nama_cust?></option>
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
            <input type="text" id="tanggal_input" class="form-control" placeholder="Tanggal Input">
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

  
<section class="content">
  <?=!empty($_SESSION['status'])?"<div class=\"alert alert-success\">".$_SESSION['status']."</div>":''?>
  <div class="row">
    <div class="col-4">
      <div class="row">
        <div class="col-9">
          <div class="form-inline">
            <div class="form-group">
              <input type="search" id="searchBox"  class="form-control" onkeyup="search(event)" placeholder="Cari">
            </div>
            <div class="form-group">
              <button id="btn-search" class="btn btn-primary form-control"><i class="fa fa-search"></i></button>
            </div>  
          </div>
        </div>
        <div class="col-3 btn-group" >
          <button class="btn btn-success" id="btn-print">
            <i class="fa fa-print"></i>Print
          </button>
          <button  type="button" data-toggle="modal" data-target="#filterModal" class="btn btn-primary btn-toggle-filter">
            Filter
            <i id="icon-arrow" class="fa fa-arrow-right"></i>
          </button>
        </div>
      </div>
    </div>
  </div>







  <div class="col-12" id="table-wraper">
    <div id="headeer-page" hidden>
      <img src="<?=base_url('assets/img/LogoAT.jpg')?>" height="80" width="80" style="float: left; margin: 20px; margin-top: 0px;" >
      <h2>Cv. Atari Plastik</h2>
      <small>Jl. Terusan Suryani No. 243, Babakan, Babakan Ciparay, Bandung -40222</small>
      <hr />
      <h4 align="center">Laporan Pengiriman</h4>
    </div>
    <table border="1" id="table_produksi" class="table table-bordered table-striped table-hover">
    <thead>
    <tr class="bg-dark" style="color: white; margin: 10px;">
      <th>No</th>
      <th>Nama Barang</th>
      <th>Nama Customer</th>
      <th>Warna</th>
      <th>Tanggal Input</th>
      <th>Keterangan</th>
      <th>Qty</th>
    </tr>
    </thead>
    <tbody id="table-body">
        <?php $n =0; foreach($pengiriman as $row ){ $n++;?>
          <tr>
            <td><?=$n?></td>
            <td><?=$row->nama_barang?></td>
            <td><?=$row->nama_cust?></td>
            <td><?=$row->warna?></td>
            <td><?=$row->tanggal_input?></td>
            <td><?=$row->deskripsi?></td>
            <td><?=$row->qty?></td>
          </tr>
        <?php } ?>
    </tbody>
  </table>
  </div>
  
  <p align="center">
    <a href="<?=site_url('lap_pengiriman/index/show_all')?>">Show All</a>
  </p>
<div style="height: 100%; width: 100%; position: absolute; background: white; opacity: 75%;" id="loading">
  <div class="lds-roller" style="margin-left: 35%; opacity: 100%;">
    <div></div>
    <div></div>
    <div></div>
  </div>
  <h1 style="margin-left: 35%;"><b>Loading....</b></h1>
</div>
</section>


<?php require 'template/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
  //filter menu hiden
  var status = false;//false for hiden true for showen
  var arr_left = $('.fa-arrow-left')
  var arr_right = $('.fa-arrow-right')
  var bars = $('.fa-bars')




  var filterMenu = $('.filter');
    


  //filter menu action
  var url = '<?=site_url('Lap_pengiriman/pengiriman_filtered')?>'
  var url_search = '<?=site_url('Lap_pengiriman/pengiriman_search')?>'
  var table = $('#table-body');
  var loading = $('#loading');
    loading.hide(1);
  $('#btn-apply').click(function(){
    var jenis_input   = $('#jenis_input').val();
    var nama_cust   = $('#nama_cust').val();
    var nama_barang = $('#nama_barang').val();
    var warna     = $('#warna').val();
    var tanggal_input     = $('#tanggal_input').val();
    var postData  = {'nama_barang':nama_barang, 'nama_cust':nama_cust, 'warna':warna, 'tanggal_input':tanggal_input}
  

  //loading event
    table.hide().removeAttr('hidden');
    loading.fadeIn(500);

    $.post(url, postData, function(data){
      table.html(data);
      table.show(100)
      loading.fadeOut(500)
    })

  });

  $('#btn-print').click(function(){
    var image = "<?=base_url('assests/img/LogoAT.png')?>" 
    var content_table = $('#table-wraper').html();
    var logo = "<img src=\""+image+"\" height=\"80px\" width=\"80\">"
    var header  = $('#headeer-page').html(); 

    var old_content = $('body').html();

    $('body').html(header)
    $('body').append(content_table);
    window.print();
    $('body').html(old_content)
  });

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
    $('#tanggal_input').val('');
  });

  $('#btn-search').click(function(){

    var keyword = $('#searchBox').val();
    if (keyword != '' ) {

      //loading event
      table.hide().removeAttr('hidden');
      loading.fadeIn(500);

      $.post(url_search, {'keyword':keyword}, function(data){
        table.html(data);
        table.show(100)
        loading.fadeOut(500)
      });
    }
  });


</script>


  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script type="text/javascript">
$('#tanggal_input').datepicker({
  dateFormat : "dd/mm/yy"
});
  </script>