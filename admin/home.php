<?php
session_start();
require 'connect.php';
$conn = Connect();
if(!isset($_SESSION['login_user1'])){
header("location:access-denied.php"); //Redirecting to myrestaurant Page
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TophTreat | Admin Index</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center">
            <h4>Welcome</h4>
            <?php
            echo $_SESSION['login_user1'];
            ?>
          </div>

          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>T</strong><strong class="text-primary">T</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li class="active"><a href="home.php"> <i class="icon-home"></i>Home</a></li>
            <li ><a href="categories.php">Food Categories</a></li>
             <li><a href="food_item.php">Food Items</a></li>
            <li><a href="add_new_staff.php">Admin</a></li>
            <li><a href="view_order_detail.php"> View Order Details</a></li>
            <li><a href="sales_report.php"> Generate Sales Report</a></li>

            <li><a href="setting.php"> Setting</a></li>

          </ul>
        </div>
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span>TophTreat </span></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Notifications dropdown-->
                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="view_order_detail.php" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell">
                </i><span class="badge badge-warning">
                  <?php
                    $not_sql= "SELECT COUNT(fullname) AS totalorder FROM orders WHERE notification =1 AND order_status = 1";
                    $not_query = mysqli_query($conn, $not_sql) or die(mysqli_error($conn)) ;
                    $not_result=mysqli_fetch_assoc($not_query);
                    echo $not_result['totalorder'] ;

                    ?>
                  
                </span></a>
                  
                </li>
                <!-- Messages dropdown-->
               <li class="nav-item dropdown"> <a id="messages" rel="nofollow" href="messages.php" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope"></i><span class="badge badge-info">
                  <?php
                    $not_sql= "SELECT COUNT(message_id) AS totalmessage FROM messages";
                    $not_query = mysqli_query($conn, $not_sql) or die(mysqli_error($conn)) ;
                    $not_result=mysqli_fetch_assoc($not_query);
                    echo $not_result['totalmessage'] ;

                    ?>
                </span></a>
                </li>
               
                <!-- Log out-->
                <li class="nav-item"><a href="logout.php" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <!-- Counts Section -->
      
 <div id="page-wrapper">

            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6">

      <h3 style="text-align: center; margin-top: 30px;">Statistics</h3> <hr>
        <?php

        $members=mysqli_query($conn, "SELECT * FROM customer")
        or die("There are no records to count ... \n" . mysqli_error($conn));

        $orders_placed=mysqli_query($conn, "SELECT * FROM orders")
        or die("There are no records to count ... \n" . mysqli_error());

        $orders_processed=mysqli_query($conn, "SELECT * FROM orders WHERE notification='0'")
        or die("There are no records to count ... \n" . mysqli_error());

        $registered_staff=mysqli_query( $conn, "SELECT * FROM admin")
        or die("There are no records to count ... \n" . mysqli_error());

        $food=mysqli_query( $conn, "SELECT * FROM food")
        or die("There are no records to count ... \n" . mysqli_error());

        //get food names and ids from food_details table
        $foods=mysqli_query($conn, "SELECT * FROM food")
        or die("Something is wrong ... \n" . mysql_error());
                $result1=mysqli_num_rows($members);
                $result2=mysqli_num_rows($orders_placed);
                $result3=mysqli_num_rows($orders_processed);
                $result4=$result2-$result3; //gets pending order(s)
                $result5=mysqli_num_rows($registered_staff);
                $result6=mysqli_num_rows($food);
        ?>
       <ul class="list-group">

      

        <li class="list-group-item">Members Registered <span class="badge"><?php echo $result1; ?></span></li>
        <li class="list-group-item">Orders Placed <span class="badge"><?php echo $result2; ?></span></li>
        <li class="list-group-item">Orders Processed <span class="badge"><?php echo $result3; ?></span></li>
        <li class="list-group-item">Orders Pending <span class="badge"><?php echo $result4; ?></span></li>
        <li class="list-group-item">Registered Staff <span class="badge"><?php echo $result5; ?></span></li>
        <li class="list-group-item">Foods <span class="badge"><?php echo $result6; ?></span></li>
               </ul>
                    </div>
</div>
</div>


      <footer class="main-footer" >
        <br><center>
      <p style="color: white;"> TophTreat 2019 | &copy; All Rights Reserved </p>
      <br></center>
          </footer>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
  </body>
</html>