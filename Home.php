<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Invers Matriks Dengan Kofaktor</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<style type="text/css">
		.merge-left{
			margin-left: -15px;
		}
		.margin-right{
			margin-left: 2px;
		}
		.margin-bottom{
			margin-bottom: 3px;
		}
		.kurwal{
			position: absolute;
			width: 15px;
			top: 40px;
			border-top: solid;
			border-left: solid;
			border-bottom: solid;
		}
		.kurtup{
			margin-left: 20.5%;
			position: absolute;
			width: 15px;
			top: 40px;
			border-top: solid;
			border-right: solid;
			border-bottom: solid;
		}
		.kurwal1,
		.kurtup1{
			height: 50%;
		}
		.kurwal2,
		.kurtup2{
			height: 21%;
		}
		.kurwal3,
		.kurtup3{
			top: 35px;
			height: 33%;
			margin-left: 10px;
		}
		.kurtup3{
			margin-left: 40.5%;
		}
		.kurwal4,
		.kurtup4,
		.kurwal5,
		.kurtup5{
			top: 17%;
			height: 34%;
			margin-left: 7%;
		}
		.kurtup4,
		.kurtup5{
			margin-left: 43%;
		}
		.kurwal5,
		.kurtup5{
			top: 64%;
		}
		.elemen-matriks{
			margin-left: 15px;
		}
		.btn-inv{
			margin-left: 12px;
			width: 70px;
		}
		.garis-tengah{
			margin-left: 2px;
			margin-right: 2px;
			margin-top: 17px;
			border-top: solid;
		}
	</style>
</head>
<body>
	<?php

	session_start();

	$_POST = $_SESSION;

	?>
	<div class="container-fluid">
		<div class="card">
			<!-- Bagian Judul -->
			<div class="card-header bg-primary text-white">Invers Matriks Dengan Kofaktor</div>
			<!-- Bagian konten -->
			<div class="card-body">
				<p>Kalkulator dibawah ini akan menghitung invers dari matriks menggunakan metode kofaktor(adjoint)</p>
				<div class="card">
					<div class="card-body bg-light">
						<div class="row">
							<div class="col-1"></div>
							<div class="col-2 margin-right">
								<h5>Matriks A</h5>
							</div>
						</div>
						<!-- Bagian inputan user untuk mendapatkan elemen2 matriks -->
						<form action="proses.php" method="post">
							<div class="row elemen-matriks">
								<div class="kurwal <?php if(!empty($_POST)){ echo 'kurwal2'; }else{ echo 'kurwal1'; } ?>"></div>
								<div class="col-1">
									<input class="form-control margin-bottom" value="<?php if(!empty($_POST)){ echo($_POST['a11']); } ?>" type="text" name="a11">
									<input class="form-control margin-bottom" value="<?php if(!empty($_POST)){ echo($_POST['a21']); } ?>" type="text" name="a21">
									<input class="form-control margin-bottom" value="<?php if(!empty($_POST)){ echo($_POST['a31']); } ?>" type="text" name="a31">
								</div>
								<div class="col-1 merge-left">
									<input class="form-control margin-bottom" value="<?php if(!empty($_POST)){ echo($_POST['a12']); } ?>" type="text" name="a12">
									<input class="form-control margin-bottom" value="<?php if(!empty($_POST)){ echo($_POST['a22']); } ?>" type="text" name="a22">
									<input class="form-control margin-bottom" value="<?php if(!empty($_POST)){ echo($_POST['a32']); } ?>" type="text" name="a32">
								</div>
								<div class="col-1 merge-left">
									<input class="form-control margin-bottom" value="<?php if(!empty($_POST)){ echo($_POST['a13']); } ?>" type="text" name="a13">
									<input class="form-control margin-bottom" value="<?php if(!empty($_POST)){ echo($_POST['a23']); } ?>" type="text" name="a23">
									<input class="form-control margin-bottom" value="<?php if(!empty($_POST)){ echo($_POST['a33']); } ?>" type="text" name="a33">
								</div>
								<div class="kurtup <?php if(!empty($_POST)){ echo 'kurtup2'; }else{ echo 'kurtup1'; } ?>"></div>
								<!-- Bagian penjelasan dan cara menghitung invers matriks -->
								<div class="col-9" style="margin-left: 15px;">
									<p>Aplikasi kalkulator penghitung invers matriks dengan ordo 3x3 disamping menggunakan cara Kofaktor(Adjoint).</p>
									<div class="row">
										<div class="col-5">
											<img src="rumus_invers_matriks.png" title="rumus_invers_matriks_adjoint.png">
										</div>
										<div class="col-7">
											<p>Keterangan / Syarat :</p>
											<p>- det(A) tidak sama dengan 0</p>
											<p>- Adjoint(A) didapatkan dari transpose matriks kofaktor(A)</p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-1"></div>
								<div class="col-2">
									<input class="form-control btn-outline-primary btn-inv" type="submit" name="invers" value="Invers">
								</div>
							</div>
						</form>
						<!-- Bagian hasil invers matriks -->
						<div class="row garis-tengah"></div>
						<?php if (!empty($_POST)) { ?>

						<div class="row" style="margin-top: 20px;">
							<div class="col-6">
								<h5>Hasil :</h5>
							</div>
							<div class="col-6">
								<h5>Keterangan :</h5>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<p>Invers matriks A adalah</p>
								<div class="kurwal kurwal3"></div>
								<?php 

								for ($i=0; $i < 3 ; $i++) { 

									echo "<div class='row'>";

									for ($j=0; $j < 3 ; $j++) {

										$x = $i + 1;
										$y = $j + 1;

										echo "<div class='col-2'><p class='text-center'>".$_POST['invers'.$x.$y]."</p></div>";
									}

									echo "</div>";
								}

								 ?>
								<div class="kurtup kurtup3"></div>
							</div>
							<!-- Bagian penjelasan invers matriks -->
							<div class="col-6">
								<li>Determinan matriks A = <?= $_POST['determinan'] ?></li>
								<li style="margin-bottom: 20px;">Kofaktor matriks A</li>
								<div class="kurwal kurwal4"></div>
								<?php 

								for ($i=0; $i < 3 ; $i++) { 

									echo "<div class='row elemen-matriks'>";

									for ($j=0; $j < 3 ; $j++) {

										$x = $i + 1;
										$y = $j + 1;

										echo "<div class='col-2'><p class='text-center'>".$_POST['k'.$x.$y]."</p></div>";
									}

									echo "</div>";
								}

								 ?>
								<div class="kurtup kurtup4"></div>
								<li style="margin-top: 5px; margin-bottom: 20px;">Adjoint matriks A</li>
								<div class="kurwal kurwal5"></div>
								<?php 

								for ($i=0; $i < 3 ; $i++) { 

									echo "<div class='row elemen-matriks'>";

									for ($j=0; $j < 3 ; $j++) {

										$x = $i + 1;
										$y = $j + 1;

										echo "<div class='col-2'><p class='text-center'>".$_POST['adj'.$x.$y]."</p></div>";
									}

									echo "</div>";
								}

								 ?>
								<div class="kurtup kurtup5"></div>
							</div>
						</div>

						<?php } ?>
					</div>
				</div>
			</div>
			<!-- Bagian bawah/footer -->
			<div class="card-footer bg-dark text-white">Tugas UTS Aljabar Linier dan Matriks E081 | @Masyura Fanni Ramadhan | 21081010103</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

<?php 

if (!empty($_POST)) {
	session_destroy();
}

 ?>