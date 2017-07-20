<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <strong>Tambah Jadwal Penerbangan</strong>
        </h1>
    </div>
</div>
<!-- /.row -->
<?php if (!empty($notif)) {
      echo '<div class="alert alert-success">';
      echo $notif;
      echo '</div>';
} ?>

<form method="post" id="form-user" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/jadwal/simpan">
  <div class="row">
    <div class="col-lg-4 col-md-4">
      <div class="form-group">
          <label>Nama Maskapai</label>
          <select class="form-control"  placeholder="Pilih nama maskapai" name="nama_maskapai">
            <option value=""> Pilih Maskapai </option>
            <?php
              $nama_maskapai = $this->db->query("SELECT nama_maskapai, kd_maskapai FROM maskapai")
                                        ->result();

                if(!empty($nama_maskapai))
                {
                    foreach ($nama_maskapai as $data)
                    {
                      echo "<option value='".$data->nama_maskapai."'>".$data->nama_maskapai."</option>";
                    }
                }
            ?>
          </select>

          <label>Kota Asal</label>
          <input class="form-control"  placeholder="Masukkan kota asal" name="kota_asal" >

          <label>Kota Tujuan</label>
          <input class="form-control"  placeholder="Masukkan kota tujuan" name="kota_tujuan" >

          <label>Tgl Berangkat</label>
          <input class="form-control"  autofocus value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('Y-m-d');?>" name="tgl_berangkat" >
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
            Daftar Jadwal Penerbangan
        </h3>
    </div>
</div>
<!-- /.row -->

<div class="row">
  <div class="col-lg-10 col-md-10">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Nama Maskapai</th>
                    <th>Kode Jadwal</th>
                    <th>Kota Asal</th>
                    <th>Kota Tujuan</th>
                    <th>Tgl Berangkat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php
                  foreach ($jadwal as $data) { 
              echo
              '<tr>
                  <td>'.$data->nama_maskapai.'</td>
                  <td>'.$data->kd_jadwal.'</td>
                  <td>'.$data->kota_asal.'</td>
                  <td>'.$data->kota_tujuan.'</td>
                  <td>'.$data->tgl_berangkat.'</td>
                  <td>
                  <a href="'.base_url().'index.php/jadwal/detil_jadwal/'.$data->kd_jadwal.'" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-search"></i> Lihat</a>
                  <a href="'.base_url().'index.php/jadwal/hapus_jadwal/'.$data->kd_jadwal.'" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                  </td>
                  
              </tr>';
              }
              ?>


            </tbody>
        </table>
    </div>
  </div>
</div>