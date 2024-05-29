<?php 

    class c_landing extends CI_Controller
    {
        public function index()
        {
            $this->load->view('t_landing/header.php');
            $this->load->view('v_front/landing.php');
            $this->load->view('t_landing/footer.php');
        }
    }
    

; ?>
