<?php 
include "connection.php";
include "crud_functions.php";

$con = $db_con->conn;


if(isset($_REQUEST['id'])) {
  $id = $_GET['id'];
  $delete = new Crud($con);
  $delete->delete($id);
  $delete = $delete->result;

  if(!empty($delete)) {
    header("location: ".$_SERVER['PHP_SELF']);
    return true;
  }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
      body {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        
      }
    </style>
  </head>
  <body>
    
    <div class="row">
    <?php include "insert.php"; ?>
    <div class="col-lg-6">
      <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Category Name</th>
              <th scope="col">Category Description</th>
              <th scope="col">Category Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $read = new Crud($con);
            $read->read();
            $result = $read->result;
            $id =0;
            foreach($result as $res) {
                echo "<tr>";
                echo "<td>". ++$id. "</td>";
                echo "<td>". $res['name']. "</td>";
                echo "<td>". $res['description']. "</td>";
                if($res['status'] == 1 ){
                  echo "<td>Active</td>";
                } else {
                  echo "<td>Inactive</td>";
                }
                echo "<td><a class='btn btn-info' href='edit.php?id=".$res['id']."'>Edit</a><a class='btn btn-danger'  href=".$_SERVER['PHP_SELF'] ."?id=".$res['id'].">Delete</a></td>";
          
         

           
                echo "</tr>";

          

            }
          
             ?>

          </tbody>
        </table>
      </div>

    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>
