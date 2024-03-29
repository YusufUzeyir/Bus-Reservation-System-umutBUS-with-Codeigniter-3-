<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Onay extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set('Europe/Istanbul');
	}

	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('backend/login');
		}
	}


	public function index(){
		$data['title'] = "Confirmation List";
		$data['konfirmasi'] = $this->db->query("SELECT * FROM tbl_onay group by kd_onay")->result_array();
		$this->load->view('backend/onay', $data);	
	}

	public function viewonay($id=''){
	 $sqlcek = $this->db->query("SELECT * FROM tbl_onay WHERE kd_siparis ='".$id."'")->result_array();
	 $data['title'] = "View Confirmation";
	 if ($sqlcek == NULL) {
	 	$this->session->set_flashdata('message', 'swal("Empty", "Payments info not received yet!", "error");');
		redirect('backend/order/vieworder/'.$id);
	 }else{		
		$data['konfirmasi'] = $sqlcek;
	 	$this->load->view('backend/view_onay',$data);
		}
	}
	
}
