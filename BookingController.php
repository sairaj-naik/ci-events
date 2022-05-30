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
                "email " => $this->request->getVar('email'),
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
            "email " => $this->request->getVar('email')
        ];
        
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('booking');
        
        $builder->set($data);
        $builder->where('booking_id', $this->request->getVar('id'));
        $builder->update();
    }

    public function updateBookingStatus()
    {
        $data = [
            "seatsApproved" => $this->request->getVar('seatsApproved'),
            "status" => $this->request->getVar('status')
        ];
        
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('booking');
        print_r($data);
        $builder->set($data);
        $builder->where('booking_id', $this->request->getVar('id'));
        $builder->update();

        
        sendEmail($receiver_name,$receiver_email,$booking_id,$this->request->getVar('seatsApproved'));
    }

    public function deleteBooking()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('booking');
        $builder->where('booking_id', $this->request->getVar('id'));
        $builder->delete();
    }

    public function PendingBookingList()
    {
        echo view('AdminPages/getAllPendingBookings');
    }

    public function sendEmail($receiver_name,$receiver_email,$booking_id,$status)
    {
        $to = $receiver_email;
        $from = "sairajnaik777@gmail.com";
        $recipient = $receiver_name;
        $subject = "Your Booking Id is ".$booking_id;

        $body = "Hello " . $receiver_name . ", <br/> your request has been approved, please download the reciept from below link <br />";
        $body = $body. "<br /> <a href='".$base_url()."/BookingController/generatepdf/".$booking_id."' >Event Receipt</a>";

        $email = \Config\Services::email();
        $email->setTo($to,'Booking Info');
        $email->setFrom($from);
        $email->setSubject($subject);
        $email->setMessage($body);

        if($email->send())
        {
            echo "email sent successfully";
        }
        else
        {
            $errordata = $email->printDebugger(['headers']);
            print_r($errordata);
        }
    }

    public function generatepdf()
    {
        $dompdf = new \Dompdf\Dompdf();

        $html = "inside generatepdf";
        
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $dompdf->stream('Booking Details');
    }
    
}