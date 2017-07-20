<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <strong>Tambah User</strong>
        </h1>
    </div>
</div>
<!-- /.row -->
<?php if (!empty($notif)) {
      echo '<div class="alert alert-success">';
      echo $notif;
      echo '</div>';
} ?>
<form method="post" id="form-user" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/user/simpan">
  <div class="row">
    <div class="col-lg-4 col-md-4">
      <div class="form-group">
          <label>Username</label>
          <input class="form-control"  placeholder="Masukkan username" name="username" >

          <label>Password</label>
          <input class="form-control"  placeholder="Masukkan password" name="password" >

          <label>Jabatan</label>
          <input class="form-control"  placeholder="Masukkan jabatan" name="jabatan" >
          <br>

          <input type="submit" class="btn btn-primary" value="Tambah" name="submit">
          <input type="reset" class="btn btn-default" value="Reset">
      </div>
    </div>
  </div>
</form>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            Daftar User
        </h3>
    </div>
</div>
<!-- /.row -->

<div class="row">
  <div class="col-lg-8 col-md-8">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>ID User</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php
                  foreach ($user as $data) { 
              echo
              '<tr>
                  <td>'.$data->id_user.'</td>
                  <td>'.$data->username.'</td>
                  <td>'.$data->password.'</td>
                  <td>'.$data->jabatan.'</td>
                  <td>
                  <a href="'.base_url().'index.php/user/detil_user/'.$data->id_user.'" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-search"></i> Lihat</a>
                  <a href="'.base_url().'index.php/user/hapus_user/'.$data->id_user.'" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                  </td>
                  
              </tr>';
              }
              ?>


            </tbody>
        </table>
    </div>
  </div>
</div>
