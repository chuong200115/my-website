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
     </div>
        <div class="content_top">
                <div class="heading">
                <h3>Thông Tin Cá Nhân</h3>
                </div>
                <div class="clear"></div>
        </div>
    	<div class="section group">
    		<table class="tblone">
    			<?php
    			$get_cus=$cs->show_customer();
    			if($get_cus){
    				while($result=$get_cus->fetch_assoc()){

    			?>
    			<tr>
    				<td>Tên Khách Hàng</td>
    				<td>:</td>
    				<td><?php echo $result['Name']?></td>
    			</tr>
    			
    			<tr>
    				<td>Email</td>
    				<td>:</td>
    				<td><?php echo $result['Email']?></td>
    			</tr>
    			<tr>
    				<td>SDT</td>
    				<td>:</td>
    				<td><?php echo $result['Phone']?></td>
    			</tr>
                <tr>
                    <td>Thành Phố</td>
                    <td>:</td>
                    <td><?php echo $result['City']?></td>
                </tr>
                <tr>
                    <td>Địa Chỉ</td>
                    <td>:</td>
                    <td><?php echo $result['Address']?></td>
                </tr>
                <tr>
                    <td>Zipcode</td>
                    <td>:</td>
                    <td><?php echo $result['Zipcode']?></td>
                </tr>
    			<tr>
    				<td colspan="3"><a href="editprofile.php"> Cập Nhật Thông Tin</></td>
    				
    			</tr>	
    			<?php
    				}
    			}
    			?>
    		</table>
 		</div>
        <div class="content_bottom">
            <div class="heading">
            <h3>Đơn Hàng Đã Đặt</h3>
            <br>
            <div>Xem chi tiết đơn hàng <a style="color:red" href="orderdetails.php"> tại đây</a></div>
            </div>
            
            <div class="clear"></div>
        </div>
        <div class="content_bottom">
            <div class="heading">
            <h3>Tài Khoản</h3>
            <br>
            <div> Đổi mật khẩu<a style="color:red" href="changepass.php"> tại đây</a></div>
            </div>
            <div class="clear"></div>
        </div>
<?php
    include 'include/footer.php' ;
?>
 	</div>
