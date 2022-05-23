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
}