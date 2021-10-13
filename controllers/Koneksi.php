<?php

$host = "localhost"
$username = "root"
$password= "";
$db = "pemesanan"; 
$koneksi = mysqli_connect("localhost","root","","pemesanan");

//check connection
if (mysql_connect_eerno()){
	echo "koneksi database gagal: ".mysqli_connect_error();
}

?>