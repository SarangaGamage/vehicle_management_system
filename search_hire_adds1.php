

<?php session_start();?>

<?php 
 include ("./inc/config.php");
?>
<?php 
$brand = $_GET['brand'];
$model = $_GET['model'];
?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hire</title>

    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/publishAdd.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
   
    <script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/publishAddSection.js"></script>

</head>
<body>



<?php
include  'header1.php'
?>

          








<div class="container ">
		
 		<!--Publish add section starts -->
	<div  class="tabPanel">

  <?php
  if(isset($_POST['search']))
  {
    $brand=$_POST['search_Brand'];
    $model=$_POST['search_Model'];
    header("location:search_hire_adds1.php?brand=$brand&model=$model");
  }
  ?>

<form method="post">


  <div class="input-group">

  <input type="text" class="form-control" name="search_Brand" placeholder="Search By Brand"  >
  <input type="text" class="form-control" name="search_Model"  placeholder="Search By Model" >
  <span class="input-group-btn">
  <input type="submit" class="form-control btn-info"  value="Search" name="search">
  </span>
  </div>

</form>



      <?php



               
                $search_Brand = $brand;
                $search_Model =$model;

              

                  $sql = "SELECT * FROM hire  where  ";
                  
                  if($search_Brand !="") {
                    $sql .= "  vehicle_brand  Like '{$search_Brand}%'";
                  }
                  else if($search_Model !="") {
                    $sql .= "  vehicle_model  Like '{$search_Model}%'";
                  }



                  $result =$conn ->query($sql);

                  if($result->num_rows > 0){
                  while ($row =$result ->fetch_assoc())
                  {

     ?>

<div class="card mb-3 border-primary " style="width: 480px; height: 300px;   float:left; margin-left:20px; margin-right:50px; margin-top:40px; background:#bfdfc2;  border-style: solid;  ">
<div class="card-header" style="background:#ffffff;">
                              <h5 class="p-3 mb-2 bg-primary text-white" style="font-weight: bold;"><?php echo $row["vehicle_brand"]  ." ". $row["vehicle_model"] ." ".$row["vehicle_number"];?> </h5><h6 class="border border-danger" style="text-align: center;">For Hire</h6>
                              </div>
                                <div class="row no-gutters">
                                  <div class="col-md-4">
                                    <img src="./<?php echo $row["img_path"];?>" class="card-img" alt="..." >
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body">
                                    
                                      
                                      <p>RS. <?php echo $row["price"];?>  per Day</p>
                                      <p>Location:  <?php echo $row["area"] ?> </p>
                                  
                                    </div>
                                  </div>
                                </div>

                                <div class="card-footer bg-transparent border-primary">    
                                <a href="hire_view_description1.php?hire_id=<?php echo $row['hire_id'];?>"><input type="submit" name="sumbit_hire" value="View Description" class="btn btn-primary"></a>
                                </div>
                              </div>






 
<?php
                  }
                }else{
                  echo "0 Result";
                }
                




       
      
      
      
      
      ?>










 
	
	
	
	</div>
	<!--publish add section End-->
	
	
</div>


</body>
</html>




<?php mysqli_close($conn); ?>




