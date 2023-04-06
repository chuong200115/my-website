<?php
	$filepath=realpath(dirname(__FILE__));
	include_once $filepath.'/../lib/database.php';
	include_once $filepath.'/../help/fomat.php';
	//include_once $filepath.'/../lib/session.php';
?>

<?php
class cart
{
	private $data;
	private $format;
	public function __construct()
	{
		$this->db=new Database();
		$this->fm=new Format();
	}
	public function Add_to_cart($quantity,$id){
		$quantity=$this->fm->validation($quantity);
		$quantity=mysqli_real_escape_string($this->db->link,$quantity);
		$id=mysqli_real_escape_string($this->db->link,$id);
		$sID=session_id();
		$query="SELECT *FROM table_product WHERE productID='$id'";
		$result=$this->db->select($query)->fetch_assoc();

		$product_Name=$result['productName'];
		$price=$result['price'];
		$image=$result['image'];

		$check="SELECT *FROM table_cart WHERE productID='$id'";
		$result_check=$this->db->select($check);
		
		if($result_check){
			$mesg="Sản phẩm đã tồn tại trong giỏ hàng";
			return $mesg;
		}else{
			
			$query_insert="INSERT INTO table_cart(productID,sessionID,productName,price,quantity,image) VALUES('$id','$sID','$product_Name','$price','$quantity','$image')";

				$insert_cart=$this->db->insert($query_insert);

				if($insert_cart){

					$alert="<span class='success'>Đã thêm vào giỏ hàng</span>";
					return $alert;
				}
				else {
					$alert="<span class='error'>Thêm san pham không thành công</span>";
					return $alert;
				}
		}
	}
	public function get_product_cart(){
		$sID=session_id();
		$query="SELECT *FROM table_cart WHERE sessionID='$sID'";
		$result=$this->db->select($query);
		return $result;
	}
	public function Update_quantity_cart($quantity,$cartID){
		$quantity=mysqli_real_escape_string($this->db->link,$quantity);
		$cartID=mysqli_real_escape_string($this->db->link,$cartID);
		$query="UPDATE table_cart SET quantity='$quantity' WHERE cartID='$cartID'";
		$result=$this->db->update($query);
		if($result){
			$mesg="Cập nhật thành công";
			return $mesg;
		}
		else{
			$mesg="Cập nhật ko thành công";
			return $mesg;
		}
		return $result;
	}
	public function del_cart($id){
		$id=mysqli_real_escape_string($this->db->link,$id);
		$query="DELETE FROM table_cart WHERE cartID='$id'";
		$result=$this->db->delete($query);
		return $result;
	}
	public function check_cart(){
		$sID=session_id();
		$query="SELECT *FROM table_cart WHERE sessionID='$sID'";
		$result=$this->db->select($query);
		return $result;
	}
	public function get_cart(){
		$query="SELECT *FROM table_cart ";
		$result=$this->db->select($query);
		$qty=0;
		if($result){
			while($get_cart=$result->fetch_assoc()){$qty++;}
		}
		return $qty;
	}
	public function delall_cart(){
		$sID=session_id();
		$query="DELETE FROM table_cart WHERE sessionID='$sID'";
		$result=$this->db->delete($query);
		return $result;
	}
	public function Insert_Order($customer_id){
		$sID=session_id();
		$query="SELECT *FROM table_cart WHERE sessionID='$sID'";
		$get_cart=$this->db->select($query);
		if($get_cart){
			while($result=$get_cart->fetch_assoc()){
				$productID=$result['productID'];
				$productName=$result['productName'];
				$price=$result['price'];
				$quantity=$result['quantity'];
				$total=$price*$quantity;
				$customerID=$customer_id;
				$query_insert="INSERT INTO table_order(productID,productName,price,quantity,customerID,total) VALUES('$productID','$productName','$price','$quantity','$customerID','$total')";
				$insert_order=$this->db->insert($query_insert);
			}
			
		}
		return $get_cart;
	}
	public function change_password($customer_id){
		$query="SELECT *FROM table_cart WHERE sessionID='$sID'";
	}
	public function get_cart_ordered(){
		$cus_id=Session::get('cus_id');
		$query="SELECT *FROM table_order WHERE customerID='$cus_id'";
		$get_cart_ordered=$this->db->select($query);
		return $get_cart_ordered;
	}
	public function show_ordered_cus(){
		$query="SELECT *FROM table_order order by ID desc LIMIT 10";
		$get_cart_ordered=$this->db->select($query);
		return $get_cart_ordered;
	}
	public function delete_odered($id){
		$query="DELETE FROM table_order WHERE ID='$id'";
		$result=$this->db->delete($query);
		if($result){
			$alert="<span class='success'>Đã Xóa</span>";
				return $alert;
		}
		else {
			$alert="<span class='error'>Xoa không thành công</span>";
				return $alert;
		}
	}
}
?>