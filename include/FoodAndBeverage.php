<?php 
session_start();
/**
 * ALTER TABLE products ADD product_qty INT(11) NOT NULL AFTER `product_price`;
 	UPDATE `products` SET product_qty = 1000 WHERE 1;

	CREATE TABLE `products` (
 `product_id` int(100) NOT NULL AUTO_INCREMENT,
 `cat_id` int(11) NOT NULL,
 `product_brand` int(100) NOT NULL,
 `product_title` varchar(255) NOT NULL,
 `product_price` int(100) NOT NULL,
 `product_qty` int(11) NOT NULL,
 `product_desc` text NOT NULL,
 `product_image` text NOT NULL,
 `product_keywords` text NOT NULL,
  CONSTRAINT fk_cat_id FOREIGN KEY fk_cat_id (cat_id) REFERENCES categories(cat_id),
    CONSTRAINT fk_product_brand FOREIGN KEY fk_product_brand (product_brand) REFERENCES brands(brand_id),
 PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
   
 */
class Products
{
	
	private $con;

	function __construct()
	{
		$db = new mysqli("localhost", "root", "", "fcms");
		$this->con = $db->connect();
	}

	public function getBrands(){
		$q = $this->con->query("SELECT * FROM Food");
		$ar = [];
		if ($q->num_rows > 0) {
			while ($row = $q->fetch_assoc()) {
				$ar[] = $row;
			}
		}
		return ['status'=> 202, 'message'=> $ar];
	}
	
	public function updateBrand($post = null){
		extract($post);
		if (!empty($brand_id) && !empty($e_brand_title)) {
			$q = $this->con->query("UPDATE Food SET FoodName = '$e_brand_title' WHERE FoodID = '$brand_id'");
			if ($q) {
				return ['status'=> 202, 'message'=> 'Brand updated'];
			}else{
				return ['status'=> 202, 'message'=> 'Failed to run query'];
			}
			
		}else{
			return ['status'=> 303, 'message'=>'Invalid brand id'];
		}

	}

	

}

if (isset($_POST['GET_BRAND'])) {
	$p = new Products();
	echo json_encode($p->getBrands());
	exit();
	
}

if (isset($_POST['edit_brand'])) {
	if (!empty($_POST['brand_id'])) {
		$p = new Products();
		echo json_encode($p->updateBrand($_POST));
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Invalid details']);
		exit();
	}
}

?>