<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "db_tamu";

$koneksi = mysqli_connect($server, $username, $password) or die("Gagal");
mysqli_select_db($koneksi, $database) or die("Database tidak ditemukan");

// function anti_injection($data)
// {
//     $filter = mysqli_real_escape_string($data, stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
//     return $filter;
// }

// function autolink($str)
// {
//     $str = preg_replace("([[:space:]])((f|ht)tps?:\/\/[a-z0-9~#%@\&:=?+\/\.,_-]+[a-z0-9~#%@\&=?+\/_.;-]+)", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $str); //http
//     $str = preg_replace("([[:space:]])(www\.[a-z0-9~#%@\&:=?+\/\.,_-]+[a-z0-9~#%@\&=?+\/_.;-]+)", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $str); // www.
//     $str = preg_replace("([[:space:]])([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})", "\\1<a href=\"mailto:\\2\">\\2</a>", $str); // mail
//     $str = preg_replace("^((f|ht)tp:\/\/[a-z0-9~#%@\&:=?+\/\.,_-]+[a-z0-9~#%@\&=?+\/_.;-]+)", "<a href=\"\\1\" target=\"_blank\">\\1</a>", $str); //http
//     $str = preg_replace("^(www\.[a-z0-9~#%@\&:=?+\/\.,_-]+[a-z0-9~#%@\&=?+\/_.;-]+)", "<a href=\"http://\\1\" target=\"_blank\">\\1</a>", $str); // www.
//     $str = preg_replace("^([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})", "<a href=\"mailto:\\1\">\\1</a>", $str); // mail
//     return $str;
// }
