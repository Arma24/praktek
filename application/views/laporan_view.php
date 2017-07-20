<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <strong>Laporan Penjualan Tiket Pesawat</strong>
        </h1>
    </div>
</div>

<div class="row">
  <div class="col-lg-16 col-md-16">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Transaksi</th>
                    <th>Kode Maskapai</th>
                    <th>Nama Maskapai</th>
                    <th>Jumlah Seat</th>
                    <th>Kota Asal</th>
                    <th>Kota Tujuan</th>
                    <th>Tgl Berangkat</th>
                    <th>Seat</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
              <?php
              $no =1;
                  foreach ($laporan as $data) {
              echo
              '<tr>
                  <td>'.$no++.'</td>
                  <td>'.$data->kd_transaksi.'</td>
                  <td>'.$data->kd_maskapai.'</td>
                  <td>'.$data->nama_maskapai.'</td>
                  <td>'.$data->jumlah_seat.'</td>
                  <td>'.$data->kota_asal.'</td>
                  <td>'.$data->kota_tujuan.'</td>
                  <td>'.$data->tgl_berangkat.'</td>
                  <td>'.$data->seat.'</td>
                  <td>'.$data->harga.'</td>
                  
              </tr>';
              }
              ?>


            </tbody>
        </table>
    </div>
  </div>
</div>