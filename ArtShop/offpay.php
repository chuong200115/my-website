<?php
	include 'include/header.php' ;

	//include 'include/slider.php' ;
?>
<style type="text/css">
	.box-left{
		width:49%;
		float:left;
		
	}
	.box-right{
		width:50%;
		float:right;
		border: 1px solid #ddd;
	}
</style>

<?php
	if(isset($_GET['orderid']) && $_GET['orderid']=="order"){
		$customer_id=Session::get('cus_id');
		$insert_order=$ct->Insert_Order($customer_id);
		$delcart=$ct->delall_cart();
		header('Location:success.php');
	}
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Đơn Hàng Đã Dặt</h3>
    		</div>
    		<div class="clear"></div>
    	</div>

    	<div class="section group">
    		<div class="box-left">
    			<div class="cartpage">
			    	
						<table class="tblone">
							<tr>
								<th width="20%">Tên Tranh</th>
								<th width="15%">Giá Tiền</th>
								<th width="25%">Số Lượng</th>
								<th width="20%">Tổng Tiền</th>
							</tr>
							<?php
								$getproductcart=$ct->get_product_cart();
								if($getproductcart){
									$subtotal=0;
									while($result=$getproductcart->fetch_assoc()){
							?>
							<tr>
								<td><?php echo $result['productName']?></td>
								<td><?php echo $result['price']?></td>
								<td>
										<?php echo $result['quantity']?>
								<td>
									<?php
									$total=$result['price']*$result['quantity'];
									echo $total;
									?>
								</td>
							</tr>
							<?php
									$subtotal+=$total;
								}
							}
							?>

						</table>
						
						<table style="float:right;text-align:center;" width="40%">
							<tr>
								<th>Tổng Cộng : 
								</th>
								<th><?php
										echo $subtotal." VND";
									?>
								</th>
							</tr>
							<tr>
								<th>Thuế(0.1%): 
								</th>
								<th><?php
										$vat=0.1*$subtotal;
										echo $vat." VND";
									?>
								</th>
							</tr>
							<tr>
								<th>Tổng Tiền :
								</th>
								<th>
									<?php
										$Grand=$vat+$subtotal;
										echo $Grand." VND";
								?></th>
							</tr>
							<tr> 
								<td colspan="2">
									<br>
									<a href="?orderid=order"  class="buysubmit" style="font-size:14px;">Thanh Toán</a>
									<td>
							</tr>
					   </table>
					   
					</div>
					
    		</div>
    		<div class="box-right">
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
    				<td>Địa Chỉ Giao Hàng</td>
    				<td>:</td>
    				<td><?php echo $result['Address']?></td>
    			</tr>
    			<tr>
    				<td>Mã Bưu Chính</td>
    				<td>:</td>
    				<td><?php echo $result['Zipcode']?></td>
    			</tr>
    			<tr>
    				<td colspan="3"><a href="editprofile.php"> Cập Nhật Thông Tin Khách Hàng</></td>
    				
    			</tr>	
    			<?php
    				}
    			}
    			?>
    		</table>
    		</div>
 		</div>
 	</div>
<?php
	include 'include/footer.php' ;
?>