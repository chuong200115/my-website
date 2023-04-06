
<?php
    include'lib/session.php';
    Session::init();
?>
<?php
	include 'lib/database.php';
	include 'help/fomat.php';
	spl_autoload_register(function($className){
		include_once "classes/".$className.".php";
	});
	$db=new Database();
	$fm=new Format();
	$ct=new cart();
	$us=new user();
	$cat=new category();
	$product=new product();
	$cs=new customer();
?>

<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="./css/style2.css" rel="stylesheet" type="text/css" media="all"/>
<link href="./css/menu2.css" rel="stylesheet" type="text/css" media="all"/>


<!--<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>-->

</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/horizontal_on_white_by_logaster.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form action="search.php" method="post">
						<input type="text" placeholder="Tìm kiếm tranh" name="keyword" ><input type="submit" value="TÌM KIẾM">

				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="cart.php" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Giỏ hàng</span>
								<span class="no_product">
									<?php
									$check_cart=$ct->check_cart();
									if($check_cart){
										$qty=Session::get("qty");
										echo '('.$qty.')';
									}else{
										echo "(0)";
									}
									?>
								</span>
							</a>
						</div>
			      </div>
			<?php
				if(isset($_GET['customer_id'])){
					Session::destroy();
					$delcart=$ct->delall_cart();
				}
			?>
			<div style="font-size:14px;">
				<?php
					$login_check=Session::get('customer_login');
					if($login_check==true){
						echo Session::get('customer_name').'<br/><br/>';
					}
				?>
			</div>
		   <div class="login" style="font-size: 14px; height:25px;width: 100px;margin-left:35px">
		   	<?php
			      	if($login_check==false){
			      		echo '<a  href="login.php">Đăng nhập</a>';
			      	}
			      	else {
			      		$cs_id=Session::get('cus_id');
			      		echo '<a href="login.php?customer_id='.$cs_id.'">Đăng xuất</a>';
			      	}
			      	
			 ?>
		   </div>

		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Trang chủ</a></li>
	  
	  <li><a href="theme.php">Chủ Đề</a></li>

	  <?php
	  $login_check=Session::get("customer_login");
	  	if($login_check==false){
	  		echo '';
	  	}
	  	else {
	  		echo ' <li><a href="cart.php">Giỏ Hàng</a></li>';
	  		echo ' <li><a href="profile.php">Thông Tin</a></li>';
	  	}
	  ?>
	  <li><a href="contact.php">Liên Hệ</a></li>

	  <div class="clear"></div>
	</ul>
</div>