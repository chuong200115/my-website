<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/author.php';?>
<?php include '../classes/product.php';?>
<?php
    $product= new product();
    if(!isset($_GET['productID']) || $_GET['productID']==NULL){
        echo "<script> window.loction='catlist.php'</script>";
    }else {
        $id=$_GET['productID'];
        $delPro=$product->delete_product($id);
    }
?>
<style>
	td {
		text-align: center;
	}
</style>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh Sách Sản Phẩm</h2>
        <div class="block">  
        	<?php
        		if(isset($delPro)){echo $delPro;}
        	?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>Ảnh</th>
					<th>Tên</th>
					<th>Giá</th>
					<th>Tác Giả</th>
					<th>Loại</th>
					<th>Mô Tả</th>
					<th>Chủ Đề</th>
					<th>Thao Tác</th>
				</tr>
			</thead>
			<tbody>
				<tr class="odd gradeX">
					<?php
						$pd= new product();
						$pdlist=$pd->show_product();
						$i=0;
						if($pdlist){
							while($result=$pdlist->fetch_assoc()){
								$i++;

					?>
					<td><?php echo $i?></td>
					<td><img src="upload/<?php echo $result['image']?>" width="50" height="50"></td>
					<td><?php echo $result['productName']?></td>
					<td><?php echo $result['price']?></td>
					<td><?php echo $result['auName']?></td>
					<td><?php 
						if($result['type']==1) {echo 'Featured';}
						else {
							echo 'Non-Featured';
						}
					?>	
					</td>
					<td><?php echo $result['product_desc']?></td>
					<td><?php echo $result['catName']?></td>
					<td><a href="productedit.php?productID=<?php echo $result['productID']?>">Edit</a> || <a href="?productID=<?php echo $result['productID']?>">Delete</a></td>
					
				</tr>
				<?php
							}
						}
					?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
