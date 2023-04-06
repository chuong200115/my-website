<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/cart.php';?>
<?php
    $ct= new cart();
    if(!isset($_GET['delid']) || $_GET['delid']==NULL){
        echo "<script> window.loction='comment.php'</script>";
    }else {
        $id=$_GET['delid'];
        $delCat=$ct->delete_odered($id);
    }
?>
<style>
	td {
		text-align: center;
	}
</style>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh Sách Đơn Hàng</h2>
                <div class="block">  
                <?php
                if(isset($delCat)){
                   echo $delCat;
                }
                ?>      
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>ID Khách Hàng</th>
							<th>Tên Tranh</th>
							<th>Số Lượng</th>
							<th>Giá</th>
							<th>Tổng</th>
							<th>Ngày Đặt</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$show_ordered=$ct->show_ordered_cus();
							if($show_ordered){
								$i=0;
								while ($result=$show_ordered->fetch_assoc()){
									$i++;
								
						?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $result['customerID']?></td>
							<td><?php echo $result['productName']?></td>
							<td><?php echo $result['quantity']?></td>	
							<td><?php echo $result['price']?></td>
							<td><?php echo $result['total']?></td>
							<td><?php echo $result['date']?></td>
							<td><a onclick="return confirm('Bạn có thật sự muốn xóa không ?')" href="?delid=<?php echo $result['ID']?>">Xóa</a></td>
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

