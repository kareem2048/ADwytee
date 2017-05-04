<?php
/**
 *
 */
class Order_Query
{
  private $file_name ='DataBase.php';
  private $database;
  private $file_name2= 'credential.php';
  function __construct()
  {
    try {
   include_once $this->file_name ;
     } catch (Exception $e) {
     echo "error in file name";
   }

     $this->database = DataBase :: getInstance($this->file_name2);
}
   public function fetch_order($id)
  {
    # code...
    $query = "SELECT `Id`, `PharmacyId`, `status` FROM `ORDER` WHERE `UserId` = $id  and status != 3 ";
    return ($this->database->fetch_query($query));
    }
    public function fetch_order_pharmacy($id)
   {
     # code...
     $query = "SELECT `Id`, `UserId`, `status` FROM `ORDER` WHERE `PharmacyId` = $id  and status != 3  ";
     return ($this->database->fetch_query($query));
     }
    public function fetch_pharmacy_name($id){
        $query = "SELECT `Name` FROM `PHARMACY` WHERE `UserId` = $id ";
        return ($this->database->fetch_query($query));
    }
    public function fetch_user_name($id){
        $query = "SELECT `FName`, `LName` FROM `PATIENT` WHERE `UserId` = $id ";
        return ($this->database->fetch_query($query));
    }
    public function fetch_all_pharmacy(){
        $query = "SELECT `Name` FROM `PHARMACY`";
        return ($this->database->fetch_query($query));
    }
    public function deleteOrder($id)
    {
      $query1 = "SELECT `status` FROM `ORDER` WHERE `Id` = $id";
      $status = $this->database->fetch_query($query1);

      if(isset($status)){

        if($status[0]['status'] == 1){

          $query ="DELETE FROM `ORDER` WHERE `id`=$id";

         $this->database->database_query($query);

          return True;
        }

      }
       return False;
    }
    public function end_order($id)
    {
      $query1 = "SELECT `status` FROM `ORDER` WHERE `Id` = $id ";
      $status = $this->database->fetch_query($query1);

      if(isset($status)){

        if($status[0]['status'] == 2){

          $query ="UPDATE `ORDER` SET `status`=3 WHERE `Id` = $id ";

         $this->database->database_query($query);

          return True;
        }

      }
       return False;
    }
    public function accept_order($id)
    {
      $query1 = "SELECT `status` FROM `ORDER` WHERE `Id` = $id ";
      $status = $this->database->fetch_query($query1);

      if(isset($status)){

        if($status[0]['status'] == 1){

          $query ="UPDATE `ORDER` SET `status`=2 WHERE `Id` = $id ";

         $this->database->database_query($query);

          return True;
        }

      }
       return False;
    }

  public function fetch_order_details($id)
  {
    $query1 = "SELECT `PharmacyId`, `date`, `status` FROM `ORDER` WHERE `Id` = $id and status != 3 ";

    return ($this->database->fetch_query($query1));

  }
  public function fetch_order_pharmacy_details($id)
  {
    $query1 = "SELECT `UserId`, `date`, `status` FROM `ORDER` WHERE `Id` = $id and status != 3";

    return ($this->database->fetch_query($query1));

  }
  public function get_Status($id)
  {
    $query1 = "SELECT `Status` FROM `ORDER_STATUS` WHERE `Id` =$id";
    return ($this->database->fetch_query($query1));
  }
  public function get_medicine_order($id)
  {
  $query1 = " SELECT `MedicineCode`, `Amount` FROM `MEDICINE_ORDER` WHERE `OrderId` =$id ";
  return ($this->database->fetch_query($query1));
  }
  public function get_medicine_name($id)
  {
  $query1 = " SELECT `EnName` FROM `MEDICINE` WHERE `Code` =$id ";
  return ($this->database->fetch_query($query1));
  }
}

 ?>
