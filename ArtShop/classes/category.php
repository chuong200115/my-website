<?php
	$filepath=realpath(dirname(__FILE__));
	include_once $filepath.'/../lib/database.php';
	include_once $filepath.'/../help/fomat.php';
?>

<?php
class category
{
	private $data;
	private $format;
	public function __construct()
	{
		$this->db=new Database();
		$this->fm=new Format();
	}
	//
	public function insert_category($catName){
		$catName=$this->fm->validation($catName);
		$catName=mysqli_real_escape_string($this->db->link,$catName);

		if(empty($catName)){
			$alert="<span class='error'>Tên danh mục không được trống</span>";
			return $alert;
		}
		else{
			$query="INSERT INTO table_category(catName) VALUES('$catName')";
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
	public function show_category(){
			$query="SELECT *FROM table_category order by catID desc";
			$result=$this->db->select($query);
			return $result;
	}
	public function getcatbyId($id){
		$query="SELECT *FROM table_category WHERE catID='$id'";
		$result=$this->db->select($query);
		return $result;
	}
	public function update_category($catName,$id){
		$catName=$this->fm->validation($catName);
		$catName=mysqli_real_escape_string($this->db->link,$catName);
		$id=mysqli_real_escape_string($this->db->link,$id);

		if(empty($catName)){
			$alert="<span class='error'>Tên danh mục không được trống</span>";
			return $alert;
		}
		else{
			$query="UPDATE table_category SET catName='$catName' WHERE catID='$id'";
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
	public function delete_category($id){
		$query="DELETE FROM table_category WHERE catID='$id'";
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
	public function show_category_frontend(){
		$query="SELECT *FROM table_category ";
		$result=$this->db->select($query);
		return $result;
	}
}
?>