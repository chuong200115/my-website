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
    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
        $quantity=$_POST['quantity'];
        $AddCart=$ct->Add_to_cart($quantity,$id);
        $qty=$ct->get_cart();
        if(isset($qty)){
			Session::set('qty',$qty);
			header('Location:index.php');
        }
		
    }
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<?php
    			
    			$get_details=$product->get_product_details($id);

    			if($get_details){
    				while($result=$get_details->fetch_assoc()){
    		?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/upload/<?php echo $result['image']?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['productName']?></h2>				
					<div class="price">
						<p>Category: <span><?php echo $result['catName']?></span></p>
						<p>Brand: <span><?php echo $result['auName']?></span></p>
						<p>Price: <span><?php echo $result['price']." VND"?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Mua Ngay"/><br/><br/>
					</form>				
				</div>
			</div>	
			<div class="product-desc">
			<h2>Product Details</h2>
			<p> <?php echo $result['product_desc']?></p>
	        
	    	</div>
			<?php
    				}
    			}
    		?>
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>Chủ Đề</h2>
					<ul>
						<?php
							$getall_cate=$cat->show_category_frontend();
							if($getall_cate) {
								while($result=$getall_cate->fetch_assoc()){

						?>
				      <li><a href="productbycat.php?catID=<?php echo $result['catID']?>"><?php echo $result['catName']?></a></li>
				      <?php	
    					}
					}
					?>
    				</ul>
    				
    	
 				</div>
 		</div>
 	</div>
<?php
	include 'include/footer.php' ;
?>