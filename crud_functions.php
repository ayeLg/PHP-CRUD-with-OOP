<?php 

Class Crud {

  public $result;
  private $con;

  public function __construct($con){
    $this->con = $con;
  }
  public function read() {
    $query  = "select * from categories";
    $stm = $this->con->prepare($query);
    $stm->execute();
    $this->result = $stm->fetchAll();

  }

  public function insert($name, $description,$status){
    $query = "insert into categories (name,description,status) values (:name,:description,:status)";
    $stm = $this->con->prepare($query);
    $this->result = $stm->execute([":name" => $name,":description"=> $description, ":status" => $status ]);
  }

  public function detail($id) {
    $query  = "select * from categories where id = :id";
    $stm = $this->con->prepare($query);
    $stm->bindParam(':id', $id);
    $stm->execute();
    $this->result = $stm->fetch(PDO::FETCH_OBJ);
  }

  public function update($name,$description,$id) {
   
    $query = "update categories set name = :name, description = :description
    WHERE id = :id";

    $stm = $this->con->prepare($query);
    $stm->bindParam(':name', $name);
    $stm->bindParam(':description', $description);
    $stm->bindParam(':id', $id);
    $this->result = $stm->execute();
    
  }

  public function delete($id) {
 
    $query  = "delete FROM categories WHERE id= :id";
    $stm = $this->con->prepare($query);
    $stm->bindParam(':id', $id);
    $this->result = $stm->execute();
  
  }
}


