<?php

namespace App\Controllers;

class EventsController extends \CodeIgniter\Controller
{
    public function index()
    {
        helper('url');
        // $db = \Config\Database::connect();
        // $query = $db->query('select * from events');
        // $result = $query->getResult();
        // echo '<pre>';
        // print_r($result);

        echo view('Pages/HomePage');
    }

    public function eventsDetailsForm()
    {
        return view('pages/eventsDetailsForm');
    }

    public function getAllHomepageEvents()
    {
        //get all events
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('events');
        $allresult = $builder->get()->getResult();

        //banner code
        $builder1 = $this->db->table('events');
        $builder1->limit(5);
        $bannerresult = $builder1->get()->getResult();

        $results = array([
            'banner' => $bannerresult,
            'allresult' => $allresult
        ]);

        // echo "<pre>";
        // print_r($results);

        echo json_encode($results);
    }

    public function insertEventDetails()
    {        
        $data = [
            "event_name" => $this->request->getVar('name'),
            "event_details" => $this->request->getVar('email'),
            "event_date" => $this->request->getVar('date'),
            "number_of_participants" => $this->request->getVar('nop'),
            "price" => $this->request->getVar('price'),
            "image_url" => $this->request->getVar('image')
            ];
        
        //print_r($data);

        $db = \Config\Database::connect();
        $builder = $db->table('events');
        $builder->insert($data);
    }

    public function updateEvent()
    {
        $data = [
            "event_name" => $this->request->getVar('name'),
            "event_details" => $this->request->getVar('email'),
            "event_date" => $this->request->getVar('date'),
            "number_of_participants" => $this->request->getVar('nop'),
            "price" => $this->request->getVar('price'),
            "image_url" => $this->request->getVar('image')
        ];
        
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('events');
        
        $builder->set($data);
        $builder->where('event_id', $this->request->getVar('id'));
        $builder->update();
    }

    public function deleteEvent()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('events');
        $builder->where('event_id', $this->request->getVar('id'));
        $builder->delete();
    }

    public function getAllEvent()
    {
        //get all events
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('events');
        $result = $builder->get()->getResult();

        echo json_encode($result);
    }

    public function EventsList()
    {
        echo view('AdminPages/getAllEvents');
    }
}