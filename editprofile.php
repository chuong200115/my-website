<?php
	include 'include/header.php' ;

	//include 'include/slider.php' ;
?>
<?php
	$pd= new product();
    if(!isset($_GET['proID']) || $_GET['proID']==NULL){
        echo "<script> window.loction='index.php'</script>";
    }else {
        $id=$_GET['proID'];
       
    }
    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['save'])){
        $Editcustomer=$cs->Edit_Customer($_POST);
		
    }
?>

<?php
	  $login_check=Session::get("customer_login");
	  	if($login_check==false){
	  		header('Location:login.php');
	  	}
	  ?>

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
	    		<div class="heading">
	    		<h3>Thông Tin Khách Hàng</h3>
	    		</div>
	    		<div class="clear"></div>
    		</div>
            
    		<form  action="" method="post">
    		<table class="tblone">
                <tr>
                    <?php
                        if(isset($Editcustomer)) echo '<td colspan="3">'.$Editcustomer.'</td>';
                    ?>
                </tr>
    			<?php
    			$get_cus=$cs->show_customer();
    			if($get_cus){
    				while($result=$get_cus->fetch_assoc()){

    			?>
    			<tr>
    				<td>Tên</td>
    				<td>:</td>
                    <td><input type="text" name="name" value="<?php echo $result['Name']?>" ></td>
    				<td></td>
    			</tr>
    			<tr>
    				<td>Thành Phố</td>
    				<td>:</td>
    				<td><input type="text" name="city" value="<?php echo $result['City']?>" ></td>
    			</tr>
    			<tr>
    				<td>Địa Chỉ</td>
    				<td>:</td>
    				<td><input type="text" name="address" value="<?php echo $result['Address']?>" ></td>
    			</tr>
    			<tr>
    				<td>Email</td>
    				<td>:</td>
    				<td><input type="text" name="email" value="<?php echo $result['Email']?>" ></td>
    			</tr>
    			<tr>
    				<td>SDT</td>
    				<td>:</td>
    				<td><input type="text" name="phone" value="<?php echo $result['Phone']?>" ></td>
    			</tr>
    			<tr>
    				
                    <td colspan="3"><input type="submit" name="save" value="Lưu Lại" ></td>
    				
    			</tr>	
    			<?php
    				}
    			}
    			?>
    		</table>
        </form>
 		</div>
 	</div>
<?php
	include 'include/footer.php' ;
?>