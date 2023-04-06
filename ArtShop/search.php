
<?php
	include 'include/header.php' ;
	//include 'include/slider.php' ;
?>
<?php
	 if($_SERVER['REQUEST_METHOD']=='POST'){
	 	$keyword=$_POST['keyword'];
	 	$search_product=$product->search_product($keyword);
	 }
	
?>
 <div class="main">
    <div class="content">
    	
    	<div class="content_top">
    		<div class="heading">
    		<p>Từ Khóa Tìm Kiếm: <?php echo $keyword?></p>
    		</div>
    		<div class="clear"></div>
    	</div>
    	
		    <div class="section group">
		    	<?php
	      			if($search_product){
	      			while($result=$search_product->fetch_assoc()){

	     		?>
					<div class="grid_1_of_4 images_1_of_4">
						 <a href="details.php?proID=<?php echo $result['productID']?>"><img src="admin/upload/<?php echo $result['image']?>" alt="" /></a>
						 <h2><?php echo $result['productName']?></h2>
						 <p><span class="price"><?php echo $fm->fomat_currency($result['price'])." VND"?></span></p>
					</div>
				<?php
	      			}
	      		}
	     		?>
			</div>

	
    </div>
 </div>
<?php
	include 'include/footer.php' ;
?>

