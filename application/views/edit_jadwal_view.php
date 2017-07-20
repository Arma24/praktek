
    <div class="container" style="max-width: 800px">
      <br>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
              <div class="panel panel-info">
              <div class="panel-heading">Edit Data Jadwal Penerbangan</div>

              <form method="post" id="form-jadwal" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/jadwal/update/<?php echo $detil->kd_jadwal; ?>">

                <div class="panel-body">
                  <div class="col-md-9 col-sm-9 col-xs-9 col-lg-9">
                  <div class="input-group">
                    <div class="input-group">
                    <label class="input-group-addon"><b>Nama Maskapai</b></label>
                    <select class="form-control"  placeholder="Pilih nama maskapai" name="nama_maskapai">
                      <option value=""> Pilih Maskapai </option>
                        <?php
                          $nama_maskapai = $this->db->query("SELECT kd_maskapai, nama_maskapai FROM maskapai")
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
                    </div>
                  <br>
                    <div class="input-group">
                    <label class="input-group-addon"><b>Kota Asal</b></label>
                    <input type="text" id="kota_asal" name="kota_asal" autofocus placeholder="Kota Asal" class="form-control" value="<?php echo $detil->kota_asal; ?>" />
                    </div>
                  <br>
                  <div class="input-group">
                    <label class="input-group-addon"><b>Kota Tujuan</b></label>
                    <input type="text" id="kota_tujuan" name="kota_tujuan" autofocus placeholder="Kota Tujuan" class="form-control" value="<?php echo $detil->kota_tujuan; ?>" />
                  </div>
                  <br>
                  <div class="input-group">
                    <label class="input-group-addon"><b>Tgl Berangkat</b></label>
                    <input type="text" id="tgl_berangkat" name="tgl_berangkat" autofocus placeholder="Tgl Berangkat" class="form-control" value="<?php echo $detil->tgl_berangkat; ?>" />
                  </div>
                </div>
                <br>

                <!-- LINK KEMBALI KE TABEL DATA SISWA -->
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" style="margin-top: 10px;">
                  <a href="<?php echo base_url(); ?>index.php/jadwal/jadwal" class="btn btn-md btn-success">Kembali</a>
                  <input type="submit" name="submit" value="Update" class="btn btn-md btn-primary">
                </div>
              </div>

              </form>
            </div>
          </div>
        </div>
      <br>
    </div>