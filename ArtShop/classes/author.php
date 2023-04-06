<?php
	$filepath=realpath(dirname(__FILE__));
	include_once $filepath.'/../lib/database.php';
	include_once $filepath.'/../help/fomat.php';
?>
<?php
class author
{
	private $data;
	private $format;
	public function __construct()
	{
		$this->db=new Database();
		$this->fm=new Format();
	}
	//
	public function insert_author($auName){
		$auName=$this->fm->validation($auName);
		$auName=mysqli_real_escape_string($this->db->link,$auName);

		if(empty($auName)){
			$alert="<span class='error'>Tên tác giả không được trống</span>";
			return $alert;
		}
		else{
			$query="INSERT INTO table_author(auName) VALUES('$auName')";
			$result=$this->db->insert($query);
			if($result){
				$alert="<span class='success'>Thêm thành công</span>";
				return $alert;
			}
			else {
				$alert="<span class='error'>Thêm không thành công</span>";
				return $alert;
			}
		}
	}
	public function show_author(){
			$query="SELECT *FROM table_author order by auID desc";
			$result=$this->db->select($query);
			return $result;
	}
	public function getaubyId($id){
		$query="SELECT *FROM table_author WHERE auID='$id'";
		$result=$this->db->select($query);
		return $result;
	}
	public function update_author($auName,$id){
		$auName=$this->fm->validation($auName);
		$auName=mysqli_real_escape_string($this->db->link,$auName);
		$id=mysqli_real_escape_string($this->db->link,$id);

		if(empty($auName)){
			$alert="<span class='error'>Tên tác giả không được trống</span>";
			return $alert;
		}
		else{
			$query="UPDATE table_author SET auName='$auName' WHERE auID='$id'";
			$result=$this->db->update($query);
			if($result){
				$alert="<span class='success'>Sua thành công</span>";
				return $alert;
			}
			else {
				$alert="<span class='error'>Sua không thành công</span>";
				return $alert;
			}
		}
	}
	public function delete_author($id){
		$query="DELETE FROM table_author WHERE auID='$id'";
		$result=$this->db->delete($query);
		if($result){
			$alert="<span class='success'>Xoa thành công</span>";
				return $alert;
		}
		else {
			$alert="<span class='error'>Xoa không thành công</span>";
				return $alert;
		}
	}
}
?>