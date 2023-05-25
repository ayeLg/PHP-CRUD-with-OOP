
<?php

if(isset($_REQUEST['submit'])) {

  if($_POST['name'] !== ""  && $_POST["des"] !== ""){
    $name = $_POST['name'];
    $description = $_POST["des"];
    $status = 1;
    try{
        $insert = new Crud($con);
      $insert->insert($name,$description,$status);
      $result = $insert->result;

      if(!empty($result)) {
        header("location: ".$_SERVER['PHP_SELF']);
        return true;
      }
    }
    
    
    catch (Exception $ex) {

    }
  }
  else {
    echo "Need to fill all input";
  }
}

?>

<div class="col-lg-6" >
<form  action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Category Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Category Name" name="name">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Category Description</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="des"></textarea>
    </div>
    <button type="submit" class="btn btn-success" name="submit">Submit</button>
  </form>

</div>
