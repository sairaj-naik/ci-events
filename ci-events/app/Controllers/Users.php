<?php

namespace App\Controllers;

class Users extends \CodeIgniter\Controller
{
    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query('select * from users');
        $result = $query->getResult();
        echo '<pre>';
        print_r($result);
    }

    public function userDetailsForm()
    {
        return view('pages/userDetailsForm');
    }

    public function insertUserDetails()
    {        
        $data = [
                "name" => $this->request->getVar('name'),
                "email" => $this->request->getVar('email')
            ];
        
        print_r($data);

        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->insert($data);
    }
}