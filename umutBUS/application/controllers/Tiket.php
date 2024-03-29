<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tiket extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		date_default_timezone_set('Europe/Istanbul');
	}
	function getsecurity($value = '')
	{
		$username = $this->session->userdata('username');
		if (empty($username)) {
			redirect('login');
		}
	}
	public function index()
	{
		$this->session->unset_userdata(array('jadwal', 'asal', 'tanggal'));
		$data['title'] = "Check Schedule";
		$data['asal'] = $this->db->query("SELECT * FROM `tbl_varis` ORDER BY kota_varis ASC ")->result_array();
		$data['tujuan'] = $this->db->query("SELECT * FROM `tbl_varis` group by kota_varis ORDER BY kota_varis ASC ")->result_array();
		$data['list'] = $this->db->query("SELECT * FROM `tbl_varis` ORDER BY kota_varis ASC ")->result_array();
		$this->load->view('frontend/biletara', $data);
	}
	public function biletkontrol($value = '')
	{
		$this->load->view('frontend/biletkontrol');
	}
	public function rotalistele($tgl = '', $asl = '', $tjn = '')
	{
		$this->session->unset_userdata(array('jadwal', 'asal', 'tanggal'));
		$data['title'] = 'Search Tickets';
		$data['tanggal'] = $this->input->get('tanggal') . $tgl;
		$asal = $this->input->get('asal') . $asl;
		$tujuan = $this->input->get('tujuan') . $tjn;
		$data['asal'] = $this->db->query("SELECT * FROM tbl_varis
               WHERE kd_terminal ='$asal'")->row_array();
		$data['jadwal'] = $this->db->query("SELECT * FROM tbl_zaman LEFT JOIN tbl_otobus on tbl_zaman.kd_otobus = tbl_otobus.kd_otobus LEFT JOIN tbl_varis on tbl_zaman.kd_terminal = tbl_varis.kd_terminal WHERE tbl_zaman.vilayet_terminal ='$tujuan' AND tbl_zaman.kd_hedef_termianl = '$asal'")->result_array();
		if (!empty($data['jadwal'])) {
			if ($tujuan == $data['asal']['kota_varis']) {
				$this->session->set_flashdata('message', 'swal("Cek", "Tujuan dan Asal tidak boleh sama", "error");');
				redirect('tiket');
			} else {
				for ($i = 0; $i < count($data['jadwal']); $i++) {
					$data['kursi'][$i] = $this->db->query("SELECT count(no_koltuk_oturan) FROM tbl_siparis WHERE kd_zaman = '" . $data['jadwal'][$i]['kd_zaman'] . "' AND tgl_ayrilis_siparis = '" . $data['tanggal'] . "' AND mc_siparis = '" . $asal . "'")->result_array();
				};
				$this->load->view('frontend/rotalistele', $data);
			}
		} else {
			$this->session->set_flashdata('message', 'swal("Empty", "No Schedule", "error");');
			redirect('tiket');
		}
	}
	public function koltuksec($jadwal = "", $asal = '', $tanggal = '')
	{
		$array = array(
			'jadwal' => $jadwal,
			'asal'	=> $asal,
			'tanggal'	=> $tanggal
		);
		$this->session->set_userdata($array);
		if ($this->session->userdata('username')) {
			$id = $jadwal;
			$asal = $asal;
			$data['tanggal'] = $tanggal;
			$data['asal'] =  $this->db->query("SELECT * FROM tbl_varis
               WHERE kd_terminal ='" . $asal . "'")->row_array();
			$data['jadwal'] = $this->db->query("SELECT * FROM tbl_zaman LEFT JOIN tbl_otobus on tbl_zaman.kd_otobus = tbl_otobus.kd_otobus LEFT JOIN tbl_varis on tbl_zaman.kd_terminal = tbl_varis.kd_terminal WHERE kd_zaman ='" . $id . "'")->row_array();
			$data['kursi'] = $this->db->query("SELECT no_koltuk_oturan FROM tbl_siparis WHERE kd_zaman = '" . $data['jadwal']['kd_zaman'] . "' AND tgl_ayrilis_siparis = '" . $data['tanggal'] . "' AND mc_siparis = '" . $asal . "'")->result_array();
			$this->load->view('frontend/koltuksec', $data);
		} else {
			redirect('login/autlogin');
		}
	}
	public function koltukbilgigir()
	{
		$data['kursi'] = $this->input->get('kursi');
		$data['bank'] = $this->db->query("SELECT * FROM `tbl_bank` ")->result_array();
		$data['kd_jadwal'] = $this->session->userdata('jadwal');
		$data['asal'] = $this->session->userdata('asal');
		$data['tglberangkat'] = $this->input->get('tgl');
		if ($data['kursi']) {
			$this->load->view('frontend/koltukbilgigir', $data);
		} else {
			$this->session->set_flashdata('message', 'swal("Empty", "Choose Your Seat", "error");');
			redirect('tiket/koltuksec/' . $data['asal'] . '/' . $data['kd_zaman']);
		}
	}
	public function gettiket($value = '')
	{
		include 'assets/phpqrcode/qrlib.php';
		$asal =  $this->db->query("SELECT * FROM tbl_varis
               WHERE kd_terminal ='" . $this->session->userdata('asal') . "'")->row_array();
		$getkode =  $this->getkod_model->get_kodtmporder();
		$kd_jadwal = $this->session->userdata('jadwal');
		$kd_pelanggan = $this->session->userdata('kd_pelanggan');
		$tglberangkat = $this->input->post('tgl');
		$jambeli = date("Y-m-d H:i:s");
		$nama =  $this->input->post('nama');
		$kursi = $this->input->post('kursi');
		$tahun = $this->input->post('tahun');
		$no_ktp = $this->input->post('no_ktp');
		$nama_pemesan = $this->input->post('nama_pemesan');
		$hp = $this->input->post('hp');
		$alamat = $this->input->post('alamat');
		$email = $this->input->post('email');
		$bank = $this->input->post('bank');
		$satu_hari        = mktime(0, 0, 0, date("n"), date("j") + 1, date("Y"));
		$expired       = date("d-m-Y", $satu_hari) . " " . date('H:i:s');
		$status 		= '1';
		QRcode::png($getkode, 'assets/frontend/upload/qrcode/' . $getkode . ".png", "Q", 8, 8);
		$count = count($kursi);
		$tanggal = hari_indo(date('N', strtotime($jambeli))) . ', ' . tanggal_indo(date('Y-m-d', strtotime('' . $jambeli . ''))) . ', ' . date('H:i', strtotime($jambeli));
		for ($i = 0; $i < $count; $i++) {
			$simpan = array(
				'kd_siparis' => $getkode,
				'kd_bilet' => 'T' . $getkode . $kd_jadwal . str_replace('-', '', $tglberangkat) . $kursi[$i],
				'kd_zaman'	=> $kd_jadwal,
				'kd_musteri' => $kd_pelanggan,
				'mc_siparis' => $asal['kd_terminal'],
				'isim_siparis'	=> $nama_pemesan,
				'tgl_siparis_tamamla'	=> $tanggal,
				'tgl_ayrilis_siparis' => $tglberangkat,
				'no_koltuk_oturan'		=> $kursi[$i],
				'isim_koltuk_oturan' => $nama[$i],
				'yas_koltuk_oturan' => $tahun[$i],
				'no_ktp_siparis'	=> $no_ktp,
				'no_tlpn_siparis'	=> $hp,
				'adres_siparis'	=> $alamat,
				'email_siparis'		=> $email,
				'kd_bank' => $bank,
				'gecmis_siparis'	=> $expired,
				'qrcode_siparis'	=> 'assets/frontend/upload/qrcode/' . $getkode . '.png',
				'durum_siparis'	=> $status
			);
			$this->db->insert('tbl_siparis', $simpan);
		}
		redirect('tiket/checkout/' . $getkode);
	}
	public function cekorder($id = '')
	{
		$id = $this->input->post('kodetiket');
		$sqlcek = $this->db->query("SELECT * FROM tbl_siparis LEFT JOIN tbl_zaman on tbl_siparis.kd_zaman = tbl_zaman.kd_zaman LEFT JOIN tbl_otobus on tbl_zaman.kd_otobus = tbl_otobus.kd_otobus LEFT JOIN tbl_bank on tbl_siparis.kd_bank = tbl_bank.kd_bank WHERE kd_siparis ='$id' AND durum_siparis != 3 AND durum_siparis != 2")->result_array();
		if ($sqlcek) {
			$data['tiket'] = $sqlcek;
			$data['count'] = count($sqlcek);
			$this->load->view('frontend/payment', $data);
		} else {
			$this->session->set_flashdata('message', 'swal("Empty", "No Pending Tickets Found", "error");');
			redirect('tiket/biletkontrol');
		}
	}
	public function payment($id = '')
	{
		$this->getsecurity();
		$sqlcek = $this->db->query("SELECT * FROM tbl_siparis LEFT JOIN tbl_zaman on tbl_siparis.kd_zaman = tbl_zaman.kd_zaman LEFT JOIN tbl_otobus on tbl_zaman.kd_otobus = tbl_otobus.kd_otobus LEFT JOIN tbl_bank on tbl_siparis.kd_bank = tbl_bank.kd_bank WHERE kd_siparis ='$id'")->result_array();
		$data['count'] = count($sqlcek);
		$data['tiket'] = $sqlcek;
		$this->load->view('frontend/payment', $data);
	}
	public function checkout($value = '')
	{
		$this->getsecurity();
		$data['tiket'] = $value;
		$send['sendmail'] = $this->db->query("SELECT * FROM tbl_siparis LEFT JOIN tbl_zaman on tbl_siparis.kd_zaman = tbl_zaman.kd_zaman LEFT JOIN tbl_varis on tbl_zaman.kd_terminal = tbl_varis.kd_terminal LEFT JOIN tbl_bank on tbl_siparis.kd_bank = tbl_bank.kd_bank WHERE kd_siparis ='$value'")->row_array();
		$send['count'] = count($send['sendmail']);
		//email
		$subject = 'BTBS';
		$message = $this->load->view('frontend/sendmail', $send, TRUE);
		$to 	 = $this->session->userdata('email');
		$config = [
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_user' => 'demo@email.com',    // Ganti dengan email gmail kamu
			'smtp_pass' => 'P@$$\/\/0RD',      // Password gmail kamu
			'smtp_port' => 465,
		];
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('BTBS');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);
		if ($this->email->send()) {
			$this->session->set_flashdata('message', 'swal("Success", "Please proceed towards payment confirmation!", "success");');
			$this->load->view('frontend/checkout', $data);
		} else {
			$this->session->set_flashdata('message', 'swal("Success", "Please proceed towards payment confirmation!", "success");');
			$this->load->view('frontend/checkout', $data);
		}
	}
	public function caritiket()
	{
		$id = $this->input->post('kodetiket');
		$sqlcek = $this->db->query("SELECT * FROM tbl_siparis LEFT JOIN tbl_otobus on tbl_siparis.kd_otobus = tbl_otobus.kd_otobus LEFT JOIN tbl_jadwal on tbl_siparis.kd_zaman = tbl_zaman.kd_zaman WHERE kd_siparis ='" . $id . "'")->result_array();
		if ($sqlcek == NULL) {
			$this->session->set_flashdata('message', 'swal("Kosong", "Tidak Ada Tiket", "error");');
			redirect('tiket/biletkontrol');
		} else {
			$data['tiket'] = $sqlcek;
			$this->load->view('frontend/payment', $data);
		}
	}
	public function konfirmasi($value = '', $harga = '')
	{
		$this->getsecurity();
		$data['id'] = $value;
		$data['total'] = $harga;
		$this->load->view('frontend/onay', $data);
	}
	public function insertkonfirmasi($value = '')
	{
		$this->getsecurity();
		$config['upload_path'] = './assets/frontend/upload/payment';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message', 'swal("Fail", "Check Your Confirmation Again", "error");');
			redirect('tiket/konfirmasi/' . $this->input->post('kd_order') . '/' . $this->input->post('total'));
		} else {
			$upload_data = $this->upload->data();
			$featured_image = '/assets/frontend/upload/payment/' . $upload_data['file_name'];
			$data = array(
				'kd_onay' => $this->getkod_model->get_kodkon(),
				'kd_siparis'	=> $this->input->post('kd_order'),
				'isim_bank_onay'		=> $this->input->post('bank_km'),
				'isim_onay' =>  $this->input->post('nama'),
				'hesap_no'		=> $this->input->post('nomrek'),
				'total_onay' => $this->input->post('total'),
				'foto_onay' => $featured_image
			);
			$this->db->insert('tbl_onay', $data);
			$this->session->set_flashdata('message', 'swal("Success", "Thank you. Please wait for the verification!", "success");');
			redirect('profile/biletlerim/' . $this->session->userdata('kd_pelanggan'));
		}
	}
	public function cetak($id = '')
	{
		$this->getsecurity();
		$order = $id;
		$data['cetak'] = $this->db->query("SELECT * FROM tbl_siparis LEFT JOIN tbl_otobus on tbl_siparis.kd_otobus = tbl_otobus.kd_otobus LEFT JOIN tbl_zaman on tbl_siparis.kd_zaman = kd_zaman.kd_zaman LEFT JOIN tbl_varis on tbl_zaman.kd_terminal = tbl_varis.kd_terminal WHERE kd_siparis ='" . $id . "'")->result_array();
		$tiket = $this->db->query("SELECT email_musteri FROM tbl_musteri WHERE kd_musteri ='" . $data['cetak'][0]['kd_musteri'] . "'")->row_array();
		die(print_r($tiket));
	}
}