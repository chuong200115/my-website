<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/author.php';?>
<?php
    $author= new author();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $auName=$_POST['auName'];
        $insertAu=$author->insert_author($auName);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm Tác Giả</h2>
                <?php
                if(isset($insertAu)){
                    echo $insertAu;
                }
                ?>
               <div class="block copyblock"> 
                 <form action="authoradd.php" method="post">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input name="auName"type="text" placeholder="Thêm tác giả tại đây..." class="medium" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Lưu lại" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>