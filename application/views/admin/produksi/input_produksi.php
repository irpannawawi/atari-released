

 <!-- Modal Change Machine -->
<div class="modal fade" id="change_machine" tabindex="-1" aria-labelledby="change_machine" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mesin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row">
      <div class="col-12">
          <div class="form-group">
            <input type="text" id="id_production_val" class="form-control" hidden>
          <select class="form-control" id="select_mesin">
            <option value="">Release</option>
            <?php foreach($list_mesin as $mesin){?>
              <option value="<?=$mesin->no_mesin?>"><?=$mesin->no_mesin?>-<?=$mesin->nama_mesin?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="save_mesin" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Produksi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Produksi</a></li>
              <li class="breadcrumb-item active">list</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
    	<div class="card">
        <div class="card-header">
          <h3 style="float: left;">Dalam Produksi</h3>
          <button type="button" class="close card-close" style="float: right;"><i class="fa fa-window-close"></i></button>
          <button type="button" class="close card-minimize" style="float: right;"><i class="fa fa-window-minimize"></i></button>
          <button type="button" class="close card-maximize" style="float: right;"><i class="fa fa-window-maximize"></i></button>
          <script type="text/javascript">
              $('.card-maximize').hide();
          </script>
        </div>
    		<div class="card-body">
          <div class="table-responsive-xl">
    			<table class="table table-bordered table-striped table-hover table-responsive table-produksi">
            <thead class="thead-dark">
    				<tr>
    					<th>No</th>
    					<th>Customer</th>
    					<th nowrap>Tanggal PO</th>
    					<th nowrap>No Po</th>
    					<th nowrap>Part No</th>
    					<th nowrap>Nama Barang</th>
              <th>Warna</th>
              <th>Qty</th>
              <th nowrap>Blnc Prod</th>
              <th>Warna</th>
              <th>
                Mesin
              </th>
              <th>
                Status
              </th>
              <th>Aksi</th>
    				</tr>
            </thead>
            <tbody>
              <?php $n=0; foreach ($list_produksi as $key) {$n++; ?>
                <?php 
                  $target_jam     = round(3600/$key->ct*$key->cav);
                  $target_shift   = $target_jam*8;
                  $target_hari    = $target_shift*3;
                  $wip_bln_lalu   = $this->produksi_model->get_wip_lalu(    $key->no_po,  $key->part_no);
                  $wip_bln_ini    = $this->produksi_model->get_wip_bln_ini( $key->no_po,  $key->part_no);
                  $fg_bln_lalu    = $this->produksi_model->get_fg_lalu(     $key->no_po,  $key->part_no);
                  $fg_bln_ini     = $this->produksi_model->get_fg_bln_ini(  $key->no_po,  $key->part_no);

                  //var_dump($wip_bln_ini->result());

                  $total_wip    = $wip_bln_ini  + $wip_bln_lalu;
                  $total_fg     = $fg_bln_ini   + $fg_bln_lalu;
                  $lama_prod    = round($key->blnc_prod/$target_jam);
                  
                 ?>
                <tr>
                  <td>
                    <?=$n?>
                  </td>
                  <td>
                    <?=$key->nama_customer?>
                  </td>
                  <td>
                    <?=$key->tanggal_po?>
                  </td>
                  <td>
                    <?=$key->no_po?>
                  </td>
                  <td>
                    <?=$key->part_no?>
                  </td>
                  <td>
                    <?=$key->nama_barang?>
                  </td>
                  <td>
                    <?=$key->warna?>
                  </td>
                  <td>
                    <?=$key->qty?>
                  </td>
                  <td>
                    <?=
                    $key->blnc_prod<0?'('.abs($key->blnc_prod).')':$key->blnc_prod;
                    ?>
                  </td>
                  <td>
                    <?=$key->warna?>
                  </td>
                  <td align="center">
                    <button 
                        type="button"
                        data-toggle="modal" 
                        class="btn btn-warning" 
                        onclick="set_production_id('<?=$key->no_po?>', '<?=$key->nama_barang?>', '<?=$key->id_production?>')" 
                        data-target="#change_machine">
                    <?=!empty($key->no_mesin)?$key->no_mesin:'Belum ditentukan'?>
                          
                        </button>
                        <br>
                        <span class="badge badge-secondary"><?=$key->nama_mesin?></span>
                  </td>
                 <td class="btn-status-<?=$key->id_production?>">
                    <!-- RUNNING -->
                     <?php if(!empty($key->no_mesin) AND $key->status == "RUNNING"){?>
                              <!--Value if true-->
                              <button 
                              onClick="change_to_stop('<?=$key->id_production?>','<?=site_url('produksi/change_status/stop/')?>')"
                              class="btn btn-success">
                                Running
                              </button>
                            <?php }else{ ?>
                              <!--value if fale-->
                              <button 
                              onClick="change_to_run('<?=$key->id_production?>','<?=site_url('produksi/change_status/running/')?>')"
                              class="btn btn-danger">
                                Stoped
                              </button>
                            <?php } ?>

                  </td>
                  <td>
                    <button 
                          type="button" 
                          class="btn btn-primary" 
                          data-toggle="modal" 
                          onclick="get_url('<?=$key->part_no?>','<?=$key->no_po?>','<?=$key->nama_barang?>')" 
                          data-target="#exampleModal">
                    Input
                    </button>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
    			</table>
          </div>
    		</div>
        <div class="card-footer">
          
        </div>
    	</div>
    </section>

</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row">

<!-- MODAL OPERATOR
                  <option value="<?=$op->id_operator?>"><?=$op->nama_operator?></option>
                
-->
                <div class="modal submodal" id="modal_operator" aria-labelledby="modal_operator" role="dialog"  aria-hidden="true">
                  <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                      <div class="modal-body">
                        <button type="button" class="close" data-dismiss="#modal_operator" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 align="center" class="modal-title" id="exampleModalLabel">Operator</h5>
                        <div class="row">
                          <div class="col-12">
                            <table class="table table-striped table-hover table-bordered ">
                            <?php foreach ($list_operator as $op) { ?>
                            <tr onclick="fill_operator('<?=$op->id_operator?>','<?=$op->nama_operator?>')">
                              <td><?=$op->id_operator?></td>
                              <td><?=$op->nama_operator?></td>
                            </tr>
                            <?php } ?>
                          </table>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                      </div>
                    </div>
                  </div>
                  </div>
         <!--./ MODAL OPERATOR  -->



        <div class="col-lg-4">
          <!--Input ihdden for save po and part number-->
            <input type="text" id="no_po" name="ct" class="form-control form" hidden />
            <input type="text" id="part_no" name="ct" class="form-control form" hidden />
          <!--/Input ihdden for save po and part number-->
        <div class="form-group">
          <label for="operator">Operator</label>
          <div class="input-group mb-2 mr-sm-2">
            <input type="text" class="form-control" id="operator" hidden>
            <input type="text" class="form-control" id="nama_operator">
            <div class="input-group-prepend">
              <button 
                type="button" 
                class="btn btn-sm  btn-primary input-group-text"
                data-toggle="modal"
                data-target="#modal_operator"
                >
                <i class="fa fa-folder"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="ct">Ct</label>
          <input type="text" id="ct" name="ct" class="form-control form">
        </div>
        <div class="form-group">
          <label for="cav">CAV</label>
          <input type="number" id="cav" name="CAV" class="form-control form">
        </div>
        <div class="form-group">
          <label for="bruto">Bruto</label>
          <input type="number" id="bruto" name="bruto" class="form-control form">
        </div>
        <div class="form-group">
          <label for="netto">Netto</label>
          <input type="number" id="netto" name="netto" class="form-control form">
        </div>
        <div class="form-group">
          <label for="fg">FG</label>
          <input type="number" id="fg" name="fg" class="form-control form">
        </div>
        <div class="form-group">
          <label for="wip">WIP</label>
          <input type="number" id="wip" name="wip" class="form-control form">
        </div>
        <div class="form-group">
          <label for="short_m">Short M</label>
          <input type="number" id="short_m" name="short_m" class="form-control form">
        </div>
      </div>





      <div class="col-lg-4">
        <div class="form-group" style="background: lightgrey">
          <label for="shift">Shift</label>
          <select id="shift"  class="form-control">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
          </select>
        </div>
        <div class="form-group">
          <label for="silver">Silver</label>
          <input type="text" id="silver" name="silver" class="form-control form">
        </div>
        <div class="form-group">
          <label for="black_dot">Black Dot</label>
          <input type="text" id="black_dot" name="black_dot" class="form-control form">
        </div>
        <div class="form-group">
          <label for="bubble">Bubble</label>
          <input type="text" id="bubble" name="bubble" class="form-control form">
        </div>
        <div class="form-group">
          <label for="f_mark">F. Mark</label>
          <input type="text" id="f_mark" name="f_mark" class="form-control form">
        </div>
        <div class="form-group">
          <label for="discolor">discolor</label>
          <input type="text" id="discolor" name="discolor" class="form-control form">
        </div>
        <div class="form-group">
          <label for="flashing">Flashing</label>
          <input type="text" id="flashing" name="flashing" class="form-control form">
        </div>
        <div class="form-group">
          <label for="crack">Crack</label>
          <input type="text" id="crack" name="crack" class="form-control form">
        </div>
      </div>



      <div class="col-lg-4">
        <div class="form-group" style="background: lightgrey">
          <label for="tanggal_input">Tanggal</label>
          <input type="text" id="tanggal_input" name="tanggal_input" value="<?=date('d/m/Y')?>" class="form-control form">
        </div>
        <div class="form-group">
          <label for="s_mark">S.Mark</label>
          <input type="text" id="s_mark" name="s_mark" class="form-control form">
        </div>
        <div class="form-group">
          <label for="under_over_cut">Under/Over Cut</label>
          <input type="text" id="under_over_cut" name="under_over_cut" class="form-control form">
        </div>
        <div class="form-group">
          <label for="lain_lain">Lain2</label>
          <input type="text" id="lain_lain" name="lain_lain" class="form-control form">
        </div>
        <div class="form-group">
          <label for="ng_total">Ng Total</label>
          <input type="text" id="ng_total" name="ng_total" class="form-control form">
        </div>
        <div class="form-group">
          <label for="bahan_keluar">Bahan Keluar</label>
          <input type="text" id="bahan_keluar" name="bahan_keluar" class="form-control form">
        </div>
        <div class="form-group">
          <label for="gilingan">Gilingan</label>
          <input type="text" id="gilingan" name="gilingan" class="form-control form">
        </div>
        <div class="form-group">
          <label for="no_sj">No. SJ</label>
          <input type="text" id="no_sj" name="no_sj" class="form-control form">
        </div>
        <div class="form-group">
          <label for="qty_kirim">Qty Kirim</label>
          <input type="text" id="qty_kirim" name="qty_kirim" class="form-control form">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save_produksi">Save changes</button>
      </div>
    </div>
  </div>
</div>




<script type="text/javascript">
  function get_url(part_no, no_po, nama_barang) {
    $('.modal-header').html('<h4 class="modal-title">'+nama_barang+'</h4><h6> '+no_po+'</h6>');
    $('#part_no').val(part_no);
    $('#no_po').val(no_po);
  }

  $('#save_produksi').click(function(){
    url = "<?=site_url()?>"+"/produksi/daily_input";
    insertData = {
      no_po           : $('#no_po').val(), 
      part_no         : $('#part_no').val(), 
      operator        : $('#operator').val(),
      nama_operator   : $('#nama_operator').val(),
      shift           : $('#shift').val(),
      ct              : $('#ct').val(),
      cav             : $('#cav').val(),
      bruto           : $('#bruto').val(),
      netto           : $('#netto').val(), 
      fg              : $('#fg').val(),
      wip             : $('#wip').val(),
      short_m         : $('#short_m').val(),
      silver          : $('#silver').val(),
      black_dot       : $('#black_dot').val(),
      bubble          : $('#bubble').val(),
      f_mark          : $('#f_mark').val(),
      discolor        : $('#discolor').val(),
      flashing        : $('#flashing').val(),
      crack           : $('#crack').val(),
      s_mark          : $('#s_mark').val(),
      under_over_cut  : $('#under_over_cut').val(),
      lain_lain       : $('#lain_lain').val(),
      ng_total        : $('#ng_total').val(),
      bahan_keluar    : $('#bahan_keluar').val(),
      gilingan        : $('#gilingan').val(),
      no_sj           : $('#no_sj').val(),
      qty_kirim       : $('#qty_kirim').val(),
      tanggal_input   : $('#tanggal_input').val()

}
console.log(insertData);
    $.post(url,insertData,function(data){
      Swal.fire('Success','Data Berhasil Dimasukan','success');
      location.reload(true);
    });
  });

  function set_production_id(no_po, nama_barang, id_production){
    $('#id_production_val').val(id_production);
    $('.modal-header').html('<h4 class="modal-title">'+nama_barang+'</h4><h6> '+no_po+'</h6>');
  }

  $('#save_mesin').click(function(){
      id_production = $('#id_production_val').val();
      mesin = $('#select_mesin').val();
      url = "<?=site_url('produksi/change_machine/')?>"+id_production
      $.post(url, {no_mesin:mesin}, function(data){
        location.reload(true);
      });
  });
</script>

<script type="text/javascript">
  //card hiding and dismiss
  $('.card-close').click(function(){
    $('.card').slideUp();
  })

  $('.card-minimize').click(function(){
    $('.card-body').slideToggle(1000);
    $('.card-minimize').hide();
    $('.card-maximize').show(500);
    
  });

  $('.card-maximize').click(function(){
    $('.card-body').slideToggle(1000);
    $('.card-maximize').hide();
    $('.card-minimize').show(500)

  });
</script>

<script type="text/javascript">
  //submodal 
  //$('#modal_operator').submodal('open');
  //$('#modal_operator').submodal('close');
  //$('#modal_operator').submodal('toggle');

  function fill_operator(id,nama)
  {
    console.log(nama);
    $('#operator').val(id);
    $('#nama_operator').val(nama);
    $('#modal_operator').hide();
    $('.modal-backdrop').last().hide();

  }
</script>