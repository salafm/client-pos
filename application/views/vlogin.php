<!DOCTYPE html>
<html lang="en">
  <head>
	<style>
	.input-group .form-control
	{
		margin: 0px !important;
	}
	</style>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Waroenkpos | Masuk</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('vendors/nprogress/nprogress.css'); ?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url('vendors/animate.css/animate.min.css'); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('build/css/custom.min.css'); ?>" rel="stylesheet">
  </head>

  <body class="login" onload="cek()">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <?php
  		if((isset($logins))=='gagal'){
  			$hidden = '';
  		}
  		else{$hidden='hidden';}
  	  ?>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?php echo site_url('login/aksi_login'); ?>" method="post">
              <h1>Masuk ke Sistem</h1>
              <div>
      				      <p class="<?php echo $hidden; ?> btn-danger">Username atau Password salah</p>
      			  </div>
              <div class="input-group">
                <input autofocus type="text" class="form-control" placeholder="Username" name="username" required="" autocomplete="off" autofocus/>
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              </div>
              <div class="input-group">
                <input type="password" class="form-control" placeholder="Password" name="password" required="" autocomplete="off" />
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              </div>
              <div>
                <input type="hidden" id="kode" class="form-control" value="<?php echo $login ?>" />
                <button class="btn btn-default submit" type="submit" id="masuk">Masuk</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Lupa Kata Sandi?
                  <a href="#signup" class="to_register"> Reset Kata Sandi </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-cutlery"></i> Waroenk<b><i>pos</i></b> Client</h1>
                  <p>©2017 Hak Cipta dilindungi Undang-Undang. <b>Waroenkpos</b></p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Reset Kata Sandi</h1>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Email" required="" />
				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
              </div>
              <div>
                <a class="btn btn-default" href="<?php echo site_url('login/masuk'); ?>">Reset Password</a>
				<a class="btn btn-default submit" href="#signin">Batal</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-cutlery"></i> Waroenk<b><i>pos</i></b> Client</h1>
                  <p>©2017 Hak Cipta dilindungi Undang-Undang. <b>Waroenkpos</b></p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>

    <!-- Bootstrap modal -->
    <div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" onclick="keluar()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title">Install Client</h3>
        </div>
        <div class="modal-body form">
          <form action="#" id="form" class="form-horizontal">
            <input type="hidden" value="" name="cabang"/>
            <div class="form-body">
              <div class="form-group">
                <label class="control-label col-md-3">Username</label>
                <div class="col-md-9">
                  <input name="user" id="users" title="Anda harus teliti dalam memasukkan username" placeholder="Masukkan username install client" class="form-control" type="text" autofocus/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Password</label>
                <div class="col-md-9">
          <input name="pass" id="passw" placeholder="Masukkan password install client" class="form-control" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">API Key</label>
                <div class="col-md-9">
          <input name="api" id="api" placeholder="Masukkan 16 digit API Key" class="form-control" type="text">
                </div>
              </div>
            </div>
          </form>
            </div>
            <div class="modal-footer">
              <a type="button" id="btnSave" onclick="simpan()" class="btn btn-default">Install Client</a>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    <!-- End Bootstrap modal -->
	<!-- jQuery -->
    <script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js'); ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('vendors/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript">
    function cek()
    {
      $.get({
        url:'<?php echo site_url('login/cekapi');  ?>',
        success : function(data){
          if(data > 0) {
            var value = document.getElementById("kode").value;
            if(value == 'invalid'){
              hapus();
              alert('Username tidak terdaftar di server, mohon dicek kembali');
              location.reload();
            }else if (value == 'ip') {
              hapus();
              alert('Ip tidak terdaftar diserver, lakukan setting IP terlebih dahulu');
              location.reload();
            }else if (value == 'api') {
              hapus();
              alert('API Key tidak benar, mohon dicek kembali');
              location.reload();
            }
          }else {
            $('#form')[0].reset();
            $('#modal_form').modal({backdrop: 'static', keyboard: false});
            $('#modal_form').modal('show');
            $('#modal_form').on('shown.bs.modal', function () {
                $('#users').focus();
            });
            $("#api").on('keypress', function(event){
              if(event.keyCode == 13){
                event.preventDefault();
                $("#btnSave").click();
              }
            });
          }
        }
      });
    }

    function keluar() {
      window.location.reload();
    }

    function simpan() {
      $.ajax({
        url :'<?php echo site_url('login/initapi')?>',
        type : 'post',
        data : $('#form').serialize(),
    		dataType: "JSON",
    		success: function(response){
         alert('Data sedang dicek di server');
   		   location.reload();
       },
       error: function (jqXHR, textStatus, errorThrown)
   		{
   			alert('Gagal melakukan pengecekan data \n'+ errorThrown);
   		}
      });
    }

    function hapus() {
      $.ajax({
        url : '<?php echo site_url('login/reset') ?>',
        success:function(response){
        }
      });
    }
    </script>
  </body>
</html>
