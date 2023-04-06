<?php
	$filepath=realpath(dirname(__FILE__));
	include_once $filepath.'/../lib/database.php';
	include_once $filepath.'/../help/fomat.php';
	include_once $filepath.'/../lib/session.php';
?>

<?php
class customer
{
	private $data;
	private $format;
	public function __construct()
	{
		$this->db=new Database();
		$this->fm=new Format();
	}
	public function insert_customer($data){
		$name=mysqli_real_escape_string($this->db->link,$data['name']);
		$city=mysqli_real_escape_string($this->db->link,$data['city']);
		$address=mysqli_real_escape_string($this->db->link,$data['address']);
		$email=mysqli_real_escape_string($this->db->link,$data['email']);
		$phone=mysqli_real_escape_string($this->db->link,$data['phone']);
		$zipcode=mysqli_real_escape_string($this->db->link,$data['zipcode']);
		$pass=mysqli_real_escape_string($this->db->link,md5($data['pass']));
		$count=mysqli_real_escape_string($this->db->link,$data['count']);

		if($name==""||$city==""||$address==""||$email==""||$phone==""||$zipcode==""||$password=""||$country=""){
			$alert="<span style='color:red;font-size:18px'>Vui lòng nhập đầy đủ thông tin</span>";
			return $alert;
		}else{
			$check_email="SELECT *FROM table_customer WHERE Email='$email'";
			$result_check=$this->db->select($check_email);
			if($result_check) {
				$alert="<span class='error'>Email đã được đăng kí</span>";
				return $alert;
			}else{
				$query="INSERT INTO table_customer(Name,City,Address,Email,Phone,Zipcode,Password,Country) VALUES('$name','$city','$address','$email','$phone','$zipcode','$pass','$count')";
				$result=$this->db->insert($query);
				if($result){
					$alert="<span style='color:blue;font-size:18px'>Đăng kí thành công</span>";
					return $alert;
				}
				else {
					$alert="<span>Đăng kí không thành công</span>";
					return $alert;
				}
			}
		}
	}
	public function login_customer($data){
		$email=mysqli_real_escape_string($this->db->link,$data['email_login']);
		$password=mysqli_real_escape_string($this->db->link,md5($data['password_login']));
		if(empty($password)||empty($email)){
			$alert="<span style='color:red;font-size:14px'>Vui lòng nhập đầy đủ thông tin</span>";
			return $alert;
		}else{
			$check_acount="SELECT *FROM table_customer WHERE Email='$email' AND Password='$password' LIMIT 1";
			$result_check=$this->db->select($check_acount);

			if($result_check==true) {
				$value=$result_check->fetch_assoc();
				Session::set('customer_login',true);
				Session::set('cus_id',$value['ID']);
				Session::set('customer_password',$value['Password']);
				Session::set('customer_name',$value['Name']);
				header('Location:index.php');
				
			}else{
				$alert="<span style='color:red;font-size:14px' >Email hoặc Password không đúng</span>";
				return $alert;
			}
		}
	}
	public function show_customer(){
		$ID=Session::get("cus_id");
		$query="SELECT *FROM table_customer WHERE ID='$ID'";
		$result=$this->db->select($query);
		return $result;
	}
	public function Edit_Customer($data){
		$id=Session::get("cus_id");
		$name=mysqli_real_escape_string($this->db->link,$data['name']);
		$city=mysqli_real_escape_string($this->db->link,$data['city']);
		$address=mysqli_real_escape_string($this->db->link,$data['address']);
		$email=mysqli_real_escape_string($this->db->link,$data['email']);
		$phone=mysqli_real_escape_string($this->db->link,$data['phone']);

		if($name==""||$city==""||$address==""||$email==""||$phone==""){
			$alert="<span style='color:red;font-size:18px'>Vui lòng nhập đầy đủ thông tin</span>";
			return $alert;
		}else{
				
				$query="UPDATE table_customer SET Name='$name',City='$city',Address='$address',Email='$email',Phone='$phone' WHERE ID='$id'";
				$result=$this->db->insert($query);
				if($result){
					$alert="<span style='color:blue;font-size:18px'>Cập Nhật Thành Công</span>";
					return $alert;
				}
				else {
					$alert="<span>Cap Nhat không thành công</span>";
					return $alert;
				}
			
		}
	}

	public function change_password($data){
		$id=Session::get("cus_id");
		 $pass_old=md5($data["pass_old"]);
		 $pass_new=md5($data["pass_new"]);
		
		if($pass_old=="" || $pass_new==""){
			$alert="<span style='color:red;font-size:14px'>Vui lòng nhập đầy đủ</span>";
			return $alert;	
		}
		
		else{
			$check_acount="SELECT *FROM table_customer WHERE  Password='$pass_old' LIMIT 1";
			
			$result_check=$this->db->select($check_acount);
			//$result=$result_check->fetch_assoc();
			//return $result['Name'];
		
		
			if($result_check) {
				
				$query="UPDATE table_customer SET Password='$pass_new' WHERE ID='$id'";
				$result=$this->db->update($query);
			
				$alert="<span style='color:red;font-size:14px' >Thay đổi thành công</span>";
				return $alert;

			}else{
				$alert="<span style='color:red;font-size:14px' >Password old không đúng</span>";
				return $alert;
			}
			
		}
	}

	public function Comment_Customer($data){
		$cus_id=Session::get("cus_id");
		$email=$data["email"];
		$name=$data["name"];
		$phone=$data["phone"];
		$comment=$data["comment"];
		if($email=="" || $phone=="" || $name=="" ){
			$alert="<span style='color:red;font-size:14px'>Vui lòng nhập đầy đủ thông tin</span>";
			return $alert;
		}
		else{
			$query="INSERT INTO table_comment (name,customerID,email,phone,comment) VALUES('$name','$cus_id','$email','$phone','$comment') ";
			$result=$this->db->insert($query);
			if($result){
					$alert="<span style='color:blue;font-size:18px'>Gửi Thành Công</span>";
					return $alert;
				}
				else {
					$alert="<span>Cap Nhat không thành công</span>";
					return $alert;
			}
		}

	}
	public function show_customer_admin(){
		$query="SELECT *FROM table_customer";
		$result=$this->db->select($query);
		return $result;
	}
	public function delete_profile($id){
		$query="DELETE FROM table_customer WHERE ID='$id'";
		$result=$this->db->delete($query);
		if($result){
			$alert="<span class='success'>Đã xóa</span>";
				return $alert;
		}
		else {
			$alert="<span class='error'>Xoa không thành công</span>";
				return $alert;
		}
	}
	public function show_com_customer(){
		$query="SELECT *FROM table_comment";
		$result=$this->db->select($query);
		return $result;
	}
	public function delete_comment($id){
		$query="DELETE FROM table_comment WHERE ID='$id'";
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