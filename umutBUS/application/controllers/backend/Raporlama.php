<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Raporlama extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set('Europe/Istanbul');
	}
	function getsecurity($value = '')
	{
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('backend/login');
		}
	}

	public function index()
	{
		$data['title'] = 'Report';
		$data['bulan'] = $this->db->query("SELECT DISTINCT DATE_FORMAT(yarat_tgl_bilet,'%M %Y') AS bulan FROM tbl_bilet")->result_array();
		$this->load->view('backend/raporlama', $data);
	}
	public function raportarih($value = '')
	{
		$data['mulai'] = $this->input->post('mulai');
		$data['sampai'] = $this->input->post('sampai');
		$data['laporan'] = $this->db->query("SELECT * FROM tbl_bilet WHERE (yarat_tgl_bilet BETWEEN '" . $data['mulai'] . "' AND '" . $data['sampai'] . "') AND durum_bilet = 2")->result_array();
		for ($i = 0; $i < count($data['laporan']); $i++) {
			$total[$i] = $data['laporan'][$i]['fiyat_bilet'];
		}
		$data['total'] = array_sum($total);
		$this->load->view('backend/laporan/rapor_sorgu', $data);
	}
	public function laporbulan($value = '')
	{
		$data['bulan'] = $this->input->post('bln');
		die(print_r($data));
	}
}
