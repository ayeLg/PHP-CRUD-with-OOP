<?php 
include "connection.php";
include "crud_functions.php";
$con = $db_con->conn;

if(isset($_REQUEST['id'])) {
  global $id;
  $id = $_REQUEST['id'];
  $detail = new Crud($con);
  $detail->detail($id);
  $edit = $detail->result;
 
}
if(isset($_REQUEST['submit'])) {
  
 $id = $_POST['id'];

 
  $name = $_POST['name'];
  $description = $_POST['des'];
  $status = $_POST['status'];
  $update = new Crud($con);
  $update->update($name,$description,$status,$id);
  $result = $update->result;
  if(!empty($result)) {
    header("location: index.php");
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

<div class="container" >
<form  action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
      <input type="hidden" name="id" value="<?= $edit->id; ?>" />
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Category Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Category Name" name="name" value="<?= $edit->name ?? ""; ?>" >
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Category Description</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="des"><?= $edit->description ?? ''; ?></textarea>
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Select Category status</label>
      <select class="form-control" id="exampleFormControlSelect1" name="status">
      <option>Category status</option>
        <option value="1" <?php echo $edit->status === 1 ? "selected" : ""; ?>>Active</option>
        <option value="0" <?php echo $edit->status === 0 ? "selected" : ""; ?>>Inactive</option>
        
      </select>
    </div>
    <button type="submit" class="btn btn-success" name="submit">Update</button>
  </form>

</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>
