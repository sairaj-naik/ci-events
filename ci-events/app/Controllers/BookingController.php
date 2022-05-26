<?php

namespace App\Controllers;

class BookingController extends \CodeIgniter\Controller
{
    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query('select * from booking');
        $result = $query->getResult();
        echo '<pre>';
        print_r($result);
    }

    public function eventsDetailsForm()
    {
        return view('pages/eventsDetailsForm');
    }

    public function getAllBookings()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('booking');
        $result = $builder->get()->getResult();
        // $query = $db->query('select * from users');
        // $result = $query->getResult();
        echo json_encode($result);
    }

    public function getAllPendingBookings()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('booking');
        $builder->where('status', 'pending');
        $result = $builder->get()->getResult();
        // $query = $db->query('select * from users');
        // $result = $query->getResult();
        echo json_encode($result);
    }

    public function insertBookingDetails()
    {        
        $data = [
                "event_id" => $this->request->getVar('event_id'),
                "uid" => $this->request->getVar('uid'),
                "status" => 'pending'

            ];
        
        //print_r($data);

        $db = \Config\Database::connect();
        $builder = $db->table('booking');
        $builder->insert($data);
    }

    public function updateBooking()
    {
        $data = [
            "event_id" => $this->request->getVar('event_id'),
            "uid" => $this->request->getVar('uid')
        ];
        
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('booking');
        
        $builder->set($data);
        $builder->where('booking_id', $this->request->getVar('id'));
        $builder->update();
    }

    public function deleteBooking()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('booking');
        $builder->where('booking_id', $this->request->getVar('id'));
        $builder->delete();
    }
}