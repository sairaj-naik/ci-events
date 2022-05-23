<?php

namespace App\Controllers;

class Events extends \CodeIgniter\Controller
{
    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query('select * from events');
        $result = $query->getResult();
        echo '<pre>';
        print_r($result);
    }

    public function eventsDetailsForm()
    {
        return view('pages/eventsDetailsForm');
    }

    public function insertUserDetails()
    {        
        $data = [
                "name" => $this->request->getVar('name'),
                "email" => $this->request->getVar('email')
            ];
        
        print_r($data);

        $db = \Config\Database::connect();
        $builder = $db->table('events');
        $builder->insert($data);
    }
}