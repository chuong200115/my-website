<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/customer.php';?>
<?php
    $cs= new customer();
    if(!isset($_GET['delid']) || $_GET['delid']==NULL){
        echo "<script> window.loction='comment.php'</script>";
    }else {
        $id=$_GET['delid'];
        $delCat=$cs->delete_comment($id);
    }
?>
<style>
	td {
		text-align: center;
	}
</style>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh Sách Bình Luận</h2>
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
							<th>Tên</th>
							<th>Email</th>
							<th>Bình Luận</th>
							<th>Thao Tác</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$show_com=$cs->show_com_customer();
							if($show_com){
								$i=0;
								while ($result=$show_com->fetch_assoc()){
									$i++;
								
						?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $result['name']?></td>
							<td><?php echo $result['email']?></td>
							<td><?php echo $result['comment']?></td>	
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

