<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class c_landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_artikel');
    }

    // Fungsi untuk menampilkan artikel di landing page
    public function index()
    {
        $data['artikel'] = $this->m_artikel->get_all_articles();
        $this->load->view('t_landing/header.php');
        $this->load->view('v_front/landing.php', $data);
        $this->load->view('t_landing/footer.php');
    }
}
?>
