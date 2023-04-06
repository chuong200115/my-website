<?php
	include '../classes/login_admin.php';
?>
<?php
	$class= new adminlogin();
	if($_SERVER['REQUEST_METHOD']==='POST'){
		$adminUser=$_POST['User_admin'];
		$adminPass=$_POST['Pass_admin'];
		$login_check=$class->login_admin($adminUser,$adminPass);
	}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<span>
				<?php
				if(isset($login_check)){
					echo $login_check;
				}
				?>
			</span>
			<div>
				<input type="text" placeholder="Username" name="User_admin"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  name="Pass_admin"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
</body>
</html>