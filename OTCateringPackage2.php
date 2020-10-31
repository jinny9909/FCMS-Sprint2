<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/ordersClient.css">
    <title>CRUD Catering Packages</title>
    <?php
        include 'include/NavBarStyle.php';
        include 'include/StringPath.php';
    ?>
</head>
<body>
    <?php
        include 'include/OTNavBar.php';
    ?>
    <div class="container jumbotron" style="margin-top: 100px;">
        <h1 class="text-center">Package A</h1>
        <hr class="hr">
        <form>
            <div class="row">
                <div class="col-md-2 col-sm-4">
                    <input type="image" class="img-fluid rounded img-thumbnail" src=<?php echo $image_packageA ?> alt="Upload Image" width="200px" height="200px">
                </div>
                <div class="col-md-10 col-sm-8">
                    <div class="form-group">
                        <label for="packageName">Catering Package Name</label>
                        <input type="text" class="form-control" id="packageName" 
                        placeholder=<?php echo $name_packageA ?>>
                    </div>
                    <div class="form-group">
                        <label for="pr">Package Price</label>
                        <input type="text" class="form-control" id="packageName" 
                        placeholder=<?php echo $price_packageA ?>>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row-md-12">
                <div class="form-group">
                    <label for="pr">Description</label>
                    <input type="text" class="form-control" id="packageDesc" 
                    placeholder=<?php echo $descr_packageA ?>>
                </div>
            </div>
            <div class="row-md-12">
                <p>Food and beverages</p>
                <div class="checkbox">
                    <input type="checkbox" id="food1" value="food1"><label for="food1" style="padding-left: 10px;">Food1</label>
                </div>
                <div class="checkbox">
                    <input type="checkbox" id="food2" value="food1"><label for="food2" style="padding-left: 10px;">Food2</label>
                </div>
                <div class="checkbox">
                    <input type="checkbox" id="food3" value="food1"><label for="food3" style="padding-left: 10px;">Food3</label>
                </div>
            </div>
        </form>
    </div>
</body>
</html>