<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Super_admin extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id !== NULL) {
            redirect('dashboard');
        }
    }

    public function index() {
        $data = array();
        $data['admin_main_conten'] = $this->load->view('admin/pages/dashboard', '', true);
        $this->load->view('admin/admin_master', $data);
    }

    public function add_catergory() {
        $data = array();
        $data['admin_main_conten'] = $this->load->view('admin/pages/add_catergory', '', true);
        $this->load->view('admin/admin_master', $data);
    }

    public function logout() {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_name');
        $sdata = array();
        $sdata['message'] = "logout successfully";
        $this->session->set_userdata($sdata);
        redirect('abcd');
    }

}
