<!DOCTYPE html>
<html>
<title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
      .bg{
          background-image: url("food3.jpg");
          height: 300%;
          background-position: center;
          background-repeat: no-repeat;
        }
        .footer {
          position: fixed;
          left: 0;
          bottom: 0;
          width: 100%;
          background-color: red;
          color: white;
          text-align: center;
        }
    </style>
    <?php
      $servername="localhost";
      $username="root";
      $password="";
      $dbname="miniproject";
      $conn=new mysqli($servername,$username,$password,$dbname);

      echo "Connection Name:".$servername;
      function uploadFile($fileName){
        $target_dir="images/";
        $target_file=$target_dir.basename($_FILES[$fileName]["name"]);
       
        $uploadOk=1;
        $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $check = getimagesize($_FILES[$fileName]["tmp_name"]);
        if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "File is not an image.";
          $uploadOk = 0;
        }
        // Check if file already exists
        if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
        }

      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
      } else {
      if (move_uploaded_file($_FILES[$fileName]["tmp_name"], $target_file)) {
        return $_FILES[$fileName]["name"];
      } else {
       echo "Sorry, there was an error uploading your file.";
      }
      }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
      $fileName= uploadFile("photo");
      $name=$_POST["name"];
      $price= $_POST["foodprice"];
      $description=$_POST["description"];
      $category=$_POST["category"];
      $mid=$_POST["mid"];


      saveItem($name,$price,$description,$fileName,$category,$mid);
    }
    function saveItem($name,$price,$description,$photo,$category,$mid){
      global $conn;
      $sql = "insert into managefoods(Food_Name,Price,Description,Image,Category_Name,Mid)
      values (?,?,?,?,?,?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("sssssi", $name,$price,$description,$photo,$category,$mid);

      // set parameters and execute

      $stmt->execute();
  } 
  $conn->close(); 
      include 'categorylist.php';
      $categorylist=getCategoryList();    
  ?>
    <body class="bg">
        <nav class="navbar navbar-expand-sm bg-light">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="managefood.php">Manage Food</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="managecategory.php">Manage Category</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="discount.php">Discount</a> 
              </li>
            </ul>
        </nav>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <div class="container">
            <h4 class="text-danger">Available Food Items</h4>
            <div class="col-5">
                <div class="form-group">
                    <label for="name" class="text-danger">Item Name</label>
                    <input type="text" class="form-control col-12" name="name" id="name" />
                </div>
                <div class="form-group">
                    <label for="name" class="text-danger">Price</label>
                    <input type="text" class="form-control col-12" name="foodprice" />
                </div>
                <div class="form-group">
                    <label for="name" class="text-danger">Description</label>
                    <input type="text" class="form-control col-12" name="description" />
                </div>
                <div class="form-group">
                    <label for="photo" class="text-danger">Images</label>
                    <input type="file" class="form-control" id="photo"  name="photo" />
                </div>
                <div class="form-group">
                    <label for="name" class="text-danger">Select Category Name</label>
                    <select name="category">
                      <?php
                        foreach($categorylist as $category){
                          echo "<option value='{$category->CName}'>$category->CName</option>";
                        }
                      ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name" class="text-danger">Mid</label>
                    <input type="number" class="form-control" name="mid"/>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-danger"> Add</button>
                </div>
                <a href="home.html" class="text-danger font-italic font-weight-bold">Home</a>
            </div>
        </div> 
        </form>
        <div class="footer">
          <p>About Foods</p>
        </div>
    </body>
</html>