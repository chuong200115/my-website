<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/author.php';?>
<?php
    $author= new author();
    if(!isset($_GET['authorid']) || $_GET['authorid']==NULL){
        echo "<script> window.loction='authorlist.php'</script>";
    }else {
        $id=$_GET['authorid'];
    }

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $auName=$_POST['auName'];
        $updateAu=$author->update_author($auName,$id);
    }
    
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa Tác Giả</h2>
                <?php
                if(isset($updateAu)){
                   echo $updateAu;
                }
                ?>
                <?php
                    $get_au_name=$author->getaubyId($id);
                    if($get_au_name){
                        while($result=$get_au_name->fetch_assoc()){
                    
                ?>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input name="auName"type="text" value="<?php echo $result['auName']?>" placeholder="Sửa tên tác giả tại đây..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Sửa" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>