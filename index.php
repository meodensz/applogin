<?php 
session_start();
if (!isset($_SESSION['loggedin'])|| ($_SESSION['loggedin'] != true)) {
	header("location:login.php");
	exit();
	# code...
		echo "<pre>";
				print_r($_SESSION);
				echo "</pre>";
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Đăng Nhập Thành Công</h1>
				<p>Tên Của Nghười Dùng:<?php echo $_SESSION["username"]; ?></p>
				<p><a href="logout.php">Đăng Xuất</a></p>
			</div>
			
		</div>
		
	</div>

</body>
</html>