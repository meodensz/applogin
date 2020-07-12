<?php 
session_start();
if (isset($_SESSION['loggedin'])&& ($_SESSION['loggedin'] == true)) {
	header("location:index.php");
	exit;
	# code...
}
//nap file csdl
include_once"config.php";
//biến lưu trữ lỗi trongquá trình đăng nhập
$errors=array();
//Xử lý đăng nhập
if (isset($_POST)&& !empty($_POST)) {

	if ( !isset($_POST['username']) ||empty($_POST['username'])) {
		$errors[]="chưa đăng nhập username";
		# code...
	}
	if (!isset($_POST['password']) || empty($_POST['password'])) {
		$errors[]="chưa đăng nhập password";
		# code...
	}
	if (is_array($errors)&& empty($errors))  {
		$username=$_POST['username'];
		$password=md5 ($_POST['password']);
		$sqllogin="SELECT *From user WHERE username=? AND Password=?";
		//chẩn bị cho phần sql
		$stmt=$connection->prepare($sqllogin);
			$stmt->bind_param("ss",$username,$password);
			//thực thi câu lệnh sql
			$stmt->execute();
			//lấy ra bản ghi
			$res=$stmt->get_result();
			$row=$res->fetch_array(MYSQLI_ASSOC);
			if (isset($row['id'])&&($row['id']>0)) {
				//Nếu tồn tại bản ghi thì sẽ tọa ra session đăng nhập
				$_SESSION['loggedin']=true;
				$_SESSION['username']=$row['username'];
				header("location:index.php");
	exit;

		
				# code...
			}else{
				$errors[]='Dữ liệu đăng nhập không đúng';
			}
			
			

		# code...
	}


if (is_array($errors)&&!empty($errors)) {
	$errors_string=implode("<br>", $errors);
			echo "<div class='alert alert-danger'>";
			echo $errors_string;
			echo "</div>";
	}

	# code...
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 150px">
		<div class="row">
			<div class="col-md-12">
				<h1>Đăng Nhập</h1>
				<form name="login" action="" method="post">
  <div class="form-group">
    <label>User name</label>
    <input type="text" name="username" class="form-control" placeholder="Enter username"  >
    
  </div>
  <div class="form-group">
    <label >Password</label>
    <input type="password" name="password" class="form-control" placeholder="password">
  </div>
  <div class="form-group form-check">
    
    <p><a href="register.php">Đăng Ký</a></p>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
				
			</div>
			
		</div>
	</div>

</body>
</html>