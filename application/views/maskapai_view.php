<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <strong>Tambah Maskapai</strong>
        </h1>
    </div>
</div>
<!-- /.row -->
<?php if (!empty($notif)) {
      echo '<div class="alert alert-success">';
      echo $notif;
      echo '</div>';
} ?>
<form method="post" id="form-user" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/maskapai/simpan">
  <div class="row">
    <div class="col-lg-4 col-md-4">
      <div class="form-group">
          <label>Nama Maskapai</label>
          <input class="form-control"  placeholder="Masukkan nama maskapai" name="nama_maskapai" >

          <label>Jumlah Armada</label>
          <input class="form-control"  placeholder="Masukkan jumlah armada" name="jumlah_armada" >

          <label>Slogan</label>
          <input class="form-control"  placeholder="Masukkan slogan" name="slogan" >
          
          <label>Jumlah Seat</label>
          <input class="form-control"  placeholder="Masukkan jumlah seat" name="jumlah_seat" >

          <label>Website</label>
          <input class="form-control"  placeholder="Masukkan website" name="website" >
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
            Daftar Maskapai
        </h3>
    </div>
</div>
<!-- /.row -->

<div class="row">
  <div class="col-lg-16 col-md-16">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Kode Maskapai</th>
                    <th>Nama Maskapai</th>
                    <th>Jumlah Armada</th>
                    <th>Slogan</th>
                    <th>Jumlah Seat</th>
                    <th>Website</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php
                  foreach ($maskapai as $data) {
              echo
              '<tr>
                  <td>'.$data->kd_maskapai.'</td>
                  <td>'.$data->nama_maskapai.'</td>
                  <td>'.$data->jumlah_armada.'</td>
                  <td>'.$data->slogan.'</td>
                  <td>'.$data->jumlah_seat.'</td>
                  <td>'.$data->website.'</td>
                  <td>
                  <a href="'.base_url().'index.php/maskapai/detil_maskapai/'.$data->kd_maskapai.'" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-search"></i> Lihat</a>
                  <a href="'.base_url().'index.php/maskapai/hapus_maskapai/'.$data->kd_maskapai.'" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                  </td>
                  
              </tr>';
              }
              ?>


            </tbody>
        </table>
    </div>
  </div>
</div>
