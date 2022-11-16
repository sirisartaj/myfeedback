<?php
namespace App\Domain\Users;
use PDO;
/**
* Repository.
*/
class UsersRepository
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
  public function getUsers(): array
  {      
    try {
      $sql = "SELECT user_id , user_mobile,user_email,user_fname,user_lname,user_gender,user_dob,user_level,user_avatar,user_create,lastlogin,user_status,modified_date, created_by AS createdBy, modified_by AS modifiedBy FROM  sg_users";
      $stmt = $this->connection->prepare($sql);  
      $stmt->execute();
      $users = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($users)){
       $status = array(
         'status' =>ERR_OK,
         'message' =>"Success",
         'users' => $users);
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
  public function getuser($data) {
    try {
      extract($data);
      $sql = "SELECT user_id , user_mobile,user_email,user_fname,user_lname,user_gender,user_dob,user_level,user_avatar,user_create,lastlogin,user_status,modified_date, created_by AS createdBy, modified_by AS modifiedBy FROM ".DBPREFIX."users WHERE user_id=:user_id";
      $stmt = $this->connection->prepare($sql);  
      $stmt->bindParam(":user_id", $userId); 
      $stmt->execute();
      $userdetails = $stmt->fetch(PDO::FETCH_OBJ);
      if(!empty($userdetails)){
        $status = array(
                  'status' => ERR_OK,
                  'message' => "Success",
                  'user' => $userdetails);
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
  public function deleteuser($data) {    
    try {
      $sql = "DELETE FROM ".DBPREFIX."users WHERE user_id = :user_id";
      $stmt = $this->connection->prepare($sql);  
      $stmt->bindParam(":user_id",$userId);
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
  public function adduser($data) {
    try {
      
      extract($data);
      $sql = "INSERT INTO ".DBPREFIX."users SET user_fname=:user_fname, user_lname=:user_lname ,user_gender=:user_gender,user_mobile=:user_mobile,user_email=:user_email,user_password=:user_password,temp_password=:temp_password,user_dob=:user_dob,user_level=:user_level, user_avatar = :user_avatar,user_create=:user_create,lastlogin=:lastlogin, user_status = :user_status , created_by = :created_by";
      $stmt = $this->connection->prepare($sql);  
      $created_date = date("Y-m-d H:i:s");
      $stmt->bindParam(":user_fname", $user_fname); 
      $stmt->bindParam(":user_lname", $user_lname); 
      $stmt->bindParam(":user_avatar", $user_avatar);
      $stmt->bindParam(":user_gender", $user_gender);
      $stmt->bindParam(":user_mobile", $user_mobile);
      $stmt->bindParam(":user_email", $user_email);
      $stmt->bindParam(":user_password", $user_password);
      $stmt->bindParam(":temp_password", $temp_password);
      $stmt->bindParam(":user_dob", $user_dob);
      $stmt->bindParam(":user_level", $user_level);
      $stmt->bindParam(":lastlogin", $lastlogin);
      $stmt->bindParam(":user_status", $user_status);
      $stmt->bindParam(':user_create',$created_date);
      $stmt->bindParam(':created_by',$created_by);
      $res = $stmt->execute();
      $user_id = $this->connection->lastInsertId();
      if($user_id != ''  && $user_id != '0'){
        $status = array(
          "status" => ERR_OK,
          "message" => "Added Successfully");
        return $status;
      }else{
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
  public function updateUser($data) 
  {
    try {
      $sql  = "UPDATE ".DBPREFIX."_bannerdetails SET banner_title=:banner_title, banner_image=:banner_image, target_url=:target_url , status = :status ,updated_date = :updated_date, modified_by = :modified_by WHERE banner_id = :banner_id";   
      $stmt = $this->connection->prepare($sql);
      $modified_date = date("Y-m-d H:i:s");  
      $stmt->bindParam(":banner_title", $bannerTitle); 
      $stmt->bindParam(":banner_image", $bannerImage);
      $stmt->bindParam(":target_url", $targetUrl);
      $stmt->bindParam(":status", $status);
      $stmt->bindParam(":updated_date",$modified_date);
      $stmt->bindParam(":modified_by",$userBy);
      $stmt->bindParam(":banner_id", $bannerId);
      $res = $stmt->execute();
      if($res){
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
  public function updateUserStatus($data) {    
    try {
      $sql = "UPDATE sg_bannerdetails SET status=:status, modified_by=:modified_by WHERE banner_id = :banner_id";
      $stmt = $this->connection->prepare($sql);  
      $stmt->bindParam(":banner_id",$bannerId);
      $stmt->bindParam(":status", $status);
      $stmt->bindParam(":modified_by",$userBy);
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