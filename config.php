<?php 
define("DB_SERVER", "localhost");
define("DB_SERVER_USERNAME", "root");
define("DB_SERVER_PASSWORD", "");
define("DB_SERVER_NAME", "demologin");


$connection = mysqli_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_SERVER_NAME);
if ($connection==false) {
	die("khong thể kết nối đến cơ sở dữ liệu" . mysqli_connect_error());
	# code...
}
 ?>