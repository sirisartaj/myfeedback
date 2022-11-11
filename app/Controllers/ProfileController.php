<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
  
class ProfileController extends Controller
{
    public function index()
    {
        $session = session();
        $data['session'] = $session;
        echo "Hello : ".$session->get('name');
        echo view('profile',$data);
    }
}