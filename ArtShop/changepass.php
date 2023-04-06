<?php
	include 'include/header.php' ;

	//include 'include/slider.php' ;
?>



<?php
	  $login_check=Session::get("customer_login");
	  	if($login_check==false){
	  		header('Location:login.php');
	  	}
    if( isset($_POST["change"])){
        $chage_pass=$cs->change_password($_POST);
    }
?>

 <div class="main">
    <div class="content">
        <div class="content_top">
            <div class="heading">
            <h3>Tài Khoản</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
        <div class="login_panel">
            <h3>Đổi Mật Khẩu</h3>
            <?php
                if(isset($chage_pass)) echo $chage_pass;
            ?>
            <form action="" method="post">
                    <input  type="password" name="pass_old" placeholder="Password old"/>
                    <input  type="password" name="pass_new" placeholder="Password new"/>
                    <input  type="submit" class="buysubmit" name="change" value="Thay đổi"/>
             </form> 
        </div>
    </div>
     </div>
 </div>
<?php
	//include 'include/footer.php' ;
?>