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
                <div class="col-md-3">
                    <a href="<?php echo site_url('client')?>" class="site_title"><i class="fa fa-cutlery"></i> Waroenk<b><i>pos</i></b></a>
                </div>
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false" id="drop">
                    <img src="images/img.jpg" alt="">John Doe
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

                <li role="presentation" class="dropdown">
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
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
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
                          <td style=""><b>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></b></td>
                          <td></td>
                        </tr>
                      </tbody>
                      </table>
                      <input type="submit" id="btnSave" class="btn btn-default" value="Simpan">
                      <button type="reset" id="reset" class="btn btn-default">Reset</button>
                      <button type="button" id="print" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Print</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="glyphicon glyphicon-list"></i> Daftar Produk</h2>
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
                      <table id="myTable" class="table table-striped table-bordered dt-responsive nowrap " cellspacing="0" width="100%">
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
        <!-- /page content -->

        <!-- footer content -->
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
    $('#myTable').DataTable({
      responsive:false
    });

    $(function(){
      $(document).on('click','.tambah',function(){
        var id = $(this).prop('id');
        $.get({
          url:'<?php echo site_url('client/tambahcart/') ?>'+id,
          success:function(data){
            $('tbody.hasil').html(data);
          }
        });
      });

      $(document).on('click','.kurang',function(){
        var id = $(this).prop('id');
        $.get({
          url:'<?php echo site_url('client/hapuscart/') ?>'+id,
          success:function(data){
            $('tbody.hasil').html(data);
          }
        });
      });

      $(document).on('input','.number', function(event){
        event.preventDefault();
        var id = $(this).closest('tr').prop('id');
        var value = $(this).val();
        $.ajax({
          url:'<?php echo site_url('client/updatecart/') ?>',
          type:'get',
          data:{'id' : id, 'value': value},
          success:function(data){
            $('tbody.hasil').html(data);
          }
        });
      });

      $(document).on('click','#reset', function(){
        $.get({
          url: '<?php echo site_url('client/resetcart') ?>',
          success:function(data){
            $('tbody.hasil').html(data);
          }
        });
      });
    });

    $('#form').submit(function (e){
      $.ajax({
        url : '<?php echo site_url('client/simpantransaksi/');?>',
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(response){
          alert(response.pesan);
          location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown){
          alert(jqXHR+' '+textStatus+'\n'+errorThrown);
        }
      });
      e.preventDefault();
    })
    </script>
  </body>
</html>
