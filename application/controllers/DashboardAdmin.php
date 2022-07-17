<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardAdmin extends CI_Controller {
	function __construct(){
		parent::__construct();
        if($this->session->userdata('level') != 'admin'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong><br> Anda Harus Login Dulu
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('login');
        }
		$this->load->model("supplier_model");
		$this->load->model("users_model");
		$this->load->model("nilai_model");
		$this->load->model("admin_model");
		$this->load->model("bobot_model");
		
    }
	function index(){
		$data["users"] = $this->users_model->getAll();
		$data["supplier"] = $this->supplier_model->getAll();
		$data["bobot"] = $this->bobot_model->getAll();
		$data["admin"] = $this->admin_model->getAll();
		$this->load->view('dashboardadmin',$data);
	}
}
