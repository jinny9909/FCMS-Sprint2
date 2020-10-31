<?php



					include 'backend/DatabaseConnect.php'; // global variables for connection
					$db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);
				
					if(isset($_POST['login'])){
						$username =mysqli_real_escape_string()[$con$_POST'username'];
						$password = $_POST['password'];
						$sql =" SELECT * FROM `clients` WHERE Username = '$username' AND Password ='$password' LIMIT 1";
						$result=$db->query($sql);
						
						if(($result)-> fetch_assoc()==1){
							echo " You Have Successfully Logged in";
							exit();
						}
						else{
							echo " You Have Entered Incorrect Password";
							exit();
                        }
                    }
					$db->close();

?>
