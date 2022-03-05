
<?php
	include 'include/header.php' ;
	//include 'include/slider.php' ;
?>
<?php
	 if(!isset($_GET['catID']) || $_GET['catID']==NULL){
        echo "<script> window.loction='details.php'</script>";
    }else {
        $id=$_GET['catID'];
    }
	
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<?php
	      			$get_cate=$cat->getcatbyId($id);
	      			if($get_cate){
	      				while($result=$get_cate->fetch_assoc()){

	      	?>
    		<h3><?php echo $result['catName']?></h3>
    		<?php
	      				}
	      			}
	      	?>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      		<?php
	      			$getpro_cate=$product->getproduct_by_cate($id);
	      			if($getpro_cate){
	      				while($result=$getpro_cate->fetch_assoc()){

	      		?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proID=<?php echo $result['productID']?>"><img src="admin/upload/<?php echo $result['image']?>" alt="" /></a>
					 <h2><?php echo $result['productName']?></h2>
					 <p><span class="price"><?php echo $result['price']?></span></p>
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

