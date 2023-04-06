<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/customer.php';?>
<?php
    $cs= new customer();
?>
<style>
	td {
		text-align: center;
	}
</style>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh Sách Khách Hàng</h2>
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
							<th>SĐT</th>
							<th>Địa Chỉ</th>
							
						</tr>
					</thead>
					<tbody>
						<?php
							$show_cs=$cs->show_customer_admin();
							if($show_cs){
								$i=0;
								while ($result=$show_cs->fetch_assoc()){
									$i++;
								
						?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $result['Name']?></td>
							<td><?php echo $result['Email']?></td>
							<td><?php echo $result['Phone']?></td>
							<td><?php echo $result['Address']?></td>	
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

