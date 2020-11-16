<?php

/**
 *
 */
class Database
{

	private $con;
	public function connect(){
		$this->con = new Mysqli("sql103.epizy.com", "epiz_26969817", "8tcX2yGy4HPkCx", "epiz_26969817_FCMS");
		return $this->con;
	}
}

?>
