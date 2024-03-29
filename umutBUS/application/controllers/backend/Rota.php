<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rota extends CI_Controller {
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
		$data['title'] = "Destination/Terminal List";
		$data['tujuan'] = $this->db->query("SELECT * FROM tbl_varis")->result_array();
		
		$this->load->view('backend/terminal', $data);
	}
	
	public function viewrota($id=''){
		$data['title'] = "Destination/Terminal List";
		$data['rute'] = $this->db->query("SELECT * FROM tbl_varis WHERE kd_terminal = '".$id."' ")->row_array();
		
		$this->load->view('backend/view_terminal', $data);
	}
	public function tambahtujuan(){
		$kode = $this->getkod_model->get_kodtuj();
		$data = array(
			'kota_varis' => $this->input->post('tujuan'),
			'kd_terminal' => $kode,
			'terminal_varis' => $this->input->post('terminal'),
			 );
	
		$this->db->insert('tbl_varis', $data);
		$this->session->set_flashdata('message', 'swal("Rota Veri Tabanına Eklendi");');
		redirect('backend/rota');
	}
}
