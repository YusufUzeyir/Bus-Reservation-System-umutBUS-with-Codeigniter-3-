<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
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
		if (empty($this->session->userdata('username_admin'))) {
			$this->session->sess_destroy();
			redirect('backend/login');
		}
	}
	public function index()
	{
		$data['title'] = "Booking List";
		$data['order'] = $this->db->query("SELECT * FROM tbl_siparis group by kd_siparis")->result_array();

		$this->load->view('backend/order', $data);
	}

	public function vieworder($id = '')
	{

		$cek = $this->input->get('order') . $id;
		$sqlcek = $this->db->query("SELECT * FROM tbl_siparis LEFT JOIN tbl_zaman on tbl_siparis.kd_zaman = tbl_zaman.kd_zaman WHERE kd_siparis ='" . $cek . "' ")->result_array();
		if ($sqlcek) {
			$data['tiket'] = $sqlcek;
			$data['title'] = "View Bookings";

			$this->load->view('backend/view_order', $data);
		} else {
			$this->session->set_flashdata('message', 'swal("Empty", "No Order", "error");');
			redirect('backend/tiket');
		}
	}
	public function inserttiket($value = '')
	{
		$id = $this->input->post('kd_order');
		$asal = $this->input->post('asal_beli');
		$tiket = $this->input->post('kd_tiket');
		$nama = $this->input->post('nama');
		$kursi = $this->input->post('no_kursi');
		$umur = $this->input->post('umur_kursi');
		$harga = $this->input->post('harga');
		$tgl = $this->input->post('tgl_beli');
		$status = $this->input->post('status');
		$where = array('kd_siparis' => $id);
		$update = array('durum_siparis' => $status);
		$this->db->update('tbl_siparis', $update, $where);
		$data['asal'] = $this->db->query("SELECT * FROM tbl_varis WHERE kd_terminal ='" . $asal . "'")->row_array();
		$data['cetak'] = $this->db->query("SELECT * FROM tbl_siparis LEFT JOIN tbl_zaman on tbl_siparis.kd_zaman = tbl_zaman.kd_zaman LEFT JOIN tbl_varis on tbl_zaman.kd_terminal = tbl_varis.kd_terminal WHERE kd_siparis ='" . $id . "'")->result_array();
		$pelanggan = $this->db->query("SELECT email_musteri FROM tbl_musteri WHERE kd_musteri ='" . $data['cetak'][0]['kd_musteri'] . "'")->row_array();
		$pdfFilePath = "assets/backend/upload/etiket/" . $id . ".pdf";
		$html = $this->load->view('frontend/cetaktiket', $data, TRUE);
		$this->load->library('m_pdf');
		$this->m_pdf->pdf->WriteHTML($html);
		$this->m_pdf->pdf->Output($pdfFilePath);
		for ($i = 0; $i < count($nama); $i++) {
			$simpan = array(
				'kd_bilet' => $tiket[$i],
				'kd_siparis' => $id,
				'isim_bilet' => $nama[$i],
				'koltuk_bilet' => $kursi[$i],
				'yas_bilet' => $umur[$i],
				'terminaL_satin_bilet' => $asal,
				'fiyat_bilet' => $harga,
				'durum_bilet' => $status,
				'etiket_bilet' => $pdfFilePath,
				'yarat_tgl_bilet' => date('Y-m-d'),
				'yarat_admin_bilet' => $this->session->userdata('username_admin')
			);
			$this->db->insert('tbl_bilet', $simpan);
		}
		$this->session->set_flashdata('message', 'swal("Succeed", "Bilet Siparişi Başarıyla İletildi", "success");');
		redirect('backend/order');
	}

	public function kirimemail($id = '')
	{
		$data['cetak'] = $this->db->query("SELECT * FROM tbl_siparis LEFT JOIN tbl_zaman on tbl_siparis.kd_zaman = tbl_zaman.kd_zaman LEFT JOIN tbl_varis on tbl_zaman.kd_terminal = tbl_varis.kd_terminal WHERE kd_siparis ='" . $id . "'")->result_array();
		$asal = $data['cetak'][0]['mc_siparis'];
		$kodeplg = $data['cetak'][0]['kd_musteri'];
		$data['asal'] = $this->db->query("SELECT * FROM tbl_varis WHERE kd_terminal ='$asal'")->row_array();
		$pelanggan = $this->db->query("SELECT email_musteri FROM tbl_musteri WHERE kd_musteri ='$kodeplg'")->row_array();

		$subject = 'E-ticket - Order ID ' . $id . ' - ' . date('dmY');
		$message = $this->load->view('frontend/cetaktiket', $data, TRUE);
		$attach  = base_url("assets/backend/upload/etiket/" . $id . ".pdf");
		$to 	= $pelanggan['email_pelanggan'];
		$config = array(
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_user' => 'demo@email.com',
			'smtp_pass' => 'P@$$\/\/0RD',
			'smtp_port' => 465,
			'crlf'      => "rn",
			'newline'   => "rn"
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('BTBS');
		$this->email->to($to);
		$this->email->attach($attach);
		$this->email->subject($subject);
		$this->email->message($message);
		if ($this->email->send()) {
			$this->session->set_flashdata('message', 'swal("Succeed", "E-Bilet gönderildi", "success");');
			redirect('backend/order/vieworder/' . $id);
		} else {
			$this->session->set_flashdata('message', 'swal("Failed", "E-Bilet gönderilirken hata oluştu", "error");');
			redirect('backend/order/vieworder/' . $id);
		}
	}
}
