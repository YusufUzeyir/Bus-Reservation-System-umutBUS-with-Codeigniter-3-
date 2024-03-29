<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set('Europe/Istanbul');
	}
	public function index(){
		$data['title'] = "Home";
		$data['order'] = $this->db->query("SELECT count(kd_siparis) FROM tbl_siparis WHERE durum_siparis ='1'")->result_array();
		$data['tiket'] = $this->db->query("SELECT count(kd_bilet) FROM tbl_bilet WHERE durum_bilet = '2'")->result_array();
		$data['konfirmasi'] = $this->db->query("SELECT count(kd_onay) FROM tbl_onay ")->result_array();
		$data['bus'] = $this->db->query("SELECT count(kd_otobus) FROM tbl_otobus WHERE durum_otobus = 1 ")->result_array();
		$data['terminal'] = $this->db->query("SELECT count(kd_terminal) FROM tbl_varis")->result_array();
		$data['schedules'] = $this->db->query("SELECT count(kd_zaman) FROM tbl_zaman")->result_array();
	
		$this->load->view('backend/home', $data);
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('backend/login');
		}
	}
}

