<?php
namespace App\Domain\Roles;
use PDO;
/**
* Repository.
*/
class RolesRepository
{
  /**
   * @var PDO The database connection
   */
  private $connection;
  /**
   * Constructor.
   *
   * @param PDO $connection The database connection
   */
  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }
  /**
   * Get Admin Roles rows.
   *
   * @return array 
   */
  public function getRoles(): array
  {      
    try {
      $sql = "SELECT role_id , role_name,status,created_date,created_by,modified_date,modified_by FROM  sg_roles";
      $stmt = $this->connection->prepare($sql);  
      $stmt->execute();
      $Roles = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($Roles)){
       $status = array(
         'status' =>ERR_OK,
         'message' =>"Success",
         'Roles' => $Roles);
         return $status;
      }else{
        $status = array('status'=>ERR_NO_DATA,
         'message'=>"No Data Found");
         return $status;
      }
    } catch(PDOException $e) {
      $status = array(
              'status' => "500",
              'message' => $e->getMessage()
          );
      return $status;
    }
  }
  public function getRole($data) {
    try {
     // print_r($data);exit;
      extract($data);
      $sql = "SELECT role_id , role_name,status,created_date,created_by,modified_date,modified_by FROM ".DBPREFIX."_Roles WHERE role_id=:Role_id";
      $stmt = $this->connection->prepare($sql);  
      $stmt->bindParam(":Role_id", $roleId); 
      $stmt->execute();
      $Roledetails = $stmt->fetch(PDO::FETCH_OBJ);
      if(!empty($Roledetails)){
        $status = array(
                  'status' => ERR_OK,
                  'message' => "Success",
                  'Role' => $Roledetails);
        return $status;
      }else{
        $status = array('status'=>ERR_NO_DATA,
         'message'=>"No Data Found");
        return $status;
      }
    } catch(PDOException $e) {
      $status = array(
              'status' => "500",
              'message' => $e->getMessage()
          );
      return $status;
    }
  }
  public function deleteRole($data) {    
    try {
      $sql = "DELETE FROM ".DBPREFIX."Roles WHERE role_id = :Role_id";
      $stmt = $this->connection->prepare($sql);  
      $stmt->bindParam(":Role_id",$RoleId);
      $res = $stmt->execute();
      if($res == 'true'){
        $status = array(
          "status" => ERR_OK,
          "message" => "Deleted Successfully");
        return $status;
      }else{
        $status = array(
          "status" => ERR_NOT_MODIFIED,
          "message" => "Not Deleted Successfully");
        return $status;
      }
    } catch(PDOException $e) {
      $status = array(
              'status' => "500",
              'message' => $e->getMessage()
          );
      return $status;
    } 
  }
  public function addRole($data) {
    try {      
      extract($data);
      $sql = "INSERT INTO ".DBPREFIX."_Roles SET role_name=:role_name,status = :status, created_by = :created_by,created_date= :created_date";
      $stmt = $this->connection->prepare($sql);  
      
      $stmt->bindParam(":role_name", $role_name); 
      $stmt->bindParam(":status", $status);       
      $stmt->bindParam(':created_date',$created_date);
      $stmt->bindParam(':created_by',$created_by);
      $res = $stmt->execute();
      $Role_id = $this->connection->lastInsertId();
      if($Role_id != ''  && $Role_id != '0'){
        $status = array(
          "status" => ERR_OK,
          "message" => "Added Successfully");
        return $status;
      }else{
        //print_r($res);
        $status = array(
          "status" => ERR_NOT_MODIFIED,
          "message" => "Not Added Successfully");
        return $status;
      }
    } catch(PDOException $e) {
      $status = array(
              'status' => "500",
              'message' => $e->getMessage()
          );
      return $status;
    } 
  }
  public function updateRole($data) 
  {
    try {
     // print_r($data);exit;
      extract($data);

      
      $sql  = "UPDATE ".DBPREFIX."_Roles SET role_name=:role_name,status = :status ,modified_date = :modified_date, modified_by = :modified_by WHERE role_id = :Role_id";   
      $stmt = $this->connection->prepare($sql);
      
      $stmt->bindParam(":Role_id", $role_id); 
      $stmt->bindParam(":role_name", $role_name); 
      $stmt->bindParam(":status", $status);
      $stmt->bindParam(":modified_date", $modified_date);
      $stmt->bindParam(":modified_by", $modified_by);
      //print_r($sql);exit;
      $res = $stmt->execute();
     /* echo " ---------Role_id : ".$Role_id;
      echo ",Role_fname : ".$Role_fname;
      echo ",Role_lname : ".$Role_lname;
      echo ",Role_gender : ".$Role_gender;
      echo ",Role_mobile : ".$Role_mobile;
      echo ",Role_email : ".$Role_email;
      echo ",Role_dob : ".$Role_dob;
      echo ",Role_level : ".$Role_level;
      echo ",Role_status : ".$Role_status;
      echo ",modified_date : ".$modified_date;
      echo ",modified_by : ".$modified_by;*/
      //print_r($this->connection->mysql_error());exit;
      if($res){
        //print_r($res);exit;
        $status = array(
          "status" => ERR_OK,
          "message" => "Updated Successfully");
        return $status;
      }else{
        $status = array(
          "status" => ERR_NOT_MODIFIED,
          "message" => "Not Updated Successfully");
        return $status;
      }
    } catch(PDOException $e) {
      $status = array(
              'status' => "500",
              'message' => $e->getMessage()
          );
      return $status;
    } 
  }
  public function updateRoleStatus($data) {    
    try {
      extract($data);
      $sql = "UPDATE sg_Roledetails SET status=:status, modified_by=:modified_by WHERE Role_id = :Role_id";
      $stmt = $this->connection->prepare($sql);  
      $stmt->bindParam(":Role_id",$RoleId);
      $stmt->bindParam(":status", $status);
      $stmt->bindParam(":modified_by",$RoleBy);
      $res = $stmt->execute();
      if($res == 'true'){
        $status = array(
          "status" => ERR_OK,
          "message" => "Updated Successfully");
        return $status;
      }else{
        $status = array(
          "status" => ERR_NOT_MODIFIED,
          "message" => "Not Updated Successfully");
        return $status;
      }
    } catch(PDOException $e) {
      $status = array(
              'status' => "500",
              'message' => $e->getMessage()
          );
      return $status;
    } 
  }

}