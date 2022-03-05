<?php
	include 'include/header.php' ;
	//include 'include/slider.php' ;
?>
<?php
	if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
        $cartID=$_POST['cartID'];
        $quantity=$_POST['quantity'];
        $Update_quantity_cart=$ct->Update_quantity_cart($quantity,$cartID);
        if($quantity<=0) $delcart=$ct->del_cart($cartID);
    }
    if(isset($_GET['cartID'])){
        $id=$_GET['cartID'];
        $delcart=$ct->del_cart($id);
  
       	$qty=$ct->get_cart();
        if(isset($delcart)){
			Session::set('qty',$qty);
			header('Location:cart.php');
        }
    }
?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Giỏ Hàng</h2>
			    	<?php
						if(isset($Update_quantity_cart)){
							echo '<span style="color:red;font-size:18px">'.$Update_quantity_cart.'</span>';	
						}
					?>
						<table class="tblone">
							<tr>
								<th width="20%">Tên Tranh</th>
								<th width="10%">Hình Ảnh</th>
								<th width="15%">Giá Tiền</th>
								<th width="25%">Số Lượng</th>
								<th width="20%">Tổng Tiền</th>
								<th width="10%">Thao Tác</th>
							</tr>
							<?php
								$getproductcart=$ct->get_product_cart();
								if($getproductcart){
									$subtotal=0;
									while($result=$getproductcart->fetch_assoc()){
							?>
							<tr>
								<td><?php echo $result['productName']?></td>
								<td><img src="admin/upload/<?php echo $result['image']?>" alt=""/></td>
								<td><?php echo $result['price']?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" class="buyfield" name="cartID" value="<?php echo $result['cartID']?>"/>
										<input type="number" name="quantity" min="0" value="<?php echo $result['quantity']?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
									
								</td>
								<td>
									<?php
									$total=$result['price']*$result['quantity'];
									echo $total;
									?>
								</td>
								<td><a href="cart.php?cartID=<?php echo $result['cartID']?>">Xóa</a></td>
							</tr>
							<?php
									$subtotal+=$total;
								}
							}
							?>
							
						</table>
						<?php
							$check_cart=$ct->check_cart();
							if($check_cart){	
						?>
						<table style="float:right;text-align:center;" width="20%">
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
					   </table>
					   <?php
					   	}else{
					   		echo "Vui lòng thêm sản phẩm vào giỏ hàng !";
					   	}
					   ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<?php
							if($check_cart){	
						?>
						<div class="shopright">
							<div style="font-size:18px;">Phương thức thanh toán</div>
							<br>
							<a href="offpay.php" class="buysubmit" style="font-size:14px;">Thanh toán khi nhận hàng</a>
         
						</div>
						<?php }?>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php
	//include 'include/footer.php' ;
?>
