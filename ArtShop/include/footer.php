</div> 
   <div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>THÔNG TIN</h4>
						<ul>
						<li><a href="#">Nguyễn Thành Chương</a></li>
						<li><a href="#">Nguyễn Minh Hoàng</a></li>
						<li><a href="#">Nguyễn Thanh Sang</a></li>
						<li><a href="#">Lê Văn Hoàng</a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>MSSV</h4>
						<ul>
						<li><a href="#">1912800</a></li>
						<li><a href="#">1913439</a></li>
						<li><a href="#">1914920</a></li>
						<li><a href="#">1913429</a></li>						
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>KHÁCH HÀNG</h4>
						<ul>
							<li><a href="profile.php">Xem lịch sử đơn hàng</a></li>
							<li><a href="cart.php">Xem giỏ hàng</a></li>
							<li><a href="changepass.php">Đổi mật khẩu</a></li> 
							<!-- <li><a href="#">Track My Order</a></li> -->
							
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Liên hệ</h4>
						<ul>
							<li><span>Email: nguyenthanhsang649@gmail.com</span>
							<li><span>SDT: 0969208832</span></li>
							

						</ul>
						<div class="social-icons">
						    <ul>
							    <li class="facebook"><a href="#" target="_blank"> </a></li>
							    <li class="twitter"><a href="#" target="_blank"> </a></li>
							    
							    <div class="clear"></div>
						    </ul>
   	 					</div>
				</div>
			</div>
			
     </div>
    </div>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />


    <script type="text/javascript">
		$(document).ready(function() {
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>

    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    

	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>

</body>
</html>