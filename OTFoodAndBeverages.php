<!DOCTYPE html>
<html>
	<head>
	
		<title>[OT] Food and Beverages</title> 
		
		<meta charset="utf-8">
		<meta name = "viewport" content = "width=device-width, initial-scales">

		<link rel="stylesheet" href="styles/OTFoodAndBeverages.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	
	<?php
        include 'include/NavBarStyle.php';
    ?>
	<body>
	<?php
		include 'include/OTNavBar.php';
		?>
	<div class="container" style="margin-top: 100px;">
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
          <tbody id="food_list">
            <!-- <tr>
              <td>food1</td>
              <td>food2</td>
              <td>food3</td>
              <td>food4</td>
              <td>food5/td>
              <td>food6</td>
              <td><a class="btn btn-sm btn-info"></a><a class="btn btn-sm btn-danger">Delete</a></td>
            </tr> -->
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<!-- Edit food Modal -->
<div class="modal fade" id="edit_food_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Food</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-food-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <input type="hidden" name="food_id">
              <div class="form-group">
                <label>Food Name</label>
                <input type="text" name="e_food_title" class="form-control" placeholder="Enter Food Name">
              </div>
            </div>
            <input type="hidden" name="edit_food" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary edit-food-btn">Update Food</button>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

	</body>
  </html>
  <script type="text/javascript" >
$(document).ready(function(){

	getfoods();

	function getfoods(){
		$.ajax({
			url : 'classes/Food.php',
			method : 'POST',
			data : {GET_food:1},
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);

				var foodHTML = '';

				$.each(resp.message, function(index, value){
					foodHTML += '<tr>'+
									'<td></td>'+
									'<td>'+ value.FoodName +'</td>'+
									'<td><a class="btn btn-sm btn-info edit-food"><span style="display:none;">'+JSON.stringify(value)+'</span><i class="fas fa-pencil-alt"></i></a></td>'+
								'</tr>';
				});

				$("#food_list").html(foodHTML);

			}
		})
	}

	$(document.body).on("click", ".edit-food", function(){

		var food = $.parseJSON($.trim($(this).children("span").html()));
		console.log(food);
		$("input[name='e_food_title']").val(food.FoodName);
		$("input[name='food_id']").val(food.FoodID);

		$("#edit_food_modal").modal('show');



	});

	$(".edit-food-btn").on("click", function(){
		$.ajax({
			url : 'classes/Food.php',
			method : 'POST',
			data : $("#edit-food-form").serialize(),
			success : function(response){
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					getfoods();
					$("#edit_food_modal").modal('hide');
					alert(resp.message);
				}else if(resp.status == 303){
					alert(resp.message);
				}

			}
		});
	});

});

</script>


