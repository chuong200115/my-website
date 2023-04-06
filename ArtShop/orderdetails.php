<?php
	include 'include/header.php' ;

	//include 'include/slider.php' ;
?>
<style type="text/css">
	.box-left{
		width:100%;
		float:left;
		
	}
	
</style>


 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Đơn Hàng Đã Đặt</h3>
    		</div>
    		<div class="clear"></div>
    	</div>

    	<div class="section group">
    		<div class="box-left">
    			<div class="cartpage">
			    	
						<table class="tblone">
							

							<tr>
								<th width="30%">Tên Tranh</th>
								<th width="15%">Giá Tiền</th>
								<th width="15%">Số Lượng</th>
								<th width="20%">Tổng Tiền</th>
								<th width="20%">Ngày Đặt</th>
							</tr>
							<?php
								$getcartordered=$ct->get_cart_ordered();
								if($getcartordered){
									while($result=$getcartordered->fetch_assoc()){
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
								<td> <?php echo $result['date']?></td>
							</tr>

							<?php
								}
							}
							?>
							
						</table>
					   <div><a href="index.php"  class="buysubmit" style="font-size:14px;">Quay lại trang chủ</a></div>
					</div>
					
    		</div>
    		
 	</div>
<?php
	//	include 'include/footer.php' ;
?>