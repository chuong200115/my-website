<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/author.php';?>
<?php include '../classes/product.php';?>
<?php
    $pd= new product();
    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])   ){
        $insertProduct=$pd->insert_product($_POST,$_FILES);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm Sản Phẩm Mới</h2>
        <div class="block">       
        <?php
            if(isset($insertProduct)) echo $insertProduct;
        ?>        
         <form action="productadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên Tranh</label>
                    </td>
                    <td>
                        <input name="productName" type="text" placeholder="Nhập tên tranh..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Chủ đề tranh</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>----Chọn Chủ Đề----</option>
                            <?php
                            $cat=new category();
                            $catelist=$cat->show_category();
                            if($catelist){
                                while ($result=$catelist->fetch_assoc()){
                            ?>
                            <option value="<?php echo $result['catID']?>"><?php echo $result['catName']?></option>
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
                            <option>----Chọn Tác GIả----</option>
                            <?php
                            $author=new  author();
                            $authorlist=$author->show_author();
                            if($authorlist){
                                while ($result=$authorlist->fetch_assoc()){
                            ?>
                            <option value="<?php echo $result['auID']?>"><?php echo $result['auName']?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả</label>
                    </td>
                    <td>
                        <textarea name ="product_desc"class="tinymce"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input name="price"type="text" placeholder="Nhập Giá..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Ảnh</label>
                    </td>
                    <td>
                        <input name="image" type="file" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Loại</label>
                    </td>
                    <td>
                        <select name="type" id="select" name="select">
                            <option>Loại</option>
                            <option value="1">Nổi Bật</option>
                            <option value="0">Ko nổi bật</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Thêm" />
                    </td>
                </tr>
            </table>
            </form>
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


