
		<div class="container" style="max-width: 800px">
			<br>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
					  	<div class="panel panel-info">
							<div class="panel-heading">Lihat Detil Data Maskapai</div>

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
										<label class="input-group-addon"><b>Jumlah Armada</b></label>
										<input type="text" id="jumlah_armada" name="jumlah_armada" autofocus placeholder="Jumlah Armada" class="form-control" disabled value="<?php echo $detil->jumlah_armada; ?>" />
									</div>
									<br>
									<div class="input-group">
										<label class="input-group-addon"><b>Slogan</b></label>
										<input type="text" id="slogan" name="slogan" autofocus placeholder="Slogan" class="form-control" disabled value="<?php echo $detil->slogan; ?>" />
									</div>
									<br>
									<div class="input-group">
										<label class="input-group-addon"><b>Jumlah Seat</b></label>
										<input type="text" id="jumlah_seat" name="jumlah_seat" autofocus placeholder="Jumlah Seat" class="form-control" disabled value="<?php echo $detil->jumlah_seat; ?>" />
									</div>
									<br>
									<div class="input-group">
										<label class="input-group-addon"><b>Website</b></label>
										<input type="text" id="website" name="website" autofocus placeholder="Website" class="form-control" disabled value="<?php echo $detil->website; ?>" />
									</div>
								</div>
								<br>

								<!-- LINK KEMBALI KE TABEL DATA SISWA -->
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" style="margin-top: 10px;">
									<a href="<?php echo base_url(); ?>index.php/maskapai/maskapai" class="btn btn-md btn-success">Kembali</a>
									<a href="<?php echo base_url(); ?>index.php/maskapai/edit_maskapai/<?php echo $detil->kd_maskapai; ?>" class="btn btn-md btn-primary">Edit</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<br>
		</div>