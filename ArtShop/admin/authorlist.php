<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/author.php';?>
<?php
    $author= new author();
    if(!isset($_GET['delid']) || $_GET['delid']==NULL){
        echo "<script> window.loction='catlist.php'</script>";
    }else {
        $id=$_GET['delid'];
        $delAu=$author->delete_author($id);
    }
?>
<style>
	td {
		text-align: center;
	}
</style>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh Sách Chủ Đề</h2>
                <div class="block">  
                <?php
                if(isset($delAu)){
                   echo $delAu;
                }
                ?>      
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Chủ Đề</th>
							<th>Thao Tác</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$show_author=$author->show_author();
							if($show_author){
								$i=0;
								while ($result=$show_author->fetch_assoc()){
									$i++;
								
						?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $result['auName']?></td>
							<td><a href="authoredit.php?authorid=<?php echo $result['auID']?>">Sửa</a> || <a onclick="return confirm('Bạn có thật sự muốn xóa không ?')" href="?delid=<?php echo $result['auID']?>">Xóa</a></td>
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

