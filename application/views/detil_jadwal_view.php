
		<div class="container" style="max-width: 800px">
			<br>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
					  	<div class="panel panel-info">
							<div class="panel-heading">Lihat Detil Data Jadwal Penerbangan</div>

							<?php if (!empty($notif)) {
							      echo '<div class="alert alert-success">';
							      echo $notif;
							      echo '</div>';
							} ?>

					    	<div class="panel-body">
					    		<div class="col-md-9 col-sm-9 col-xs-9 col-lg-9">
									<div class="input-group">
										<label class="input-group-addon"><b>Nama Maskapai</b></label>
										<input type="text" id="nama_maskapai" name="nama_maskapai" autofocus placeholder="Nama Maskapai" class="form-control" disabled value="<?php echo $detil->nama_maskapai; ?>" />
									</div>
									<br>
						    		<div class="input-group">
										<label class="input-group-addon"><b>Kota Asal</b></label>
										<input type="text" id="kota_asal" name="kota_asal" autofocus placeholder="Kota Asal" class="form-control" disabled value="<?php echo $detil->kota_asal; ?>" />
									</div>
									<br>
									<div class="input-group">
										<label class="input-group-addon"><b>Kota Tujuan</b></label>
										<input type="text" id="kota_tujuan" name="kota_tujuan" autofocus placeholder="Kota Tujuan" class="form-control" disabled value="<?php echo $detil->kota_tujuan; ?>" />
									</div>
									<br>
									<div class="input-group">
										<label class="input-group-addon"><b>Tgl Berangkat</b></label>
										<input type="text" id="tgl_berangkat" name="tgl_berangkat" autofocus placeholder="Tgl Berangkat" class="form-control" disabled value="<?php echo $detil->tgl_berangkat; ?>" />
									</div>
								</div>
								<br>

								<!-- LINK KEMBALI KE TABEL DATA SISWA -->
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" style="margin-top: 10px;">
									<a href="<?php echo base_url(); ?>index.php/jadwal/jadwal" class="btn btn-md btn-success">Kembali</a>
									<a href="<?php echo base_url(); ?>index.php/jadwal/edit_jadwal/<?php echo $detil->kd_jadwal; ?>" class="btn btn-md btn-primary">Edit</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<br>
		</div>