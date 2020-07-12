<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	<?php 
	include_once"config.php";
	if (isset($_POST)&&!empty($_POST)) {
		$errors=array();
		if (!isset($_POST["username"])|| empty($_POST['username'])) {
			$errors[]="username không hợp lệ";
			# code...
		}
		if (!isset($_POST["password"])|| empty($_POST['password'])) {
			$errors[]="password không hợp lệ";
			# code...
		}
		if (!isset($_POST["confirm_password"])|| empty($_POST['confirm_password'])) {
			$errors[]="confirm_password không hợp lệ";
			# code...
		}
		if ($_POST["confirm_password"] !== $_POST["password"]) {
			$errors[]="confirm_password khác password ";
			# code...
		}
		if (empty($errors)) {
			$username=$_POST['username'];
			$password=md5( $_POST['password']);
			$created_at=date("Y-m-d H:i:s");
			$sqlInsert="INSERT into user(username,password,created_at)VALUES(?,?,?)";
			//cau lenh chuan bi cho phan sql

			$stmt=$connection->prepare($sqlInsert);
			$stmt->bind_param("sss",$username,$password,$created_at);
			$stmt->execute();
			$stmt->close();
			echo "<div class='alert alert-success'>";
			echo "Đăng Ký Thành Công.Quai Lại<a href='login.php'>Đăng Nhập</a>";
			echo "</div>";

			# code...
		}else{
			$errors_string=implode("<br>", $errors);
			echo "<div class='alert alert-danger'>";
			echo $errors_string;
			echo "</div>";
		}

		# code...
	}

	 ?>
	<div class="container" style="margin-top: 150px">
		<div class="row">
			<div class="col-md-12">
				<h1>Đăng Ký</h1>
				<form name="register" action="" method="post">
  <div class="form-group">
    <label>User name</label>
    <input type="text" name="username" class="form-control" placeholder="Enter username"  >
    
  </div>
  <div class="form-group">
    <label >Password</label>
    <input type="password" name="password" class="form-control" placeholder="password">
  </div>
   <div class="form-group">
    <label >Nhập Lại Password</label>
    <input type="password" name="confirm_password" class="form-control" placeholder="password">
  </div>
 
  <button type="submit" class="btn btn-primary">Đăng Ký</button>
</form>
				
			</div>
			
		</div>
	</div>

</body>
</html>