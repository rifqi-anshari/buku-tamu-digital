<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_tamu";

$connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


if (mysqli_connect_errno()) {
	echo "gagal melakukan koneksi ke database : '.mysqli_connect_error()";
}
