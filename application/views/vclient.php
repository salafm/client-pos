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

      .meja{
        padding : 3% 0 !important;
      }

      .glyphicon-remove {
        color: red;
        font-size: 20px;
      }

      .glyphicon-ok{
        color:green;
        font-size: 20px;
      }

      .apaya{
        color:red;
        text-decoration: underline;
      }
      table.tabel{
        width: 70%;
  			margin-left: auto;
  			margin-right: auto;
      }
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Waroenkpos | <?php echo $cabang['nama']?></title>

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
                    <a href="javascript:;" class="user-profile dropdown-toggle pull-right" data-toggle="dropdown" aria-expanded="false" id="drop">
                      <img src="<?php echo base_url('build/images/user.png'); ?>" alt=""><?php echo $this->session->userdata('namapetugas');?>
                      <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                      <!-- <li><a href="javascript:;"> Profile</a></li>
                      <li>
                        <a href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                      </li>
                      <li><a href="">Help</a></li> -->
                      <li><a href="<?php echo site_url('login/logout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                  </li>
                  <!-- <li role="presentation" class="dropdown" style="float:right; padding-left:31px; padding-right:0px;">
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
                  </li> -->
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
                  <div class="pull-right">
                    <label id="nomor" for="">Nomor Meja : --- </label>
                  </div>
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
                  <input type="submit" id="btnSave" class="btn btn-default" value="Cetak Nota">
                  <input type="reset" id="clear" class="btn btn-default" value="Reset">
                  <input type="button" id="btnSave1" class="btn btn-default pull-right" value="Simpan">
                </form>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><i class="glyphicon glyphicon-gift"></i> Produk</h2>
                  <a class="btn btn-default btn-sm pull-right" id="tombol"><span class="glyphicon glyphicon-bed"></span> Pilih Meja</a>
                  <a class="btn btn-default btn-sm pull-right" id="tombol2"><span class="glyphicon glyphicon-refresh"></span> Sinkronisasi</a>
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
            <td><?php echo str_replace('.',',',($b->stok*1)); ?></td>
            <td><?php echo $b->satuan; ?></td>
            <td><?php echo $b->tanggal ?></td>
            </tr>
            <?php  } ?>
            </tbody>
            </table>
            <!-- <a href="<?php echo site_url('client/reset'); ?>" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i> Clear</a> -->
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
                      <li role="presentation" class="active"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Bahan Masuk</a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Barang Keluar</a>
                      </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="profile-tab">
                        <div class="x_title">
                        <h2>Data Barang Masuk </h2>
                          <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <table id="tb" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                              <thead>
                                <tr>
                                  <th>No. </th>
                                  <th>ID Manifest</th>
                                  <th>Deskripsi</th>
                                  <th>Waktu Diterima</th>
                                  <th>Info Detail</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                    						$no = 1;
                    						foreach($tm as $b){
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
                            <table id="tk" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" style="width:100%">
                              <thead>
                                <tr>
                                  <th>No. </th>
                                  <th>ID Transaksi</th>
                                  <th>Nama Petugas</th>
                                  <th>Total Item</th>
                                  <th>Total Harga</th>
                                  <th>Waktu Transaksi</th>
                                  <th>Info Detail</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                    						$no = 1;
                    						foreach($tk as $bk){
                    					  ?>
                                    <tr id="<?php echo $bk->idtransaksi; ?>">
                                    <td><?php echo $no++?></td>
                                    <td class="" id="idtransaksi"><?php echo $bk->idtransaksi?></td>
                                    <td class="" id=""><?php echo $bk->nama?></td>
                                    <td class="" id=""><?php echo $bk->totalbarang?></td>
                                    <td class="" id="">Rp. <?php echo number_format($bk->totalharga,2,",",".")?></td>
                                    <td class="" id=""><?php echo strftime("%A, %d/%m/%Y : %T", strtotime($bk->tanggal)); ?></td>
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

      <!-- Bootstrap modal -->
      <div class="modal fade" id="modal_meja" role="dialog">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title">Pilih Meja</h3>
        </div>
          <form action="#" id="form_meja" class="form-horizontal">
        <div class="modal-body form">
            <div class="form-body">
              <div class="form-group">
                <div class="col-md-1"></div>
                <a href="#" id="meja1" class="btn btn-default col-md-2 meja">1</a>
                <a href="#" id="meja2" class="btn btn-default col-md-2 meja">2</a>
                <a href="#" id="meja3" class="btn btn-default col-md-2 meja">3</a>
                <a href="#" id="meja4" class="btn btn-default col-md-2 meja">4</a>
                <a href="#" id="meja5" class="btn btn-default col-md-2 meja">5</a>
              </div>
              <div class="form-group">
                <div class="col-md-1"></div>
                <a href="#" id="meja6" class="btn btn-default col-md-2 meja">6</a>
                <a href="#" id="meja7" class="btn btn-default col-md-2 meja">7</a>
                <a href="#" id="meja8" class="btn btn-default col-md-2 meja">8</a>
                <a href="#" id="meja9" class="btn btn-default col-md-2 meja">9</a>
                <a href="#" id="meja10" class="btn btn-default col-md-2 meja">10</a>
              </div>
              <div class="form-group">
                <div class="col-md-1"></div>
                <a href="#" id="meja11" class="btn btn-default col-md-2 meja">11</a>
                <a href="#" id="meja12" class="btn btn-default col-md-2 meja">12</a>
                <a href="#" id="meja13" class="btn btn-default col-md-2 meja">13</a>
                <a href="#" id="meja14" id="meja3" class="btn btn-default col-md-2 meja">14</a>
                <a href="#" id="meja15" class="btn btn-default col-md-2 meja">15</a>
              </div>
              <div class="form-group">
                <div class="col-md-1"></div>
                <a href="#" id="meja16" class="btn btn-default col-md-2 meja">16</a>
                <a href="#" id="meja17" class="btn btn-default col-md-2 meja">17</a>
                <a href="#" id="meja18" class="btn btn-default col-md-2 meja">18</a>
                <a href="#" id="meja19" class="btn btn-default col-md-2 meja">19</a>
                <a href="#" id="meja20" class="btn btn-default col-md-2 meja">20</a>
              </div>
              <div class="form-group">
                <div class="col-md-1"></div>
                <a href="#" id="meja21" class="btn btn-default col-md-2 meja">21</a>
                <a href="#" id="meja22" class="btn btn-default col-md-2 meja">22</a>
                <a href="#" id="meja23" class="btn btn-default col-md-2 meja">23</a>
                <a href="#" id="meja24" class="btn btn-default col-md-2 meja">24</a>
                <a href="#" id="meja25" class="btn btn-default col-md-2 meja">25</a>
              </div>
              <div class="form-group">
                <div class="col-md-1"></div>
                <a href="#" id="meja26" class="btn btn-default col-md-2 meja">26</a>
                <a href="#" id="meja27" class="btn btn-default col-md-2 meja">27</a>
                <a href="#" id="meja28" class="btn btn-default col-md-2 meja">28</a>
                <a href="#" id="meja29" class="btn btn-default col-md-2 meja">29</a>
                <a href="#" id="meja30" class="btn btn-default col-md-2 meja">30</a>
              </div>
              <div class="form-group">
                <div class="col-md-1"></div>
                <a href="#" id="meja31" class="btn btn-default col-md-2 meja">31</a>
                <a href="#" id="meja32" class="btn btn-default col-md-2 meja">32</a>
                <a href="#" id="meja33" class="btn btn-default col-md-2 meja">33</a>
                <a href="#" id="meja34" class="btn btn-default col-md-2 meja">34</a>
                <a href="#" id="meja35" class="btn btn-default col-md-2 meja">35</a>
              </div>
              <div class="form-group">
                <div class="col-md-1"></div>
                <a href="#" id="meja36" class="btn btn-default col-md-2 meja">36</a>
                <a href="#" id="meja37" class="btn btn-default col-md-2 meja">37</a>
                <a href="#" id="meja38" class="btn btn-default col-md-2 meja">38</a>
                <a href="#" id="meja39" class="btn btn-default col-md-2 meja">39</a>
                <a href="#" id="meja40" class="btn btn-default col-md-2 meja">40</a>
              </div>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default batal1" data-dismiss="modal">Batal</button>
            </div>
          </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <!-- End Bootstrap modal -->

      <!-- Bootstrap modal -->
      <div class="modal fade" id="modal_form_produk" role="dialog">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title"></h3>
        </div>
          <form action="#" id="form2" class="form-horizontal">
        <div class="modal-body form">
            <div class="form-body">
              <div class="form-group">
                <label class="control-label col-md-1" id="ikon"></label>
                <label class="control-label col-md-2"> Id Manifest</label>
                <div class="col-md-9">
                  <input name="manifest" id="manifest" placeholder="Masukkan Id manifest yg sesuai" class="form-control" type="text" autocomplete="off" required>
                </div>
              </div>
              <div class="modal-header">
                <h4 class="" align="center">Daftar Barang</h4>
              </div>
              <div class="modal-body form" id="form-body4">
              </div>
            </div>
            </div>
            <div class="modal-footer" id="apaya">
            </div>
          </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <!-- End Bootstrap modal -->

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
    var table;
    var tm;
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
        var meja = $('#nomor').html().replace('Nomor Meja : ','');
        var id = $(this).prop('id');
        if(meja == '--- '){
          $('#tombol').click();
        }else {
          $.get({
            url:'<?php echo site_url('client/tambahcart/') ?>'+id,
            dataType:'json',
            success:function(data){
              $('tbody.hasil').html(data.isi);
              $('#'+id).focus();
            }
          });
        }
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
        var id = $('#nomor').html().replace('Nomor Meja : ','');
        var value = $('#inputbayar').val();
        $('#inputbayar').val('0');
        $.ajax({
          url : '<?php echo site_url('client/simpantransaksi/');?>',
          type: "POST",
          data: $('#form').serialize()+'&idmeja='+id,
          dataType:'json',
          success: function(data){
            $('#myTable, #myTable1, #tk').DataTable().destroy();
            $('#myTable tbody').html(data.produk);
            $('#myTable1 tbody').html(data.barang);
    				$('#tk tbody').html(data.tk);
    				$(document).ready(function() {
              inittable('#myTable1');
    					inittable('#myTable');
              table = $('#tk').DataTable({responsive:false});
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

    //-----------------------pilih meja--------------------------------------------
    $(document).on('click', '#tombol', function(){
      $('#modal_meja').modal('show');
      $.get({
        url : '<?php echo site_url('client/cekmeja') ?>',
        dataType: 'JSON',
        success:function(data){
          for (var i = 0; i < data.length; i++) {
            var id = i + 1;
            if(data[i] == 1){
              $('#meja'+id).attr('class','btn btn-danger col-md-2 meja');
            }else{
              $('#meja'+id).attr('class','btn btn-default col-md-2 meja');
            }
          }
        }
      });
    }).on('click', '.meja', function(){
      var id = $(this).prop('id').replace('meja','');
      $('#nomor').html('Nomor Meja : '+id);
      $('#modal_meja').modal('hide');
      if($(this).prop('class') == 'btn btn-default col-md-2 meja'){
        $('#clear').click();
      }
      $.ajax({
        url: '<?php echo site_url('client/tampiltrans/') ?>'+id,
        type: 'get',
        dataType:'JSON',
        success:function(data){
          $('tbody.hasil').html(data.isi);
        }
      });
    }).on('click','#btnSave1', function(){
      var id = $('#nomor').html().replace('Nomor Meja : ','');
      $.ajax({
        url:'<?php echo site_url('client/transaksi') ?>',
        type:'post',
        data: $('#form').serialize()+'&idmeja='+id,
        success:function(){
          $('#clear').click();
          $('#nomor').html('Nomor Meja : --- ');
        }
      })
    });

    //--------------------sinkronisasi-------------------------------------------
    //show modal tambah produk
      $(function(){
        $(document).on('click','#tombol2', function(){
          var isi = '<input type="button" id="btnSave3" class="btn btn-default" value="Konfirmasi"/><button type="button" class="btn btn-default batal1" data-dismiss="modal">Batal</button>';
          $('#form2')[0].reset();
          $('#modal_form_produk').modal('show');
          $('.modal-title').text('Sinkronisasi Barang dan Produk');
          $('#form-body4').html('<a class="btn btn-primary hidden btn-sm pluss" id="plus0"><a>');
          $('#apaya').html(isi);
          $('#ikon').html('');
          $.ajax({
            url: '<?php echo site_url('client/sink') ?>',
            type: 'get',
            dataType : 'JSON',
            success:function(data){
              $('#myTable').DataTable().destroy();
              $('#myTable tbody').html(data.produk);
              $(document).ready(function() {
                inittable('#myTable');
              });
              std();
            }
          });
       }).on('click', 'a.pluss' ,function(){
         var id = ($(this).prop('id')).replace('plus','');
         var idb = parseInt(id)+1;
             $("#form-body4").append('<div class="input2" id="sink'+idb+'">'
           +'<div class="form-group"> <label class="control-label col-md-1 icon"></label>'
           +'<label class="control-label col-md-2" style="padding-left:0px">Id Barang</label><div class="col-md-4"><input name="idb[]" id="jml" class="form-control" type="text" autocomplete="off" required></div>'
           +'<label class="control-label col-md-1" style="padding-left:3px">Jumlah</label><div class="col-md-4" ><input name="jml[]" value="" id="" class="form-control satuan" type="text"></div>'
           +'<div class="col-md-1"><a class="btn btn-primary btn-sm pluss hidden" id="plus'+idb+'"><i class="fa fa-plus"></i></a></div></div>');
       }).on('input','#manifest', function(){
         var id = $(this).val()+'abc';
         $.ajax({
           url: '<?php echo site_url('client/cekid/') ?>'+id,
           type:'get',
           success:function(data){
             if(data == 0){
               $('#ikon').html('<span class="glyphicon glyphicon-remove" ></span>');
               $('#form-body4').html('<a class="btn btn-primary hidden btn-sm pluss" id="plus0"><a>');
             }else{
               $('#ikon').html('<span class="glyphicon glyphicon-ok" ></span>');
               for (var i = 0; i < data; i++) {
                 $('#plus'+i).click();
               }
             }
           }
         })
       }).on('click','#btnSave3', function(){
         $.ajax({
           url: '<?php echo site_url('client/cekbarang') ?>',
           type:'get',
           data: $('#form2').serialize(),
           dataType:'JSON',
           success:function(data){
             var flag =1;
             for (var i = 0; i < data.length; i++) {
               var id = i+1;
               if(data[i] == 0){
                 flag = 0;
                 $('#sink'+id).find('label.icon').html('<span class="glyphicon glyphicon-remove" ></span>');
               }else {
                 $('#sink'+id).find('label.icon').html('<span class="glyphicon glyphicon-ok" ></span>');
               }
             }

             if(flag == 0){
               var isi = '<label class="control-label pull-left apaya">Silahkan hubungi server</label>'
                        +'<input type="button" id="btnSave3" class="btn btn-default" value="Konfirmasi"/>'
                        +'<button type="button" class="btn btn-default batal1" data-dismiss="modal">Batal</button>';
               $('#apaya').html(isi);
             }else {
               var isi = '<input type="button" id="sinkron" class="btn btn-default pull-left" value="Sinkronkan"/>'
                        +'<input type="button" id="btnSave3" class="btn btn-default" value="Konfirmasi"/>'
                        +'<button type="button" class="btn btn-default batal1" data-dismiss="modal">Batal</button>';
              $('#apaya').html(isi);
             }
           }
         })
       }).on('click', '#sinkron', function(){
         $.ajax({
           url: '<?php echo site_url('client/simpanbarang') ?>',
           type:'post',
           data: $('#form2').serialize(),
           dataType:'JSON',
           success:function(data){
             $('#modal_form_produk').modal('hide');
             $('#myTable, #myTable1, #tb').DataTable().destroy();
             $('#myTable1 tbody').html(data.barang);
             $('#myTable tbody').html(data.produk);
             $('#tb tbody').html(data.tm);
             $(document).ready(function() {
               inittable('#myTable');
               inittable('#myTable1');
               tm = $('#tb').DataTable({responsive:false  });
             });
             std();
             alert('Berhasil melakukan sinkronisasi');
           }
         })
       })
     });

     //---------------------------details transaksi---------------------------------

     //details details barang masuk
     function format (id) {
       return '<table class="table dt-responsive table-bordered nowrap tabel" width="100%"><thead>'
       +'<tr><th colspan="5" style="text-align:center;background:#ededed">Detail transaksi '+id+'</th>'
       +'</tr><tr><th>Nama barang</th><th>Harga</th><th>Jumlah</th><th>Satuan</th><th>Total Harga</th></tr></thead>'
       +'<tbody class="'+id+'"></tbody></table>';
     }

     //show details barang masuk
     $(document).ready(function(){
        tm = $('#tb').DataTable({
         responsive:false
       });

       $('#tb tbody').on('click', 'td button.details', function () {
         var tr = $(this).closest('tr');
         var row = tm.row(tr);
         var id = $(this).closest('tr').prop('id');
         $.get({
           url:'<?php echo site_url('client/detailbarangmasuk/') ?>'+id,
           success: function(data){
             $('.'+id).html(data);
           }
         });

         if ( row.child.isShown() ) {
             // This row is already open - close it
             row.child.hide();
             tr.removeClass('shown');
         }
         else {
             // Open this row
             row.child( format(id) ).show();
             tr.addClass('shown');
         }
       });
     });

     //details barang keluar
     function format2 (id) {
       return '<table id="myTable4" class="table dt-responsive table-bordered nowrap  tabel" width="100%"><thead>'
       +'<tr><th colspan="6" style="text-align:center;background:#ededed">Detail transaksi '+id+'</th>'
       +'</tr><tr><th colspan="3" style="text-align:center;">Produk</th><th colspan="3" style="text-align:center;">Detail bahan keluar</th></tr>'
       +'<tr><th>Nama produk</th><th>Jumlah</th><th>Harga Satuan</th><th>Nama barang</th><th>Jumlah keluar</th><th>Satuan</th></tr></thead>'
       +'<tbody class="'+id+'"></tbody></table>';
     }

     //show details barang keluar
       $(document).ready(function(){
         table = $('#tk').DataTable({
           responsive:false
         });

         $('#tk tbody').on('click', 'td button.details', function () {
           var tr = $(this).closest('tr');
           var row = table.row(tr);
           var id = $(this).closest('tr').prop('id');
           $.get({
             url:'<?php echo site_url('client/detailbarangkeluar/') ?>'+id,
             success: function(data){
               $('.'+id).html(data);
             }
           });

           if ( row.child.isShown() ) {
               // This row is already open - close it
               row.child.hide();
               tr.removeClass('shown');
           }
           else {
               // Open this row
               row.child(format2(id)).show();
               tr.addClass('shown');
           }
         });
       });
  </script>
  </body>
</html>
