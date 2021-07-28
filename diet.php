<?php
session_start();
require 'connect.php';
$conn = Connect();
if(!isset($_SESSION['login_user2'])){
header("location: access-denied.php"); //Redirecting to myrestaurant Page
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>TophTreat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type = "text/css" href ="css/foodlist.css">
<style type="text/css">
    .sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: ;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #111;
  display: block;
}

.sidenav a:hover {
  color: #FDA403;
}

.main {
  margin-top: 23px; /* Same as the width of the sidenav */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.form-group{
  border: 1px solid black;
  width: 300px;
}
</style> 
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="index.php"><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TophTreat</h3></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>      
            <li class="nav-item"><a href="#section-food-zone" class="nav-link">Food zone</a></li>
            <li class="nav-item"><a href="member-index.php" class="nav-link">My account</a></li>
            <li class="nav-item"><a href="#section-contact" class="nav-link">Contact</a></li>
            <li class="nav-item"><a href="#section-contact" class="nav-link"></a></li>
            <li class="nav-item"><a href="#section-contact" class="nav-link"></a></li>
    </ul>
    </div> 
    </nav>

<body>
    
  

<div class="container" style="width:95%; ">

<div class="row" >  

<div class="sidenav bg-light " style="margin-top: 50px;">
  <a href="#"><?php echo$_SESSION['login_user2']; ?></a>
  <a href="member-index.php">Home</a>
 <a href="cart.php" class="nav-link"><span class="glyphicon glyphicon-shopping-cart"></span> Cart  (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?>) </a>
        <a href="diet.php">Monitor Your Diet</a>
            <a href="setting.php">Setting</a>

    <a href="logout.php">Logout</a>
</div>

<div class="main" style="min-height: 780px; margin-left: 100px;">
       <br><h5>Monitor your diet. Track your food intake</i> </h5>
       
       <div class="row">
          <div class="col-md-5">
              <marque></marque>
              <h5> </h5><br>
              <form action="bmi.php" method="post">
                <input type="text" name="weight" placeholder="Enter your Weight (in kg)" class="form-group outline-success"><br>
                <input type="text" name="height" placeholder="height (metre)" class="form-group outline-success"><br>
                <button class="btn btn-primary" name="add_weight">Submit</button>
              </form> <br>
<?php
              if (isset($_GET['message'])) {
                                      echo '<div class="alert alert-danger">Your body mass index is '.$_SESSION['bmi'].'<br>';
                                  
                                 // BMI < 18.5 Underweight 18.5  ≤  BMI  < 25.0 Normal 25.0  ≤  BMI  < 30.0 Overweight 30.0  ≤  BMI Obese
                            if($_SESSION['bmi']<18.8){
                              echo "You are Underweight";
                            }elseif ($_SESSION['bmi']<25) {
                                  echo "You are Normal";
                            }elseif ($_SESSION['bmi']<=30) {
                              echo " You are Overweight";
                            }elseif ($_SESSION['bmi']>=30) {
                              echo "You are obese";
                            }}
                            ?>
          </div></div>
                    <div class="col-md-1">
</div>
          <div class="col-md-5">
<!--               <div><h5>BMI</h5>
                <?php 
                if (isset($_GET['message'])) {
                $sql = "SELECT * FROM customer_bmi WHERE customer_id = '".$_SESSION['customerid']."' ";
              $result = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_assoc($result)){
                  echo $row['customer_bmi'];}
              }?></div> -->
                <br>
               <?php if (isset($_GET['message'])) {
                              if($_SESSION['bmi']<18.8){
                              echo "You are Underweight ";
                            }elseif ($_SESSION['bmi']<25) {
                                  echo "Normal";
                            }elseif ($_SESSION['bmi']<=30) {
                              echo " <h4>Overweight</h4><br>the very simple formula to weight loss is burning more calories than you take in. Starvation is not good for the body. Click on the link below to get a weight loss food table";
                            }elseif ($_SESSION['bmi']>=30) {
                              echo " You are obese<br> You really need to burn fat to remain healthy.  Click on the link below to get a weight loss food table";
                            }
                            echo '<br><button class="btn btn-success site-animate" data-toggle="modal" data-target="#reservationModal">Click here to get your meal timetable</button>';}
              ?><br><br><br>

            </div>
          </div>
          </div>
       </div>
</div>
</div>

   <!-- The Modal -->
 <div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="reservationModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
              
              <div class="col-lg-12 p-5">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <small>CLOSE </small><span aria-hidden="true">&times;</span>
                </button>
                <h3 class="mb-4">Food Table</h3>  
                    <?php
                      if ($_SESSION['bmi']>=25) {
                        
                  
                    ?>
                    <table>
                      <tr><th></th><th>Breakfast</th><th>Lunch</th><th>Supper</th><th>Snacks</th></tr>
                      <tr><td>Sunday</td><td>1 Boiled plantain<br> 1 plate of baked beans</td><td>Milled Brown Rice <br> Spinach Soup or ogbono</td><td>Moi Moi</td><td>Apple or Banana</td></tr>
                      <tr><td>Monday</td><td>Egg<br> 2 slices of bread</td><td>Pounded yam<br>Spinach soup</td><td>Tilapia or potato pepper soup</td><td>Mixed nuts</td></tr>
                      <tr><td>Tuesday</td><td>Boiled Cassava<br>Scrambled Egg whites(with tomatoes and pepper)</td><td>1 cup of cooked whole wheat pasta<br> 1 Portion chicken or goat meat</td><td>1 cup of cooked beans<br> 1 plate of boiled plantain</td><td>1 cup of roasted plantain chips</td></tr>
                      <tr><td>Wednesday</td><td>3/4 cup of cereal<br>1 cup of milk<br> 1 plantain</td><td>Boiled egg<br> Tomato Sandwich</td><td>1 portion Mackerel<br> 2 roasted sweet potato</td><td>Apple<br> 1 table spoon of nut butter</td></tr>
                      <tr><td>Thursday</td><td>Moi moi<br> Oatmeal</td><td>Mixed okra soup(palm oil)<br>chicked</td><td>Indomie<br>(mixed vegies and shrimps)</td><td>Roasted Sweet potato chips</td></tr>
                      <tr><td>Friday</td><td>Vegetable omlet <br> 1 slice of bread<br> yougurt</td><td>1plate of brown rice jollof<br> mixed salad<br> chicken</td><td>Boiled plantain<br>baked beans</td><td>Mixed nut </td></tr>
                      <tr><td>Saturday</td><td>Mixed fruit salad<br> youghurt</td><td>Roaasted whole tilapia and vegetable</td><td>1 plate of rice and beans</td><td>mongo or guava</td></tr>                    <button class="btn btn-default" download>Save</button>

                    </table><?php 
                  }elseif($_SESSION['bmi']>30) {
                  ?>
                    <table>
                      <tr><th></th><th>Breakfast</th><th>Lunch</th><th>Supper</th><th>Snacks</th></tr>
                      <tr><td>Sunday</td><td>Oat, Milk, Chips</td><td>Jolof rice , chicken, steamed vegetable </td><td>Fruit salad, chicken</td><td>Apple or Banana</td></tr>
                      <tr><td>Monday</td><td>Bread, Egg sauce </td><td>Beans and corn</td><td>Amala/Lafun, Soup of your choice</td><td>Mixed nuts</td></tr>
                      <tr><td>Tuesday</td><td>Yam, fish sauce, vegetable stew</td><td>Semovita/ Tuwo, stew of your choice</td><td>Beans an bread</td><td>1 cup of roasted plantain chips</td></tr>
                      <tr><td>Wednesday</td><td>Ceareal</td><td>Wheatmeal, okro, meat</td><td>Spaggetti</td><td>Apple<br> 1 table spoon of nut butter</td></tr>
                      <tr><td>Thursday</td><td>Moi moi<br> Oatmeal</td><td>Coconut Rice</td><td>Indomie<br>(mixed vegies and shrimps)</td><td>Roasted Sweet potato chips</td></tr>
                      <tr><td>Friday</td><td>Vegetable omlet <br> 1 slice of bread<br> yougurt</td><td>Pounded Yam</td><td>Boiled plantain<br>baked beans</td><td>Mixed nut </td></tr>
                      <tr><td>Saturday</td><td>Mixed fruit salad<br> youghurt</td><td> Beans Pottage</td><td>1 plate of rice and beans</td><td>mongo or guava</td></tr>                    <button class="btn btn-default">Save</button>

                    </table>
                      <?php 
                         }elseif ($_SESSION['bmi']>=25) {
                        
                  
                    ?>
                    <table>
                      <tr><th></th><th>Breakfast</th><th>Lunch</th><th>Supper</th><th>Snacks</th></tr>
                      <tr><td>Sunday</td><td>1 Boiled plantain<br> 1 plate of baked beans</td><td>Milled Brown Rice <br> Spinach Soup or ogbono</td><td>Moi Moi</td><td>Apple or Banana</td></tr>
                      <tr><td>Monday</td><td>Egg<br> 2 slices of bread</td><td>Pounded yam<br>Spinach soup</td><td>Tilapia or potato pepper soup</td><td>Mixed nuts</td></tr>
                      <tr><td>Tuesday</td><td>Boiled Cassava<br>Scrambled Egg whites(with tomatoes and pepper)</td><td>1 cup of cooked whole wheat pasta<br> 1 Portion chicken or goat meat</td><td>1 cup of cooked beans<br> 1 plate of boiled plantain</td><td>1 cup of roasted plantain chips</td></tr>
                      <tr><td>Wednesday</td><td>3/4 cup of cereal<br>1 cup of milk<br> 1 plantain</td><td>Boiled egg<br> Tomato Sandwich</td><td>1 portion Mackerel<br> 2 roasted sweet potato</td><td>Apple<br> 1 table spoon of nut butter</td></tr>
                      <tr><td>Thursday</td><td>Moi moi<br> Oatmeal</td><td>Mixed okra soup(palm oil)<br>chicked</td><td>Indomie<br>(mixed vegies and shrimps)</td><td>Roasted Sweet potato chips</td></tr>
                      <tr><td>Friday</td><td>Vegetable omlet <br> 1 slice of bread<br> yougurt</td><td>1plate of brown rice jollof<br> mixed salad<br> chicken</td><td>Boiled plantain<br>baked beans</td><td>Mixed nut </td></tr>
                      <tr><td>Saturday</td><td>Mixed fruit salad<br> youghurt</td><td>Roaasted whole tilapia and vegetable</td><td>1 plate of rice and beans</td><td>mongo or guava</td></tr>                    <button class="btn btn-default" download>Save</button>

                    </table>
                      
                    <?php 
                  }elseif($_SESSION['bmi']<18.8) {
                      ?>
                                            <table>
                      <tr><th></th><th>Breakfast</th><th>Lunch</th><th>Supper</th><th>Snacks</th></tr>
                      <tr><td>Sunday</td><td>Scrambled egg, white toast bread and a glass of orange juice</td><td>Jolof rice , chicken, cucumber </td><td>Meat loaf and Mashed Potato</td><td>Chocolate</td></tr>
                      <tr><td>Monday</td><td>Peanut butter, Banana and Honey sandwich </td><td>Baked potato with tuna and sweet corn</td><td>Rice  and chicken</td><td>fruit yougurt</td></tr>
                      <tr><td>Tuesday</td><td>Salmon and salad pittas</td><td>Semovita/ Tuwo, stew of your choice</td><td>Beans an bread</td><td>1 cup of roasted plantain chips</td></tr>
                      <tr><td>Wednesday</td><td>Ceareal</td><td>Wheatmeal, okro, meat</td><td>Spaggetti</td><td>Apple<br> 1 table spoon of nut butter</td></tr>
                      <tr><td>Thursday</td><td>Moi moi<br> Oatmeal</td><td>Coconut Rice</td><td>Indomie<br>(mixed vegies and shrimps)</td><td>Roasted Sweet potato chips</td></tr>
                      <tr><td>Friday</td><td>Vegetable omlet <br> 1 slice of bread<br> yougurt</td><td>Pounded Yam</td><td>Boiled plantain<br>baked beans</td><td>Mixed nut </td></tr>
                      <tr><td>Saturday</td><td>Mixed fruit salad<br> youghurt</td><td> Beans Pottage</td><td>1 plate of rice and beans</td><td>mongo or guava</td></tr>                    <button class="btn btn-default">Save</button>

                    </table>
                  <?php }?>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
<    <footer class="container-fluid bg-4 text-center">
  <br>
  <p> TophTreat 2019 | &copy All Rights Reserved </p>
  <br>
  </footer>


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>

    <script src="js/main.js"></script>
</body>
</html>