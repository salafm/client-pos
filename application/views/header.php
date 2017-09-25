<?php
  include('header.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="glyphicon glyphicon-shopping-cart"></i> Keranjang</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="" id="form">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Produk</th>
                          <th>Jumlah</th>
                          <th>Harga</th>
                          <th>Sub-Total</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody class="hasil">
                        <tr>
                          <td colspan="2"><strong>Total Belanja</strong></td>
                          <td colspan="2"><p><b class="total"><?php echo $this->cart->total_items(); ?></b> Item(s)</p></td></td>
                          <td style=""><b>Rp. <?php echo number_format($this->cart->total(),2,",","."); ?></b></td>
                          <td></td>
                        </tr>
                      </tbody>
                      </table>
                      <input type="submit" id="btnSave" class="btn btn-default" value="Simpan">
                      <button type="button" id="btn" class="btn btn-default pull-right" value="">Print</button>
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
                          <th>kode produk</th>
                          <th>nama</th>
                          <th>harga</th>
                          <th>stok</th>
                          <th>tambah</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($produk as $p) {?>
                          <tr class="hasil">
                              <td><?php echo $p->idproduk; ?></td>
                              <td><?php echo $p->nama; ?></td>
                              <td>Rp. <?php echo $p->harga; ?></td>
                              <td><?php echo $p->stok; ?></td>
                              <td><button type="button" class="btn btn-default submit btn-sm btn-default tambah" id="<?php echo $p->idproduk; ?>"> <i class="fa fa-shopping-cart"></i></button></td>
                          </tr>
                        <?php  } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Plain Page</h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="clearfix"></div>
                      <table id="myTable1" class="table table-striped table-bordered dt-responsive nowrap " cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>kode barang</th>
                            <th>nama</th>
                            <th>harga</th>
                            <th>stok</th>
                            <th>satuan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($barang as $b) {?>
                            <tr class="hasil">
                                <td><?php echo $b->idbarang; ?></td>
                                <td><?php echo $b->nama; ?></td>
                                <td>Rp. <?php echo $b->harga; ?></td>
                                <td><?php echo $b->stok; ?></td>
                                <td><?php echo $b->satuan; ?></td>
                            </tr>
                          <?php  } ?>
                        </tbody>
                      </table>
                      <a href="<?php echo site_url('client/reset'); ?>" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i> Clear</a>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>


<?php
  include('footer.php');
 ?>
