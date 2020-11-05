<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="FCMS">
    <meta name="author" content="Ooi Kuan Hao"/>
    <meta name="description" content="Client Profile Page"/>
    <title>My Profile</title>
   <!--link rel="stylesheet" href="ClientProfile_Style.css"-->

    <!--link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"-->
    <!-- Google Fonts -->
    <!--link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"-->
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <!--link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet"-->
    <link rel='stylesheet' href='styles/ClientProfile_Style.css'>
    <!-- navbar css -->
    <?php
        include 'include/NavBarStyle.php';
    ?>
    
</head>


<body>
    <?php
        include 'include/ClientsNavBar.php';
    ?>
    
    
	<div class="container-fluid d-flex justify-content-center">

            <div class=" col-md-10 mt-5 pt-5">
             	<div class="row d-flex justify-content-center depth-3"><!--Center the content and put shadow-->
                 	<!--div class="col-sm-4 bg-info rounded-left">
        		        <div class="card-block text-center text-white">
                    		<h2 class="font-weight-bold mt-4">Nickson</h2>
                    		<p>Web Designer</p>
                		</div>
            		</div-->
            		<div class="col-sm-8 " id="pInfo">
                 	    <div class="col mx-auto">
        		            <div class="card-block text-center ">
                    		    <h2 class="font-weight-bold mt-4">Nickson</h2>
                    		    <p>Membership ID:</p>
                		    </div>
            		    </div>

                        <div class="col mx-auto">
        		            <div class="card">
                    	        <h3 class="text-center">Profile Information</h3>
                    	        <!--hr class="mt-0 w-75"-->
                   		       
                        	        <div >
                            	        <p class="font-weight-bold">Email:</p>
                           		        <h6 class=" text-muted">nick32@gmail.com</h6>
                        	        </div>
                        	        <div>
                            	        <p class="font-weight-bold">Phone:</p>
                           		        <h6 class="text-muted">+921234567890</h6>
                        	        </div>

                                                       		       
                        	        <div >
                            	        <p class="font-weight-bold">Email:</p>
                           		        <h6 class=" text-muted">nick32@gmail.com</h6>
                        	        </div>
                        	        <div>
                            	        <p class="font-weight-bold">Phone:</p>
                           		        <h6 class="text-muted">+921234567890</h6>
                        	            <input type="text" id="test">
                                    </div>

                            </div>
                        </div>

                    	<!--h4 class="mt-3 text-center">Projects</h4>
                    	<hr class="mt-0 w-50">
                   		<div class="row">
                        	<div class="col-sm-6">
                           		<p class="font-weight-bold">Recent</p>
                          	  	<h6 class="text-muted">School Web</h6>
                        	</div>
                        	<div class="col-sm-6">
                            	<p class="font-weight-bold">Most Viewed</p>
                            	<h6 class="text-muted">Dinoter husainm</h6>
                        	</div>
                    	</div>
                	   	<hr-->
              		</div>
             	</div>
            </div>
	</div>
</body>

</html>
