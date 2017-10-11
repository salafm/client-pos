<!DOCTYPE html>
<html lang="en">
  <head>
    <style media="screen">
      .right_col, .top_nav, footer{
        margin-left: 0 !important;
      }

      a.site_title{
        color: #2a3f54 !important;
        padding-left:15px;
      }

      i{
  			border:0 !important;
  			margin:0 !important;
  			padding:0 !important;
  		}

      .top_nav .navbar-right{
        float: none !important;
        width: 100% !important;
      }

      .kotak{
        padding-top: 12px;
      }

    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet');?>">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet');?>">
    <!-- NProgress -->
    <link href="<?php echo base_url('vendors/nprogress/nprogress.css" rel="stylesheet');?>">

    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css'); ?>" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url('vendors/jqvmap/dist/jqvmap.min.css'); ?>" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url('vendors/bootstrap-daterangepicker/daterangepicker.css'); ?>" rel="stylesheet">
     <!-- Datatables -->
    <link href="<?php echo base_url('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('build/css/custom.min.css" rel="stylesheet');?>">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <ul class="nav navbar-nav navbar-right">
                <div class="col-md-2 col-sm-6 col-xs-4">
                    <a href="<?php echo site_url('client')?>" class="site_title"><i class="fa fa-cutlery"></i> Waroenk<b><i>pos</i></b></a>
                </div>
                <div class="col-md-1">

                </div>
                  <li class="col-md-2 col-sm-4 col-xs-5" style="float:right; padding-left:0px; padding-right:0px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false" id="drop">
                      <img src="<?php echo base_url('build/images/user.png'); ?>" alt=""><?php echo $this->session->userdata('namapetugas');?>
                      <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                      <li><a href="javascript:;"> Profile</a></li>
                      <li>
                        <a href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                      </li>
                      <li><a href="">Help</a></li>
                      <li><a href="<?php echo site_url('login/logout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                  </li>
                  <li role="presentation" class="dropdown" style="float:right; padding-left:31px; padding-right:0px;">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-green">1</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                      <li>
                        <a>
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li>
                        <div class="text-center">
                          <a>
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>
                <div class="col-md-2 col-sm-4 col-xs-4 kotak">
                  <input class="form-control" value="<?php echo $cabang['nama']?>" disabled>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-4 kotak">
                  <?php $localIP = getHostByName(getHostName()); ?>
                  <input class="form-control" value="<?php echo $localIP ?>" disabled>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-4 kotak">
                  <input class="form-control" id="pendapatan" value="Rp. <?php echo number_format($total['total'],2,",","."); ?>" disabled>
                </div>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
          <section id="page1" class="animate">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><i class="glyphicon glyphicon-shopping-cart"></i> Keranjang</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <form class="" id="form">
                  <table class="table" width="100%">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th width="20%">Harga</th>
                        <th width="20%">Sub-Total</th>
                        <th width="5%"></th>
                      </tr>
                    </thead>
                    <tbody class="hasil">
                      <tr>
                        <td colspan="2"><strong>Total Belanja</strong></td>
                        <td colspan="2"><p><b class="total"><?php echo $this->cart->total_items(); ?></b> Item(s)</p></td>
                        <td style=""><b>Rp. <?php echo number_format($this->cart->total(),2,",","."); ?></b></td>
                        <td></td>
                      </tr>
                    </tbody>
                    <tr>
                      <td colspan="3"></td>
                      <td><b>Bayar</b></td>
                      <td style=""><b>Rp. <input type="text" name="bayar" value="0" size="6" id="inputbayar" style="border:none;"></b></td>
                      <td></td>
                    </tr>
                  </table>
                  <input type="submit" id="btnSave" class="btn btn-default" value="Simpan">
                  <input type="reset" id="clear" class="btn btn-default" value="Reset">
                </form>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><i class="glyphicon glyphicon-gift"></i> Produk</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <div class="clearfix"></div>

                <table id="myTable" class="table table-striped table-bordered dt-responsive nowrap " cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>ID Produk</th>
                      <th>Nama Produk</th>
                      <th>Harga</th>
                      <th>Stok</th>
                      <th>Tambah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($produk as $p) {
                      $hasil = $this->mdata->tampil_join3('produk_details',$p->idproduk)->result();
                      $komposisi = 'Komposisi '.$p->nama.' :'."\n";
                      foreach ($hasil as $h) {
                        $komposisi .= $h->jumlah.' '.$h->satuan.' '.$h->nama."\n";
                      }
                      ?>
                    <tr>
                      <td class="nomor"><?php echo $no; ?></td>
                      <td><?php echo $p->idproduk; ?></td>
                      <td class="kompo" title="<?php echo $komposisi; ?>"><?php echo $p->nama; ?></td>
                      <td>Rp. <?php echo number_format($p->harga,2,",","."); ?></td>
                      <td class="stok"><?php echo $p->stok; ?></td>
                      <td><a type="button" class="btn btn-default btn-sm btn-default tambah" id="<?php echo $p->idproduk; ?>"> <i class="fa fa-shopping-cart"></i></a></td>
                    </tr>
                    <?php  $no++; } ?>
                  </tbody>
                </table>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <a href="#" id="hal2" class="btn btn-default btn-sm hidden"> Halaman 2</a>
              <a href="#" id="hal3" class="btn btn-default btn-sm hidden"> Halaman 3</a>
            </div>

          </section>
          <section id="page2" class="hidden animate">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
            <div class="x_title">
            <h2>Stok Barang Mentah</h2>
            <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <div class="clearfix"></div>
            <table id="myTable1" class="table table-striped table-bordered dt-responsive nowrap " cellspacing="0" width="100%">
            <thead>
            <tr>
            <th>No.</th>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Satuan</th>
            <th>Update terakhir</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            foreach ($barang as $b) {?>
            <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $b->idbarang; ?></td>
            <td><?php echo $b->nama; ?></td>
            <td>Rp. <?php echo number_format($b->harga,2,",","."); ?></td>
            <td><?php echo $b->stok; ?></td>
            <td><?php echo $b->satuan; ?></td>
            <td><?php echo $b->tanggal ?></td>
            </tr>
            <?php  } ?>
            </tbody>
            </table>
            <a href="<?php echo site_url('client/reset'); ?>" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i> Clear</a>
            </div>
            </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <a href="#" id="hal1" class="btn btn-default btn-sm hidden"> Halaman 1</a>
              <a href="#" id="hal3" class="btn btn-default btn-sm hidden"> Halaman 3</a>
            </div>

          </section>
          <section id="page3" class="hidden animate">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                        <h2>Tabel History Transaksi</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                      <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Bahan Masuk</a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Barang Keluar</a>
                      </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        <div class="x_title">
                        <h2>Data Barang Masuk </h2>
                          <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <table id="myTable1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                              <thead>
                                <tr>
                                  <th>No. </th>
                                  <th>ID Transaksi</th>
                                  <th>Deskripsi</th>
                                  <th>Waktu Transaksi</th>
                                  <th>Info Detail</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                    						$no = 1;
                    						foreach($barangmasuk as $b){
                    					  ?>
                                    <tr id="<?php echo $b->idtransaksi; ?>">
                                    <td><?php echo $no++?></td>
                                    <td title="Kolom ini tidak bisa diedit"
                                    class=""><?php echo $b->idtransaksi?></td>
                                    <td title="Kolom ini tidak bisa diedit"
                                    class="" id=""><?php echo $b->deskripsi?></td>
                                    <td title="Kolom ini tidak bisa diedit"
                                    class="" id=""><?php echo strftime("%A, %d/%m/%Y : %T", strtotime($b->tanggal)); ?></td>
                                    <td><button class="btn btn-default btn-sm details" id="">
                                    <i class="fa fa-info-circle"></i>  &nbsp;details</button></td>
                                    </tr>
                    					  <?php }?>
                              </tbody>
                            </table>
                        </div>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile2-tab">
                        <div class="x_title">
                        <h2>Data Barang Keluar </h2>
                          <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <table id="myTable2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" style="width:100%">
                              <thead>
                                <tr>
                                  <th>No. </th>
                                  <th>ID Transaksi</th>
                                  <th>Cabang Tujuan</th>
                                  <th>Deskripsi</th>
                                  <th>Waktu Transaksi</th>
                                  <th>Info Detail</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                    						$no = 1;
                    						foreach($barangkeluar as $bk){
                    					  ?>
                                    <tr id="<?php echo $bk->idtransaksi; ?>">
                                    <td><?php echo $no++?></td>
                                    <td title="Kolom ini tidak bisa diedit"
                                    class="" id="idtransaksi"><?php echo $bk->idtransaksi?></td>
                                    <td title="Kolom ini tidak bisa diedit"
                                    class="" id=""><?php echo $bk->nama?></td>
                                    <td title="Kolom ini tidak bisa diedit"
                                    class="desk" id=""><?php echo $bk->deskripsi?></td>
                                    <td title="Kolom ini tidak bisa diedit"
                                    class="" id=""><?php echo strftime("%A, %d/%m/%Y : %T", strtotime($bk->tanggal)); ?></td>
                                    <td><button class="btn btn-default btn-sm details" id="">
                                    <i class="fa fa-info-circle"></i>  &nbsp;details</button></td>
                                    </tr>
                    					  <?php }?>
                              </tbody>
                            </table>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="">
              <a href="#" id="hal1" class="btn btn-default btn-sm hidden"> Halaman 1</a>
              <a href="#" id="hal2" class="btn btn-default btn-sm hidden"> Halaman 2</a>
            </div>
          </section>
          </div>
          </div>
        </div>

        <footer>
          <div class="pull-right">
            Page rendered in <strong>{elapsed_time}</strong> seconds. Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
        </div>
      </div>


    <!-- jQuery -->
    <script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js');?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('vendors/fastclick/lib/fastclick.js');?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('vendors/nprogress/nprogress.js');?>"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url('vendors/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatables.net-responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatables.net-scroller/js/dataTables.scroller.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/jszip/dist/jszip.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/pdfmake/build/pdfmake.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/pdfmake/build/vfs_fonts.js'); ?>"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('build/js/custom.min.js');?>"></script>
    <script>
    function fok(){
      $(document).on('focus','#inputbayar', function(){
        if($('#inputbayar').val() == 0){
          $('#inputbayar').val('');
        }
      });
      $('#inputbayar').focus();
    }

    function std(){
      $(function(){
        $('#myTable_length').closest('div.col-sm-6').attr('class','col-sm-5 col-xs-5');

        $('a.tambah').each(function(){
          var stok = $(this).closest('tr').find('td.stok').html();
          if(stok == 0){
            $(this).attr('class','btn btn-default btn-sm btn-default tambah disabled');
            $(this).prop('disabled', true);
          }
          else {
            $(this).attr('class','btn btn-default btn-sm btn-default tambah');
            $(this).prop('disabled', false);
          }
        });
      })
    }

    $.expr[':'].textEquals = $.expr.createPseudo(function(arg) {
        return function( elem ) {
            return $(elem).text().match("^" + arg + "$");
        };
    });

    function inittable(table) {
      var t = $(table).DataTable({
        responsive:false,
        "columnDefs": [ {
            "searchable": false,
            "targets": 0
        }],
        "order": [[ 0, 'asc' ]]
      });

      t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
      }).draw();
    }

    $(function(){
      std();
      inittable('#myTable');
      inittable('#myTable1');

      $('#hal1').click(function(){
        $('#page2').hide();
        $('#page3').hide();
        $('#page1').fadeIn();
      });

      $('#hal2').click(function(){
        $('#page1').hide();
        $('#page3').hide();
        $('#page2').fadeIn();
        $('#page2').attr('class','animate');
      });

      $('#hal3').click(function(){
        $('#page1').hide();
        $('#page2').hide();
        $('#page3').fadeIn();
        $('#page3').attr('class','animate');
      });

      $(document).on('blur','#inputbayar', function(){
        if($('#inputbayar').val() == ''){
          $('#inputbayar').val('0');
        }
      }).on('keypress','input[type="number"]', function(e){
        if(e.keyCode == 13){
           e.preventDefault();
           var id = $(this).closest('tr').prop('id');
           var value = $(this).val();
           var ids = $(this).prop('id');
           $.ajax({
             url:'<?php echo site_url('client/updatecart/') ?>',
             type:'get',
             data:{'id' : id, 'value': value},
             dataType:'json',
             success:function(data){
               $('tbody.hasil').html(data.isi);
             }
           });
           $("input").blur();
        }
      }).on('keyup', function(e){
        e.preventDefault();
        if(!$("input").is(":focus")){
          console.log(e.keyCode);
          if (e.keyCode == 65) {
            fok();
          }else if (e.keyCode == 88) {
            $('tbody.hasil tr').first().find('td a.kurang').click();
          }else if (e.altKey && (e.keyCode >= 48 && e.keyCode <= 57)) {
            var c = 10;
            for (var i = 48; i <= 57; i++) {
              if(e.altKey && e.keyCode == i){
                var teks = $("td.nomor:textEquals('"+c+"')").closest('tr').find('td.kompo').attr('title');
                alert(teks);
              }
              c++;
              c = c%10;
            }
          }else if (e.keyCode >= 48 && e.keyCode <= 57) {
            var c = 10;
            for (var i = 48; i <= 57; i++) {
              if(e.keyCode == i){
                $("td.nomor:textEquals('"+c+"')").closest('tr').find('td a').click();
              }
              c++;
              c = c%10;
            }
          }

          if($('#page1').is(":visible")){
            if (e.keyCode == 39) {
              $('#hal2').click();
            }else if (e.keyCode == 37) {
              $('#hal3').click();
            }else if(e.keyCode == 83){
              $('div#myTable_filter input.input-sm').focus();
            }
          }else if ($('#page2').is(":visible")) {
            if (e.keyCode == 39) {
              $('#hal3').click();
            }else if (e.keyCode == 37) {
              $('#hal1').click();
            }else if(e.keyCode == 83){
              $('div#myTable1_filter input.input-sm').focus();
            }
          }else if ($('#page3').is(":visible")) {
            if (e.keyCode == 39) {
              $('#hal1').click();
            }else if (e.keyCode == 37) {
              $('#hal2').click();
            }
          }
        }else if (e.keyCode == 27) {
          $("input").blur();
        }
      }).on('click','.tambah',function(){
        var id = $(this).prop('id');
        $.get({
          url:'<?php echo site_url('client/tambahcart/') ?>'+id,
          dataType:'json',
          success:function(data){
            $('tbody.hasil').html(data.isi);
            $('#isi').html(data.isinya);
            $('#'+id).focus();
          }
        });
      }).on('click','.kurang',function(){
        var id = $(this).prop('id');
        $.get({
          url:'<?php echo site_url('client/hapuscart/') ?>'+id,
          dataType:'json',
          success:function(data){
            $('tbody.hasil').html(data.isi);
          }
        });
      }).on('click','#clear', function(){
        $.get({
          url: '<?php echo site_url('client/resetcart') ?>',
          dataType:'json',
          success:function(data){
            $('tbody.hasil').html(data.isi);
          }
        });
      });

      $('#form').submit(function (e){
        var value = $('#inputbayar').val();
        $('#inputbayar').val('0');
        $.ajax({
          url : '<?php echo site_url('client/simpantransaksi/');?>',
          type: "POST",
          data: $('#form').serialize(),
          dataType:'json',
          success: function(data){
            $('#myTable, #myTable1').DataTable().destroy();
            $('#myTable tbody').html(data.produk);
    				$('#myTable1 tbody').html(data.barang);
    				$(document).ready(function() {
              inittable('#myTable1');
    					inittable('#myTable');
    				});
            $('#pendapatan').val('Rp. '+data.penghasilan);
            $('tbody.hasil').html(data.isi);
            $("<iframe>").hide().attr('src','<?php echo site_url('invoice/index/');?>'+data.id+'/'+value).appendTo("body");
            std();
          },
          error: function (jqXHR, textStatus, errorThrown){
            alert('Field belum terisi');
          }
        });
        e.preventDefault();
      });
    });
    </script>
  </body>
</html>
