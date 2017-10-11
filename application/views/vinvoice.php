<!DOCTYPE html>
<html lang="en">
  <head>
    <style media="screen">
      .main_container{
        color:black !important;
      }

    </style>
    <style media="print">
      table.table.table-striped tr.polos td {
        border: none !important;
      }
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Print Invoice | </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet');?>">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet');?>">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('build/css/custom.min.css" rel="stylesheet');?>">
  </head>

  <body class="nav-md" onload="window.print()">
    <div class="container body">
      <div class="main_container">
        <div class="row">
          <div class="col-md-6">
            <div class="x_panel">
              <div class="x_title">
                <div class="row">
                  <div class="col-xs-12 invoice-header">
                    <h4>
                        <i class="fa fa-cutlery"></i> Waroenk<b><i>pos</i></b>
                    </h4>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <section class="content invoice">
                  <!-- title row -->
                  <?php
                  $satu = substr($cabang[0]->telfon,0,4);
                  $dua = substr($cabang[0]->telfon,4,3);
                  $tiga = substr($cabang[0]->telfon,7);
                  $telp = $satu.'-'.$dua.'-'.$tiga;
                   ?>
                  <!-- info row -->
                  <div class="row invoice-info">
                    <div class="col-sm-5 invoice-col">
                      <address>
                        <strong><?php echo $cabang[0]->nama ?></strong>
                        <br> <?php echo $cabang[0]->alamat ?>
                        <br> <?php echo $telp ?>
                        <br> <?php echo $cabang[0]->email ?>
                      </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 invoice-col">

                    </div>
                    <div class="col-sm-4 invoice-col">
                      <b>Id #<?php echo $transaksi[0]->idtransaksi ?></b>
                      <br><?php echo $transaksi[0]->nama ?>
                      <br> <?php echo date('d-m-Y H:i:s'); ?>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <!-- Table row -->
                  <div class="row">
                    <div class="col-xs-12 table">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>No. </th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($produk as $p) { ?>
                            <tr>
                              <td><?php echo $no++ ?></td>
                              <td><?php echo $p->nama ?></td>
                              <td><?php echo $p->jumlah ?></td>
                              <td>Rp. <?php echo number_format($p->harga,2,",","."); ?></td>
                            </tr>
                          <?php  } ?>
                          <tr>
                            <td colspan="2"><b>Total Belanja</b></td>
                            <td><b><?php echo $transaksi[0]->totalbarang ?></b> Item(s)</td>
                            <td><b>Rp. <?php echo number_format($transaksi[0]->totalharga,2,",","."); ?></b></td>
                          </tr>
                          <tr class="polos"><td colspan="4">&nbsp;</td></tr>
                          <tr class="polos">
                            <td colspan="2"></td>
                            <td>Bayar</td>
                            <td>Rp. <?php echo number_format($bayar['pembayaran'],2,",","."); ?></td>
                          </tr>
                          <tr class="polos">
                            <td colspan="2"></td>
                            <td>Total</td>
                            <td>Rp. <?php echo number_format($transaksi[0]->totalharga,2,",","."); ?></td>
                          </tr>
                          <tr>
                            <td colspan="2"></td>
                            <td><b>Kembalian</b></td>
                            <td><b>Rp. <?php echo number_format($bayar['pembayaran']-$transaksi[0]->totalharga,2,",","."); ?></b></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js');?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('vendors/fastclick/lib/fastclick.js');?>"></script>
      <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('build/js/custom.min.js');?>"></script>
    <script>

    </script>
  </body>
</html>
