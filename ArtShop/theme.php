
<?php
	include 'include/header.php' ;
	//include 'include/slider.php' ;
?>

 <div class="main">
    <div class="content">
    	<?php
	      		$get_cate=$cat->show_category();
	      		if($get_cate){
	      		while($result=$get_cate->fetch_assoc()){

	      	?>
    	<div class="content_top">
    		<div class="heading">
    		<h3><?php echo $result['catName']?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
    	
		    <div class="section group">
		    	<?php
    				$id=$result['catID'];
	      			$getpro_cate=$product->getproduct_by_cate($id);
	      			if($getpro_cate){
	      			while($result_pro=$getpro_cate->fetch_assoc()){

	     		?>
					<div class="grid_1_of_4 images_1_of_4">
						 <a href="details.php?proID=<?php echo $result_pro['productID']?>"><img src="admin/upload/<?php echo $result_pro['image']?>" alt="" /></a>
						 <h2><?php echo $result_pro['productName']?></h2>
						 <p><span class="price"><?php echo $fm->fomat_currency($result_pro['price'])." VND"?></span></p>
					</div>
				<?php
	      			}
	      		}
	     		?>
			</div>

		<?php
	      		}
	      	}
	     ?>
		
		
    </div>
 </div>
<?php
	//include 'include/footer.php' ;
?>

