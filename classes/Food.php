<?php
class Products
{

	private $con;

	function __construct()
	{
		include_once("Database.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	public function getfoods(){
		$q = $this->con->query("SELECT * FROM Food");
		$ar = [];
		if ($q->num_rows > 0) {
			while ($row = $q->fetch_assoc()) {
				$ar[] = $row;
			}
		}
		return ['status'=> 202, 'message'=> $ar];
	}

	public function updatefood($post = null){
		extract($post);
		if (!empty($food_id) && !empty($e_food_title)) {
			$q = $this->con->query("UPDATE Food SET FoodName = '$e_food_title' WHERE FoodID = '$food_id'");
			if ($q) {
				return ['status'=> 202, 'message'=> 'food updated'];
			}else{
				return ['status'=> 202, 'message'=> 'Failed to run query'];
			}

		}else{
			return ['status'=> 303, 'message'=>'Invalid food id'];
		}

	}
}

if (isset($_POST['GET_food'])) {
	$p = new Products();
	echo json_encode($p->getfoods());
	exit();

}

if (isset($_POST['edit_food'])) {
	if (!empty($_POST['food_id'])) {
		$p = new Products();
		echo json_encode($p->updatefood($_POST));
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Invalid details']);
		exit();
	}
}

?>
