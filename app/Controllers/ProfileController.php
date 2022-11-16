<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class ProfileController extends Controller
{
    public function index()
    {
        $session = session();
        $data['session'] = $session;
        echo "Hello : ".$session->get('name');
        echo view('profile',$data);
    }

    public function adduser()
    {
        $session = session();
        $data['session'] = $session;
        //echo "Hello : ".$session->get('name');
        echo view('adduser_view',$data);
    }

    public function storeuser()
    {
       // print_r($this->request->getVar());exit;
        helper(['form']);
       $rules = [
            'user_mobile'          => 'required|min_length[10]|max_length[15]',
            'user_email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[sg_users.user_email]',
            'user_password'      => 'required|min_length[4]|max_length[50]',
            'cpassword'  => 'matches[user_password]'
        ];
          
        if($this->validate($rules)){ 
            $userModel = new UserModel();
            $data = [
                'user_mobile'     => $this->request->getVar('user_mobile'),
                'user_email'    => $this->request->getVar('user_email'),
                'user_password' => password_hash($this->request->getVar('user_password'), PASSWORD_DEFAULT),
                'user_fname' =>$this->request->getVar('user_fname'),
                'user_lname' =>$this->request->getVar('user_lname'),
                'user_gender' =>$this->request->getVar('user_gender'),
                'user_dob' =>$this->request->getVar('user_dob'),
                'user_level' =>$this->request->getVar('user_level'),
                'user_create' =>date('Y-m-d H:i:s'),
                'user_status' =>0
            ];

            $userModel->adduser($data);
            return redirect()->to('/adduser');
        }else{
            $data['validation'] = $this->validator;
            echo view('adduser_view', $data);
        }
    }
}