<!DOCTYPE html>
<html>
	<head>
	
		<title>[OT] Food and Beverages</title> 
		
		<meta charset="utf-8">
		<meta name = "viewport" content = "width=device-width, initial-scales">

		<link rel="stylesheet" href="styles/OTFoodAndBeverages.css">
		<script type="text/javascript" src="./js/food.js"></script>
	</head>
	
	<?php
        include 'include/NavBarStyle.php';
    ?>
	<body>
	<?php
		include 'include/OTNavBar.php';
		?>
	<div class="container" style="margin-top: 70px;">
		<div class="row col-lg-12 mx-auto">

		<div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="brand_list">
            <!-- <tr>
              <td>Brand1</td>
              <td>Brand2</td>
              <td>Brand3</td>
              <td>Brand4</td>
              <td>Brand5/td>
              <td>Brand6</td>
              <td><a class="btn btn-sm btn-info"></a><a class="btn btn-sm btn-danger">Delete</a></td>
            </tr> -->
          </tbody>
        </table>
      </div>

	  <div class="modal fade" id="edit_brand_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-brand-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <input type="hidden" name="brand_id">
              <div class="form-group">
                <label>Brand Name</label>
                <input type="text" name="e_brand_title" class="form-control" placeholder="Enter Brand Name">
              </div>
            </div>
            <input type="hidden" name="edit_brand" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary edit-brand-btn">Update Brand</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
		  <?php
				/*include "backend/DatabaseConnect.php";

				$db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);
				
				// check connection
				if($db){
					$pass = true;
				} else {
					die("fail");
				}
				
				$sql = "SELECT * FROM Food";
				$result = $db->query($sql);

				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						echo '
						<div class="col-7 text-left each_cont">
							<span>'.$row["FoodName"].'</span>
						</div>
						<div class="col-5 text-right each_cont">
							<form class="row">
								<div class="form" style="margin-right: 15px;">
									<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Edit Name">
								</div>
								<button type="submit" class="btn btn-warning btn-center">Edit</button>
							</form>
						</div>
						';
					}
				}
				
				// close connection
				$db->close();*/
			?>
		</div>
	</div>
	</body>
</html>
