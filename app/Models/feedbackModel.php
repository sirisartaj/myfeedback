<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class feedbackModel extends Model{
    protected $table = 'feedback';
    
    protected $allowedFields = [
        'user_id',
        'fid',
        'ansoption',
        'status',
        'created_at'
    ];


    public function fetchallquestions($uid='')
    {     
        return $this->where('user_id',$uid)->orderBy('fid','DESC')->findAll();
    } 

}