<?php
	include 'include/header.php' ;
	//include 'include/slider.php' ;
?>
<?php
	$login_check=Session::get('customer_login');
	if($login_check==true){
		header('Location:index.php');
	}
?>
<?php
    if(isset($_POST['submit']) ){
        $insertCus=$cs->insert_customer($_POST);
    }
    if(isset($_POST['login']) ){
        $loginCus=$cs->login_customer($_POST);
    }
?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Đăng Nhập</h3>
        	<?php
        	if(isset($loginCus)) echo $loginCus;
        ?>
        	<form action="" method="post">
                	<input name="email_login" type="text" placeholder="Email">
                    <input name="password_login" type="password" placeholder="Mật khẩu">
 
                    <input  type="submit" class="buysubmit" name="login" value="Đăng Nhập"/>
             </form> 
         </div>

    	<div class="register_account">
    		<h3>Đăng Kí</h3>	 	
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Tên" >
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Thành Phố" >
							</div>
							
							<div>
								<input type="text" name="zipcode" placeholder="Mã Code">
							</div>
							<div>
								<input type="text" name="email" placeholder="E-Mail">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Địa Chỉ">
						</div>
		    		<div>
						<select name="count" >
							<option value="null">Quốc Gia</option>         
							<option value="Lào">Lào</option>
							<option value="Việt Nam">Việt Nam</option>
							<option value="Thái Lan">Thái Lan</option>
		         </select>
				 </div>		        
	
		           <div>
		          	<input type="text" name="phone" placeholder="SDT">
		          </div>
				  
				  <div>
					<input type="text" name="pass"placeholder="Mật khẩu" >
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		    <?php
    			if(isset( $insertCus)) echo $insertCus;
    		?>
    		<div class="clear">
    		</div>
		   <div><input  type="submit" class="buysubmit" name="submit" value="Tạo Tài Khoản"/></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php
	//include 'include/footer.php' ;
?>

