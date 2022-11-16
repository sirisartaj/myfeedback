<?php 
namespace App\Models;  
use CodeIgniter\Model;
use App\Controllers\Home;
  
class UserModel extends Model{
    protected $table = 'users';
    
    protected $allowedFields = [
        'name',
        'email',
        'password',
        'created_at'
    ];

    public function home(){
        //echo RESTURL;exit;
        $home = new home();
        $data = array('banner_title'=>"first banner");
        $url = baseURL1.'/banners/addbanner';//exit;

       return $home->CallAPI('POST',$url,$data);
      // print_r($controllerData);exit;
        //$this->CallAPI('POST','banners/getbanner',$data);
    }

    public function adduser($data){

         $home = new home();
       
        $url = baseURL1.'/users/adduser';//exit;

       return $home->CallAPI('POST',$url,$data);
    }
}