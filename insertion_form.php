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
      <ul class="nav navbar " >
         
			 <?php foreach($result as $menu_item): ?>
        <li class="nav-item active"> <a class="nav-link active" href="index.php?subject='<?php echo $menu_item['item_no']; ?>' " style="color:white;" >
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
  <div class="container-fluid " >  
    <h1 style="text-align:center; color:;">Enter New Subjects into Form</h1>
     <div class="form-group">

      <form class="form-group" method="post" action="connection.php">

            <label>Enter Subject Code</label>
            <br>
            <input type="text" name="item_no" class="form-control" placeholder="Enter Subject Code" required>
            <br>
            <label>Enter Subject Class Type</label>
            <br>
            <input type="text" name="obj_class" class="form-control" placeholder="Enter Class" required>
            <br>
            <label>Enter link of subject image (if available)</label>
            <br>
            <input type="text" name="subject_image" class="form-control" placeholder="Use format: pics/image_name.(gif, jpg, png)">
            <br>
            <label>Enter Special Containment Procedures</label>
            <br>
            <textarea name="procedures" rows="8" class="form-control" required placeholder="Each Paragraph Ends with \n""></textarea>
            <br>
            <label>Enter Subject Description Details</label>
            <br>
            <textarea name="description" rows="8" class="form-control" required placeholder="Each Paragraph Ends with \n"></textarea>
            <br>
            <label>Enter Reference</label>
            <br>
            <textarea name="reference" rows="8" class="form-control" placeholder="Each Paragraph Ends with \n""></textarea>
            <br>
            <br>
            <input type="submit" class= "btn btn-success" name="submit" value="Submit">
           
      </form>
   </div>
</div>
  <footer class="footer mt-auto">
  <div class="container-fluid " style="background-color: #53b874;">
    <span class="text-white" style="text-align:center;">© 2020 Copyright: Comp.6210 Assignment 1 By Balwant Singh</span>
  </div>
</footer>

</body>
</html>