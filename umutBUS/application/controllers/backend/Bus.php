<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bus extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->model('getkod_model');
		date_default_timezone_set('Europe/Istanbul');
	}
	public function index(){
	$data['title'] = "Bus Management";
	$data['bus'] = $this->db->query("SELECT * FROM tbl_otobus ORDER BY isim_otobus asc")->result_array();

	$this->load->view('backend/bus', $data);	
	}
	public function viewbus($id=''){
		$data['title'] = "View Bus";
		$data['bus'] = $this->db->query("SELECT * FROM tbl_otobus WHERE kd_otobus = '".$id."'")->row_array();
		$this->load->view('backend/view_bus', $data);
	}
	public function tambahbus(){
		$kode = $this->getkod_model->get_kodbus();
		$data = array(
			'kd_otobus' => $kode,
			'isim_otobus' => $this->input->post('nama_bus'),
			'plaka_otobus'		 => $this->input->post('plat_bus'),
			'kapasite_otobus'		 => $this->input->post('seat'),
			'durum_otobus'			=> '1'
			 );
		$this->db->insert('tbl_otobus', $data);
		$this->session->set_flashdata('message', 'swal("Succeed", "Otobüs Verisi Eklendi", "success");');
		redirect('backend/bus');
	}

}

