
    <div class="container" style="max-width: 800px">
      <br>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
              <div class="panel panel-info">
              <div class="panel-heading">Edit Data User</div>

              <form method="post" id="form-user" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/user/update/<?php echo $detil->id_user; ?>">

                <div class="panel-body">
                  <div class="col-md-9 col-sm-9 col-xs-9 col-lg-9">
                  <div class="input-group">
                    <label class="input-group-addon"><b>Username</b></label>
                    <input type="text" id="username" name="username" autofocus placeholder="Username" class="form-control" value="<?php echo $detil->username; ?>" />
                  </div>
                  <br>
                    <div class="input-group">
                    <label class="input-group-addon"><b>Password</b></label>
                    <input type="text" id="password" name="password" autofocus placeholder="Password" class="form-control" value="<?php echo $detil->password; ?>" />
                  </div>
                  <br>
                  <div class="input-group">
                    <label class="input-group-addon"><b>Jabatan</b></label>
                    <input type="text" id="jabatan" name="jabatan" autofocus placeholder="Jabatan" class="form-control" value="<?php echo $detil->jabatan; ?>" />
                  </div>
                </div>
                <br>

                <!-- LINK KEMBALI KE TABEL DATA SISWA -->
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" style="margin-top: 10px;">
                  <a href="<?php echo base_url(); ?>index.php/user/user" class="btn btn-md btn-success">Kembali</a>
                  <input type="submit" name="submit" value="Update" class="btn btn-md btn-primary">
                </div>
              </div>

              </form>
            </div>
          </div>
        </div>
      <br>
    </div>