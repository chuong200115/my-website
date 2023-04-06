<?php
	$filepath=realpath(dirname(__FILE__));
	include_once $filepath.'/../lib/database.php';
	include_once $filepath.'/../help/fomat.php';
?>

<?php
class product
{
	private $data;
	private $format;
	public function __construct()
	{
		$this->db=new Database();
		$this->fm=new Format();
	}
	//
	public function insert_product($data,$file){
		
		$productName=mysqli_real_escape_string($this->db->link,$data['productName']);
		$author=mysqli_real_escape_string($this->db->link,$data['author']);
		$category=mysqli_real_escape_string($this->db->link,$data['category']);
		$product_desc=mysqli_real_escape_string($this->db->link,$data['product_desc']);
		$price=mysqli_real_escape_string($this->db->link,$data['price']);
		$type=mysqli_real_escape_string($this->db->link,$data['type']);

		//Kiem tra hinh anh va lay hinh anh dua vao upload
		$permited =array('jpg','jpeg','png','gif');
		$file_name =$_FILES['image']['name'];
		$file_size =$_FILES['image']['size'];
		$file_temp =$_FILES['image']['tmp_name'];

		$div=explode('.',$file_name);
		$file_ext = strtolower(end($div));
		$unique_image= substr(md5(time()),0,10).'.'.$file_ext;
		$uploaded_image="upload/".$unique_image;

		if($productName==""||$author==""||$category==""||$product_desc==""||$price==""||$type==""||$file_name=""){
			$alert="<span class='error'>Các trường khộng được rỗng</span>";
			return $alert;
		}
		else{
			move_uploaded_file($file_temp,$uploaded_image);
			$query="INSERT INTO table_product(productName,catID,authorID,product_desc,type,price,image) VALUES('$productName','$category','$author','$product_desc','$type','$price','$unique_image')";
			$result=$this->db->insert($query);
			if($result){
				$alert="<span class='success'>Thêm san pham thành công</span>";
				return $alert;
			}
			else {
				$alert="<span class='error'>Thêm san pham không thành công</span>";
				return $alert;
			}
		}
	}
	
	public function show_product(){
			$query="
			SELECT table_product.*, table_author.auName,table_category.catName 
			FROM table_product INNER JOIN table_category ON table_product.catID=table_category.catID
			INNER JOIN table_author ON table_product.authorID=table_author.auID
			order by table_product.productID desc ";
			$result=$this->db->select($query);
			return $result;
	}
	
	public function getproductbyId($id){
		$query="SELECT *FROM table_product WHERE productID='$id'";
		$result=$this->db->select($query);
		return $result;
	}
	
	public function update_product($data,$files,$id) {
		$productName=mysqli_real_escape_string($this->db->link,$data['productName']);
		$author=mysqli_real_escape_string($this->db->link,$data['author']);
		$category=mysqli_real_escape_string($this->db->link,$data['category']);
		$product_desc=mysqli_real_escape_string($this->db->link,$data['product_desc']);
		$price=mysqli_real_escape_string($this->db->link,$data['price']);
		$type=mysqli_real_escape_string($this->db->link,$data['type']);

		//Kiem tra hinh anh va lay hinh anh dua vao upload
		$permited =array('jpg','jpeg','png','gif');
		$file_name =$_FILES['image']['name'];
		$file_size =$_FILES['image']['size'];
		$file_temp =$_FILES['image']['tmp_name'];

		$div=explode('.',$file_name);
		$file_ext = strtolower(end($div));
		$unique_image= substr(md5(time()),0,10).'.'.$file_ext;
		$uploaded_image="upload/".$unique_image;


		if($productName==""||$author==""||$category==""||$product_desc==""||$price==""||$type==""){
			$alert="<span class='error'>Các trường khộng được rỗng</span>";
			return $alert;
		}
		else{
			if(!empty($file_name)){
				//Up anh
				if($file_size>200048){
					$alert="<span class='error'>Image size should be less than 2MB</span>";
					return $alert;
				}else if(in_array($file_ext,$permited)==false){
					$alert="<span class='error'>You can upload only:".implode(',',$permited )."</span>";
					return $alert;
				}
				move_uploaded_file($file_temp,$uploaded_image);
				$query="UPDATE table_product SET 
				productName='$productName',
				authorID='$author',
				catID='$category',
				type='$type',
				price='$price',
				image='$unique_image',
				product_desc='$product_desc'
				WHERE productID='$id'";
			}else{
				//Ko up anh
				$query="UPDATE table_product SET 
				productName='$productName',
				authorID='$author',
				catID='$category',
				type='$type',
				price='$price',
				product_desc='$product_desc'
				WHERE productID='$id'";
			}
			//
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
	public function delete_product($id){
		$query="DELETE FROM table_product WHERE productID='$id'";
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
	public function getproduct_featured(){
		$query="SELECT *FROM table_product WHERE type='1' order by productID desc LIMIT 4";
		$result=$this->db->select($query);
		return $result;
	}
	public function getproduct_new(){
		$query="SELECT *FROM table_product order by productID desc LIMIT 4";
		$result=$this->db->select($query);
		return $result;
	}
	public function get_product_details($id){
		$query="
			SELECT table_product.*, table_author.auName,table_category.catName 
			FROM table_product INNER JOIN table_category ON table_product.catID=table_category.catID
			INNER JOIN table_author ON table_product.authorID=table_author.auID
			WHERE table_product.productID='$id'";
			$result=$this->db->select($query);
			return $result;
	}
	public function getproduct_by_cate($id){
		$query="SELECT *FROM table_product WHERE catID='$id' order by productID desc LIMIT 4";
		$result=$this->db->select($query);
		return $result;
	}
	public function search_product($keyword){
		$keyword=$this->fm->validation($keyword);
		$query="SELECT *FROM table_product WHERE productName LIKE '%$keyword%'";
		$result=$this->db->select($query);
		return $result;
	}
}
?>