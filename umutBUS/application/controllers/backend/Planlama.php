<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planlama extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		$this->load->library('form_validation');
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
		$data['title'] = "Schedule Management";
		$data['jadwal'] = $this->db->query("SELECT * FROM tbl_zaman LEFT JOIN tbl_otobus on tbl_zaman.kd_otobus = tbl_otobus.kd_otobus LEFT JOIN tbl_varis on tbl_zaman.kd_hedef_termianl = tbl_varis.kd_terminal ")->result_array();
		$this->load->view('backend/planlama', $data);
	}
	public function viewtambahjadwal($value=''){
		$data['title'] = "Add Schedule";
		$data['bus'] = $this->db->query("SELECT * FROM tbl_otobus ORDER BY isim_otobus asc")->result_array();
		$data['tujuan'] = $this->db->query("SELECT * FROM tbl_varis ORDER BY kota_varis asc")->result_array();
		$this->load->view('backend/planlamaekle', $data);
	}

	public function planlamaekle(){
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required|min_length[5]|max_length[12]');
		if ($this->form_validation->run() ==  FALSE) {
			$data['title'] = "Add Schedule";
			$data['bus'] = $this->db->query("SELECT * FROM tbl_otobus ORDER BY isim_otobus asc")->result_array();
			$data['tujuan'] = $this->db->query("SELECT * FROM tbl_varis ORDER BY kota_varis asc")->result_array();
			$this->load->view('backend/planlamaekle', $data);
		} else {
			$asal = $this->input->post('asal');
			$tujuan = $this->db->query("SELECT * FROM tbl_varis
               WHERE kd_terminal ='".$this->input->post('tujuan')."'")->row_array();
			if ($asal == $tujuan['kd_terminal']) {
				$this->session->set_flashdata('message', 'swal("Succeed", "Aynı Hedef Olamaz", "error");');
			redirect('backend/planlama');
			}else{
			$kode = $this->getkod_model->get_kodjad();
			$simpan = array(
					'kd_zaman' => $kode,
					'kd_hedef_termianl' => $asal,
					'kd_terminal' => $tujuan['kd_terminal'],
					'kd_otobus' => $this->input->post('bus'),
					'vilayet_terminal' => $tujuan['kota_varis'],
					'kalkis_zaman' => $this->input->post('berangkat'),
					'varis_zaman' => $this->input->post('tiba'),
					'fiyat_tarifesi' =>  $this->input->post('harga'),
					 );
			
			$this->db->insert('tbl_zaman', $simpan);
			$this->session->set_flashdata('message', 'swal("Succeed", "Yeni Plan Eklendi", "success");');
			redirect('backend/planlama');
			}
			
		}
		
	}
	public function viewplanlama($id=''){
		$data['title'] = "Destination List";
	 	$sqlcek = $this->db->query("SELECT * FROM tbl_zaman LEFT JOIN tbl_otobus on tbl_zaman.kd_otobus = tbl_otobus.kd_otobus LEFT JOIN tbl_varis on tbl_zaman.kd_terminal = tbl_varis.kd_terminal WHERE kd_zaman ='".$id."'")->row_array();
	 	if ($sqlcek) {
	 		$data['asal'] = $this->db->query("SELECT * FROM tbl_varis WHERE kd_terminal = '".$sqlcek['kd_hedef_termianl']."'")->row_array();
	 		$data['jadwal'] = $sqlcek;
			$data['title'] = "View Schedule";
			// die(print_r($data));
			$this->load->view('backend/view_planlama',$data);
	 	}else{
	 		$this->session->set_flashdata('message', 'swal("Failed", "Bir şeyler ters gitt tekrar deneyin", "error");');
			redirect('backend/planlama');
	 	}
	}	
}

