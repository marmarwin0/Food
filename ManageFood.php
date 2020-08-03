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
        <form action="home.php" method="post">
        <div class="container">
            <h4 class="text-danger">Available Food Items</h4>
            <div class="col-5">
                <div class="form-group">
                    <label for="name" class="text-danger">Item Name</label>
                    <input type="text" class="form-control col-12" name="foodname" />
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
                    <label for="name" class="text-danger">Image</label>
                    <select >
                </div>
                <div class="form-group">
                    <label for="name" class="text-danger">Select Category Name</label>
                    <select>

                    </select>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-danger" id="addfood"> Add</button>
                </div>
                <a href="home.html" class="text-danger font-italic font-weight-bold">Home</a>
            </div>
        </div> 
        </form>
        <div class="footer">
          <h2>About Foods</h2>
        </div>
    </body>
</html>