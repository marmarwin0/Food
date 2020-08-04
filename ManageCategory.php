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
          padding:10px;
        }
    </style>
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <div class="container" style="padding: 60px;">
              <h4 class="text-danger">Food Lists</h4>
              <div class="col-5">
                <div class="form-group">
                  <label for="name" class="text-danger">Category</label>
                  <input type="text" class="form-control col-12" name="cname" />
                </div>
                <div class="form-group">
                    <button  type="submit" class="btn btn-danger"> Add</button>
                </div>
              </div>
            <a href="home.php" class="text-danger font-italic font-weight-bold" >Home</a>
          </div>
        </form>
        <div class="footer">
          <h2>About Categories</h2>
        </div>
        <?php
          if($_SERVER["REQUEST_METHOD"] == "POST"){
            $cname=$_POST["cname"];
            $categoryList=array("CName"=>$cname);
            $res=json_encode($categoryList);

            $myfile=fopen("category.txt","a");
            fwrite($myfile, $res."\n");
            fclose($myfile);

          
          $servername="localhost";
          $username="root";
          $password="";
          $dbname="miniproject";
          $conn=new mysqli($servername,$username,$password,$dbname);
          
          if($conn->connect_error){
            die("Connection failed :".$conn->connect_error);
          }
          
          $sql="insert into managecategory(Category_Name)values('$cname')";

          if($conn->query($sql)===TRUE){
            echo "Manage Category Successfully";
          }
          else{
            echo "Error:".$sql."<br>".$conn->connect_error;
          }
          $conn->close();
        }
        ?>
    </body>
</html>