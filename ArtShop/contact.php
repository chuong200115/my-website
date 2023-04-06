
<?php
	include 'include/header.php' ;
?>
<?php
    if(isset($_POST['submit']) ){
        $comment_customer=$cs->Comment_Customer($_POST);
    }
?>
 <div class="main">
    <div class="content">
    	<div class="support">
  			
  				<img src="web/images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Thông Tin Liên Hệ</h2>
					    <form action="" method="post">
					    	<div>
						    	<span><label>Tên</label></span>
						    	<span><input type="text" name="name"></span>
						    </div>
						    <div>
						    	<span><label>Email</label></span>
						    	<span><input type="text" name="email"></span>
						    </div>
						    <div>
						     	<span><label>SDT</label></span>
						    	<span><input type="text" name="phone"></span>
						    </div>
						    <div>
						    	<span><label>Nội Dung</label></span>
						    	<span><textarea name="comment"></textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" name="submit" value="Gửi"></span>
						  </div>
					    </form>
					    <?php
					    	if(isset($comment_customer)) {
					    		echo $comment_customer;
					    		echo ' <div><a href="index.php"  class="buysubmit" style="font-size:14px;">Quay lại trang chủ</a></div>';
					    	}
					    ?>
				  </div>
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h2>Thông Tin Cửa Hàng :</h2>	
						    	<p>999, Bình Tân, Hồ Chí Minh </p>
				   		<p>Phone:(00) 222 666 444</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p>Email: <span>info@mycompany.com</span></p>
				   		<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
				   </div>
				 </div>
			  </div>    	
    </div>
    <?php
	include 'include/footer.php' ;
?>
 </div>
