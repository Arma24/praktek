<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <strong>Penjualan Tiket Pesawat</strong>
        </h1>
    </div>
</div>
<!-- /.row -->
<?php if (!empty($notif)) {
      echo '<div class="alert alert-success">';
      echo $notif;
      echo '</div>';
} ?>

<form method="post" id="form-user" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/transaksi/simpan">
  <div class="row">
    <div class="col-lg-4 col-md-4">
      <div class="form-group">
          <label>Kode Maskapai</label>
          <select class="form-control"  placeholder="Pilih kode maskapai" name="kd_maskapai">
            <option value=""> Pilih Maskapai </option>
            <?php
              $nama_maskapai = $this->db->query("SELECT nama_maskapai, kd_maskapai FROM maskapai")
                                        ->result();

                if(!empty($nama_maskapai))
                {
                    foreach ($nama_maskapai as $data)
                    {
                      echo "<option value='".$data->kd_maskapai."'>".$data->kd_maskapai."</option>";
                    }
                }
            ?>
          </select>

          <label>Seat</label>
          <select class="form-control"  placeholder="Pilih seat" name="seat">
            <option value=""> Pilih Seat </option>
            <option value="A1"> A1 </option>
            <option value="A2"> A2 </option>
            <option value="A3"> A3 </option>
            <option value="B1"> B1 </option>
            <option value="B2"> B2 </option>
            <option value="B3"> B3 </option>
            <option value="C1"> C1 </option>
            <option value="C2"> C2 </option>
            <option value="C3"> C3 </option>
          </select>

          <label>Kota Asal</label>
          <select class="form-control"  placeholder="Pilih kota asal" name="kota_asal">
            <option value=""> Pilih Kota Asal </option>
            <option value="Bali"> Bali </option>
            <option value="Bandung"> Bandung </option>
            <option value="Jakarta"> Jakarta </option>
            <option value="Surabaya"> Surabaya </option>
          </select>
          
          <label>Kota Tujuan</label>
          <select class="form-control"  placeholder="Pilih kota tujuan" name="kota_tujuan">
            <option value=""> Pilih Kota Tujuan </option>
            <option value="Bali"> Bali </option>
            <option value="Bandung"> Bandung </option>
            <option value="Jakarta"> Jakarta </option>
            <option value="Surabaya"> Surabaya </option>
          </select>

          <label>Tgl Berangkat</label>
          <input class="form-control"  autofocus value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('Y-m-d');?>" name="tgl_berangkat" >

          <label>Harga</label>
          <input class="form-control"  placeholder="Masukkan harga" name="harga" >
          <br>
          <input type="submit" class="btn btn-primary" value="Tambah" name="submit">
          <input type="reset" class="btn btn-default" value="Reset">
      </div>
    </div>
  </div>
</form>

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            Daftar Transaksi
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
                    <th>Kode Transaksi</th>
                    <th>Kode Maskapai</th>
                    <th>Seat</th>
                    <th>Kota Asal</th>
                    <th>Kota Tujuan</th>
                    <th>Tgl Berangkat</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
              <?php
                  foreach ($transaksi as $data) { 
              echo
              '<tr>
                  <td>'.$data->kd_transaksi.'</td>
                  <td>'.$data->kd_maskapai.'</td>
                  <td>'.$data->seat.'</td>
                  <td>'.$data->kota_asal.'</td>
                  <td>'.$data->kota_tujuan.'</td>
                  <td>'.$data->tgl_berangkat.'</td>
                  <td>'.$data->harga.'</td>
                  
              </tr>';
              }
              ?>


            </tbody>
        </table>
    </div>
  </div>
</div>
