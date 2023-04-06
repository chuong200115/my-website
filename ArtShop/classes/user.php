<?php
	$filepath=realpath(dirname(__FILE__));
	include_once $filepath.'/../lib/database.php';
	include_once $filepath.'/../help/fomat.php';
?>

<?php
class user
{
	private $data;
	private $format;
	public function __construct()
	{
		$this->db=new Database();
		$this->fm=new Format();
	}
}
?>