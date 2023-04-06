<?php
	$filepath=realpath(dirname(__FILE__));
	include $filepath.'/../lib/session.php';
	include $filepath.'/../lib/database.php';
	Session::checkLogin();
	include $filepath.'/../help/fomat.php';
?>

<?php
class adminlogin
{
	private $data;
	private $format;
	public function __construct()
	{
		$this->db=new Database();
		$this->fm=new Format();
	}
	//
	public function login_admin($adminUser,$adminPass){
		$adminUser=$this->fm->validation($adminUser);
		$adminPass=$this->fm->validation($adminPass);

		$adminUser=mysqli_real_escape_string($this->db->link,$adminUser);
		$adminPass=mysqli_real_escape_string($this->db->link,$adminPass);

		if(empty($adminUser)||empty($adminPass)){
			$alert="User and Pass must not be empty";
			return $alert;
		}
		else{
			$query="SELECT * FROM table_admin WHERE User_admin='$adminUser' AND Pass_admin='$adminPass' LIMIT 1";
			$result=$this->db->select($query);
			if($result != false){
				$value=$result->fetch_assoc();
				Session::set('adminlogin',true);
				Session::set('adminID',$value['ID_admin']);
				Session::set('adminUser',$value['User_admin']);
				Session::set('adminName',$value['Name_admin']);
				header('Location:index.php');
			}else{
				$alert="User and Pass not match";
				return $alert;
			}
		}
	}
}
?>