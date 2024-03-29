<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/author.php';?>
<?php include '../classes/product.php';?>
<?php
    $pd= new product();
    if(!isset($_GET['productID']) || $_GET['productID']==NULL){
        echo "<script> window.loction='productlist.php'</script>";
    }else {
        $id=$_GET['productID'];
    }

    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])   ){
        $updateProduct=$pd->update_product($_POST,$_FILES,$id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa Sản Phẩm</h2>
        <div class="block">       
        <?php
            if(isset($updateProduct)) echo $updateProduct;
        ?> 
        <?php 
            $get_product_by_id=$pd->getproductbyId($id);
            if($get_product_by_id){
            while($result_product=$get_product_by_id->fetch_assoc()){
        ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input name="productName" value="<?php echo $result_product['productName']?>" type="text"  class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>----Select Category----</option>
                            <?php
                            $cat=new category();
                            $catelist=$cat->show_category();
                            if($catelist){
                                while ($result=$catelist->fetch_assoc()){
                            ?>
                            <option 
                            <?php 
                                if($result['catID']==$result_product['catID']) {echo 'selected';}
                            ?>
                            value="<?php echo $result['catID']?>"><?php echo $result['catName']?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Author</label>
                    </td>
                    <td>
                        <select id="select" name="author">
                            <option>----Select Author----</option>
                            <?php
                            $author=new  author();
                            $authorlist=$author->show_author();
                            if($authorlist){
                                while ($result=$authorlist->fetch_assoc()){
                            ?>
                            <option
                            <?php 
                                if($result['auID']==$result_product['authorID']) {echo 'selected';}
                            ?>
                            value="<?php echo $result['auID']?>"><?php echo $result['auName']?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                
                 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name ="product_desc" class="tinymce"> <?php echo $result_product['product_desc']?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input name="price"type="text" value="<?php echo $result_product['price']?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="upload/<?php echo $result_product['image']?>" width="70" height="70"><br>
                        <input name="image" type="file" />
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select name="type" id="select" name="select">
                            <?php
                            if($result_product['type']==0){
                            ?>
                            <option value="1">Featured</option>
                            <option select value="0">Non-Featured</option>
                            <?php
                            }else{
                            ?>
                             <option select value="1">Featured</option>
                             <option value="0">Non-Featured</option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
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
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


