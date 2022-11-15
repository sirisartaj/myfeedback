<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        helper('url');
        $data = array('bannerId'=>'1');
        $url = baseURL1.'/banners/getbanners';//exit;
       $a = $this->CallAPI('get',$url,$data);
       print_r($a);exit;
        return view('welcome_message');
    }
}
