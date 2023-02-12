<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Super_admin extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('super_admin_model');
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == NULL) {
            redirect('dashboard');
        }
    }

//    ........................................
//    Dashboard
//    ........................................
//
//show all design in dashboard page admin_master file
    public function index() {
        $data = array();
        $data['admin_main_conten'] = $this->load->view('admin/pages/dashboard', '', true);
        $this->load->view('admin/admin_master', $data);
    }

//..........................................
//    Category
//..........................................
//
//    Add category in dashboard page add_category file
    public function add_category() {
        $data = array();
        $data['admin_main_conten'] = $this->load->view('admin/pages/add_category', '', true);
        $this->load->view('admin/admin_master', $data);
    }

//    after save redirect category in dashboard page add_category file
    public function save_category() {
        $this->super_admin_model->save_category_info();
        $sdata = array();
        $sdata['message'] = "Save category info successfully";
        $this->session->set_userdata($sdata);
        redirect('add-category');
    }

//show category data in dashboard page manage_category file
    public function manage_category() {
        $data = array();
        $data['all_category_info'] = $this->super_admin_model->all_category_info();
        $data['admin_main_conten'] = $this->load->view('admin/pages/manage_category', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

// in dashboard page manage_category file
    public function unpublish_category($category_id) {
//        echo $category_id;
        $this->super_admin_model->unpublish_category_info($category_id);
        redirect('manage-category');
    }

// in dashboard page manage_category file
    public function publish_category($category_id) {
//        echo $category_id;
        $this->super_admin_model->publish_category_info($category_id);
        redirect('manage-category');
    }

//    delete category in dashboard page manage_category file
    public function delete_category($category_id) {
//        echo $category_id;
        $this->super_admin_model->delete_category_info($category_id);
        redirect('manage-category');
    }

//    edit category in dashboard page manage_category file
    public function edit_category($category_id) {
        //        get & show data
        $data = array();
        $data['category_info'] = $this->super_admin_model->select_category_by_id($category_id);

//        echo $category_id;
//        exit();
        //    view category in dashboard page edit_category file
        $data['admin_main_conten'] = $this->load->view('admin/pages/edit_category', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

//..........................................
//    Manufacture
//..........................................
//
    //    Add manufacture in dashboard page add_manufacture file
    public function add_manufacture() {
        $data = array();
        $data['admin_main_conten'] = $this->load->view('admin/pages/add_manufacture', '', true);
        $this->load->view('admin/admin_master', $data);
    }

//    after save redirect category in dashboard pageadd_manufacture file
    public function save_manufacture() {
        $this->super_admin_model->save_manufacture_info();
        $sdata = array();
        $sdata['message'] = "Save manufacture info successfully";
        $this->session->set_userdata($sdata);
        redirect('add-manufacture');
    }

//show manufacture data in dashboard page manage_manufacture file

    public function manage_manufacture() {
        $data = array();
        $data['all_manufacture_info'] = $this->super_admin_model->all_manufacture_info();
        $data['admin_main_conten'] = $this->load->view('admin/pages/manage_manufacture', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

// in dashboard page manage_manufacture file
    public function unpublish_manufacture($manufacture_id) {
//        echo $category_id;
        $this->super_admin_model->unpublish_manufacture_info($manufacture_id);
        redirect('manage-manufacture');
    }

// in dashboard page manage_manufacture file
    public function publish_manufacture($manufacture_id) {
//        echo $category_id;
        $this->super_admin_model->publish_manufacture_info($manufacture_id);
        redirect('manage-manufacture');
    }

//    delete manufacture in dashboard page manage_manufacture file
    public function delete_manufacture($manufacture_id) {
//        echo $category_id;
        $this->super_admin_model->delete_manufacture_info($manufacture_id);
        redirect('manage-manufacture');
    }

//    ........................................
//    Dashboard
//    ........................................
//
// in dashboard page admin_master file
    public function logout() {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_name');
        $sdata = array();
        $sdata['message'] = "logout successfully";
        $this->session->set_userdata($sdata);
        redirect('abcd');
    }

}
