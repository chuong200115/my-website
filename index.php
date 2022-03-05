<?php
	include 'include/header.php' ;

?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Tác phẩm nổi bật</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				
				<?php
					$product_featured=$product->getproduct_featured();
					if($product_featured){
						while($result=$product_featured->fetch_assoc()){
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proID=<?php echo $result['productID']?>"><img src="admin/upload/<?php echo $result['image']?>" alt="" /></a>
					 <h2><?php echo $result['productName']?></h2>
					 <p><span class="price"><?php echo $result['price']." VND"?></span></p>
				</div>
				<?php
						}
					}
					?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Các tác phẩm mới</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php
					$product_new=$product->getproduct_new();
					if($product_new){
						while($result=$product_new->fetch_assoc()){
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proID=<?php echo $result['productID']?>"><img src="admin/upload/<?php echo $result['image']?>" alt="" /></a>
					 <h2><?php echo $result['productName']?></h2>
					 <p><span class="price"><?php echo $result['price']." VND"?></span></p>
				</div>
				<?php
						}
					}
					?>
			</div>
    </div>
 <?php
	include 'include/footer.php' ;
?>
 </div>


