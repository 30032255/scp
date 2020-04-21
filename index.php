<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>SCP - Subject Files</title>
  </head>
<body>
<?php include "connection.php"; ?>
<nav class="navbar navbar-inverse" style="background-color: #53b874;">
  <div class="container-fluid" >
    
     <div class="navbar-header" id="myNavbar">
      <ul class="nav navbar" >
          
			 <?php foreach($result as $menu_item): ?>
        <li class="nav-item active"> <a class="nav-link active" href="index.php?subject='<?php echo $menu_item['item_no']; ?>' " style="color:white;">
                    <?php echo $menu_item['item_no']; ?>
                    </a></li>
				 <?php endforeach; ?>
         <li class="nav-item active">
                    <a class="nav-link" href="insertion_form.php" style="color:white;">
                    ENTER NEW SUBJECT
                    </a>
                </li>
        
      </ul>
      
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center" >    
  <div class="row content">
    
    <div class="col-sm-12 text-left"> 
	
	<?php

                  if(isset($_GET['subject']))
                  {
                    //remove single quotes from subject get value
                    $item_number= trim($_GET['subject'], "'");

                    //run sql command to select record based on get value
                    $record= $connection->query("select * from subject where item_no='$item_number'") or die($connection->error());

                    //covert $record into an array for us to echo out on screen
                    $row = $record->fetch_assoc();

                    // create variables that hold data from db fields
                    $item_number = $row['item_no'];
                    $obj_class = $row['obj_class'];
                    $subject_image = $row['subject_image'];
                    $procedures = $row['specialprocedures'];
                    $description = $row['description'];
                    $reference = $row['reference'];

                    // strip out \n and replace with linebreaks
                    $procedures = str_replace('\n', '<br><br>', $procedures);
                    $description = str_replace('\n', '<br><br>', $description);
                    $reference = str_replace('\n', '<br><br>', $reference);
                    
                    
                    if (!empty($item_number)) { ?> <h3>Item_#: <?php echo  $item_number;   ?></h3>  <?php }

                    if (!empty($obj_class)) { ?> <h3>Object Class: <?php echo $obj_class;  ?></h3>  <?php } 
                    
                     if (!empty($subject_image))  { ?><p><img src="<?php echo $subject_image; ?>"></p>  <?php }  

                    if (!empty($procedures))  { ?> <h3>Special Containment Procedures</h3>      <p><?php echo $procedures; ?></p>  <?php }  

                    if (!empty($description)) { ?>  <h3>Description</h3> <p> <?php echo $description; ?></p>  <?php } 
                    
                   
                    if (!empty($reference)) { ?>  <h3>Reference</h3> <p> <?php echo $reference; ?></p>  <?php } 
                      
                  } 
                    
                    else
                  {

                    echo "
                  <h1 style='text-align:center;'>SCP Web Application</h1>
                 
                  <p align='center'>Click on above links to know more </p>
				  
					<p align='center'><img src='pics/scp.jpg' align='middle'></p>
                    
                    ";

                  }
                    
                    ?>
	
      
      
    </div>
    
  </div>
</div>
<footer class="footer mt-auto">
  <div class="container-fluid " style="background-color: #53b874;">
    <span class="text-white" style="text-align:center;">© 2020 Copyright: Comp.6210 Assignment 1 By Balwant Singh</span>
  </div>
</footer>
 

</body>
</html>