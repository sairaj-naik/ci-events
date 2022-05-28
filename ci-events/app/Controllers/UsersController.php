<?php

namespace App\Controllers;

class UsersController extends \CodeIgniter\Controller
{
    protected $db;
    public $request;

    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query('select * from users');
        $result = $query->getResult();
        echo json_encode($result);
    }

    //user details CRUD
    public function getAllUsers()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('users');
        $result = $builder->get()->getResult();

        echo json_encode($result);
    }

    public function insertUserDetails()
    {   
        $this->request = \Config\Services::request();
        $data = [
                "name" => $this->request->getVar('name'),
                "email" => $this->request->getVar('email')
            ];

        
        // $data = [
        //     "name" => "test",
        //     "email" => "testing@test.com",
        //     "type_id" => "0"
        // ];
        
        print_r($data);

        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->insert($data);
        echo "records inserted";
    }

    public function updateUser()
    {
        $this->request = \Config\Services::request();
        
        $data = [
            "name" => $this->request->getVar('name'),
            "email" => $this->request->getVar('email')
        ];
        
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('users');
        $builder->set($data);
        $builder->where('uid', $this->request->getVar('id'));
        $builder->update();
    }

    public function deleteUser()
    {
        $this->request = \Config\Services::request();
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('users');
        $builder->where('uid', $this->request->getVar('id'));
        $builder->delete();
    }

    //user type CRUD
    public function insertUserType()
    {        
        $data = [
            "type" => $this->request->getVar('type')
        ];
        
        print_r($data);

        $db = \Config\Database::connect();
        $builder = $db->table('usertype');
        $builder->insert($data);
    }

    public function updateUserType()
    {
        $data = [
            "type" => $this->request->getVar('type')
        ];
        
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('usertype');
        
        $builder->set($data);
        $builder->where('type_id', $this->request->getVar('id'));
        $builder->update();
    }

    public function deleteUserType()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('usertype');
        $builder->where('type_id', 4);
        $builder->delete();
    }

    public function UpdateUserDetails()
    {
        //echo view('templates/header');
        echo view('AdminPages/UpdateUserDetailsForm');
        
    }

    public function insertUserDetail()
    {
        echo view('AdminPages/inserUserDetailsForm');
    }

    public function UsersList()
    {
        echo view('AdminPages/getAllUsers');
    }
    
}