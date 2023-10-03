<?php 

//Memulai session
session_start();

//Elemen matriks a baris pertama
$a[0][0] = $_POST['a11'];
$a[0][1] = $_POST['a12'];
$a[0][2] = $_POST['a13'];
//Elemen matriks a baris kedua
$a[1][0] = $_POST['a21'];
$a[1][1] = $_POST['a22'];
$a[1][2] = $_POST['a23'];
//Elemen matriks a baris ketiga
$a[2][0] = $_POST['a31'];
$a[2][1] = $_POST['a32'];
$a[2][2] = $_POST['a33'];

//Mencari determinan matriks a
$determinan = ($a[0][0] * $a[1][1] * $a[2][2]) + ($a[0][1] * $a[1][2] * $a[2][0]) + ($a[0][2] * $a[1][0] * $a[2][1]) - ($a[2][0] * $a[1][1] * $a[0][2]) - ($a[2][1] * $a[1][2] * $a[0][0]) - ($a[2][2] * $a[1][0] * $a[0][1]);

//Mencari kofaktor matriks a baris pertama
$k11 = (($a[1][1] * $a[2][2])) - (($a[2][1] * $a[1][2]));
$k12 = -1 * ((($a[1][0] * $a[2][2])) - (($a[2][0] * $a[1][2])));
$k13 = (($a[1][0] * $a[2][1])) - (($a[2][0] * $a[1][1]));
//Mencari kofaktor matriks a baris kedua
$k21 = -1 * ((($a[0][1] * $a[2][2])) - (($a[2][1] * $a[0][2])));
$k22 = (($a[0][0] * $a[2][2])) - (($a[2][0] * $a[0][2]));
$k23 = -1 * ((($a[0][0] * $a[2][1])) - (($a[2][0] * $a[0][1])));
//Mencari kofaktor matriks a baris ketiga
$k31 = (($a[0][1] * $a[1][2])) - (($a[1][1] * $a[0][2]));
$k32 = -1 * ((($a[0][0] * $a[1][2])) - (($a[1][0] * $a[0][2])));
$k33 = (($a[0][0] * $a[1][1])) - (($a[1][0] * $a[0][1]));

//Mendapatkan Adjoint a dari kofaktor
//Baris pertama
$adj[0][0] = $k11;
$adj[0][1] = $k21;
$adj[0][2] = $k31;
//Baris kedua
$adj[1][0] = $k12;
$adj[1][1] = $k22;
$adj[1][2] = $k32;
//Baris ketiga
$adj[2][0] = $k13;
$adj[2][1] = $k23;
$adj[2][2] = $k33;

//Menghitung invers matriks a
//Baris pertama
$invers[0][0] = $adj[0][0]/$determinan;
$invers[0][1] = $adj[0][1]/$determinan;
$invers[0][2] = $adj[0][2]/$determinan;
//Baris kedua
$invers[1][0] = $adj[1][0]/$determinan;
$invers[1][1] = $adj[1][1]/$determinan;
$invers[1][2] = $adj[1][2]/$determinan;
//Baris ketiga
$invers[2][0] = $adj[2][0]/$determinan;
$invers[2][1] = $adj[2][1]/$determinan;
$invers[2][2] = $adj[2][2]/$determinan;

//Menambahkan session
$_SESSION = $_POST;
$_SESSION['determinan'] = $determinan;
$_SESSION['k11'] = $k11;
$_SESSION['k12'] = $k12;
$_SESSION['k13'] = $k13;
$_SESSION['k21'] = $k21;
$_SESSION['k22'] = $k22;
$_SESSION['k23'] = $k23;
$_SESSION['k31'] = $k31;
$_SESSION['k32'] = $k32;
$_SESSION['k33'] = $k33;

for ($i=0; $i < 3 ; $i++) { 
	for ($j=0; $j < 3 ; $j++) {

		$x = $i + 1;
		$y = $j + 1;

		$_SESSION['adj'.$x.$y] = $adj[$i][$j];
		$_SESSION['invers'.$x.$y] = $invers[$i][$j];
	}
}

//mengembalikan ke halaman sebelumnya untuk menampilkan hasil
header("location:home.php");

 ?>