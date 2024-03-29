<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->autlogin();
	}

	public function autlogin()
	{
		$this->load->view('frontend/login');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	public function cekuser()
	{
		$username = strtolower($this->input->post('username'));
		$password = $this->input->post('password');
		$sqlCheck = $this->db->query('select * from tbl_musteri where username_musteri = "' . $username . '" OR email_musteri = "' . $username . '" ')->row();

		if ($sqlCheck) {
			if ($sqlCheck->durum_musteri == 1) {
				if (password_verify($password, $sqlCheck->password_musteri)) {
					$sess = [
						'kd_pelanggan' => $sqlCheck->kd_musteri,
						'username' => $sqlCheck->username_musteri,
						'password' => $sqlCheck->password_musteri,
						'ktp'     => $sqlCheck->no_ktp_musteri,
						'nama_lengkap'     => $sqlCheck->isim_musteri,
						'img_pelanggan'	=> $sqlCheck->img_musteri,
						'email'   => $sqlCheck->email_musteri,
						'telpon'   => $sqlCheck->telefon_musteri,
						'alamat'	=> $sqlCheck->adres_musteri
					];
					$this->session->set_userdata($sess);
					if ($this->session->userdata('jadwal') == NULL) {
						redirect('tiket');
					} else {
						redirect('tiket/koltuksec/' . $this->session->userdata('jadwal') . '/' . $this->session->userdata('asal') . '/' . $this->session->userdata('tanggal'));
					}
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Yanlis sifre
					</div>');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Hesap henuz dogrulanmamis!!
					</div>');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Kullanıcı bulunamadı,lütfen tekrar deneyin!
					</div>');
			redirect('login');
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('nomor', 'Nomor', 'trim|required|is_unique[tbl_musteri.telefon_musteri]', array(
			'required' => 'Cep telefonu numarasının doldurulması zorunludur.',
			'is_unique' => 'Numara Zaten Kullanımda.'
		));
		$this->form_validation->set_rules('name', 'Name', 'trim|required', array(
			'required' => 'İsim Gerekli.',
		));
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|is_unique[tbl_musteri.username_musteri]', array(
			'required' => 'Kullanıcı Adı Gerekli.',
			'is_unique' => 'Kullanıcı adı zaten kullanımda.'
		));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tbl_musteri.email_musteri]', array(
			'required' => 'E-posta Gerekli.',
			'valid_email' => 'E-postayı Doğru Girin',
			'is_unique' => 'E-posta Zaten Kullanımda.'
		));
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]', array(
			'matches' => 'Şifreler Uyuşmuyor,Kontol Edin!!',
			'min_length' => 'Şifre Minimum 8 Karakter Olmalı.'
		));
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');
		if ($this->form_validation->run() == false) {
			$this->load->view('frontend/erisim');
		} else {

			$this->load->model('getkod_model');
			$data = array(
				'kd_musteri'	=> $this->getkod_model->get_kodpel(),
				'isim_musteri'  => $this->input->post('name'),
				'email_musteri'	    	=> $this->input->post('email'),
				'img_musteri'		=> 'assets/frontend/img/default.png',
				'adres_musteri'		=> $this->input->post('alamat'),
				'telefon_musteri'		=> $this->input->post('nomor'),
				'username_musteri'		=> $this->input->post('username'),
				'durum_musteri' => 1,
				'tarih_yarat_musteri' => time(),
				'password_musteri'		=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT)
			);
			$token = md5($this->input->post('email') . date("d-m-Y H:i:s"));
			$data1 = array(
				'isim_token' => $token,
				'email_token' => $this->input->post('email'),
				'tarih_yarat_token' => time()
			);
			$this->db->insert('tbl_musteri', $data);
			$this->db->insert('tbl_token_musteri', $data1);
			$this->_sendmail($token, 'verify');
			$this->session->set_flashdata('message', 'swal("Success", "Kayıt Başarılı umut-BUS Ailesine Hoşgeldin", "success");');
			redirect('login');
		}
	}
	private function _sendmail($token = '', $type = '')
{
    $config = [
        'mailtype'  => 'html',
        'charset'   => 'utf-8',
        'protocol'  => 'smtp',
        'smtp_host' => 'ssl://smtp.gmail.com',
        'smtp_user' => 'demo@email.com',
        'smtp_pass' => 'P@$$\/\/0RD',
        'smtp_port' => 465,
        'crlf'      => "\r\n",
        'newline'   => "\r\n"
    ];
    $this->load->library('email', $config);
    $this->email->set_newline("\r\n");
    $this->email->from('demo@email.com', 'BTBS');
    $this->email->to($this->input->post('email'));
    if ($type == 'verify') {
        $this->email->subject('Account verify BTBS');
        $this->email->message('Click the link to verify your account <a href="' . base_url('login/verify?email=' . $this->input->post('email') . '&token=' . $token) . '" >Verification</a>');
    } elseif ($type == 'forgot') {
        $this->email->subject('BTBS Ticket Reset Account');
        $this->email->message('Click the link to Reset your account <a href="' . base_url('login/forgot?email=' . $this->input->post('email') . '&token=' . $token) . '" >Reset Password</a>');
    }
    if ($this->email->send()) {
        return true;
    } else {
        echo 'Error! email cant be sent.' . $this->email->print_debugger();
    }
}

	public function verify($value = '')
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$sqlcek = $this->db->get_where('tbl_musteri', ['email_musteri' => $email])->row_array();
		if ($sqlcek) {
			$sqlcek_token = $this->db->get_where('tbl_token_musteri', ['isim_token' => $token])->row_array();
			if ($sqlcek_token) {
				if (time() - $sqlcek_token['tarih_yarat_token'] < (60 * 60 * 24)) {
					$update = array('durum_musteri' => 1,);
					$where = array('email_musteri' => $email);
					$this->db->update('tbl_musteri', $update, $where);
					$this->db->delete('tbl_token_musteri', ['email_token' => $email]);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Hesabın Başarıyla Doğrulandı, Login
					</div>');
					redirect('login');
				} else {
					$this->db->delete('tbl_musteri', ['email_musteri' => $email]);
					$this->db->delete('tbl_token_musteri', ['email_token' => $email]);
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Token Expired, Please re-register your account
						</div>');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Incorrect Token Verification Failed
						</div>');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
		Email Verification Failed
						</div>');
			redirect('login');
		}
	}

	public function sifreunuttum($value = '')
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array(
			'required' => 'Email Required.',
			'valid_email' => 'Enter Email Correctly',
		));
		if ($this->form_validation->run() == false) {
			$this->load->view('frontend/sifreunuttum');
		} else {
			$email = $this->input->post('email');
			$sqlcek = $this->db->get_where('tbl_musteri', ['email_musteri' => $email], ['durum_musteri' => 1])->row_array();
			if ($sqlcek) {
				$token = md5($email . date("d-m-Y H:i:s"));
				$data = array(
					'isim_token' => $token,
					'email_token' => $email,
					'tarih_yarat_token' => time()
				);
				$this->db->insert('tbl_token_musteri', $data);
				$this->_sendmail($token, 'forgot');
				$this->session->set_flashdata('message', 'swal("Success", "Şifrenizi Başarıyla Sıfırlayın Lütfen E-postanızı Kontrol Edin", "success");');
				redirect('login');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
						No Email Or Account Not Active
						</div>');
				redirect('login/sifreunuttum');
			}
		}
	}
	public function forgot($value = '')
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$sqlcek = $this->db->get_where('tbl_musteri', ['email_musteri' => $email])->row_array();
		if ($sqlcek) {
			$sqlcek_token = $this->db->get_where('tbl_token_musteri', ['isim_token' => $token])->row_array();
			if ($sqlcek_token) {
				$this->session->set_userdata('resetemail', $email);
				$this->changepassword();
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Failed to Reset Wrong Email Token
						</div>');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
		Failed to Reset Wrong Email
						</div>');
			redirect('login');
		}
	}

	public function changepassword($value = '')
	{
		if ($this->session->userdata('resetemail') == NULL) {
			redirect('login/register');
		}
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]', array(
			'matches' => 'Password Not Same.',
			'min_length' => 'Password Minimum 8 Characters.'
		));
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');
		if ($this->form_validation->run() == false) {
			$this->load->view('frontend/resetpassword');
		} else {
			$email = $this->session->userdata('resetemail');
			$update = array(
				'durum_musteri' => 1,
				'password_musteri' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT)
			);
			$where = array('email_musteri' => $email);
			$this->db->update('tbl_musteri', $update, $where);
			$this->session->unset_userdata('resetemail');
			$this->db->delete('tbl_token_musteri', ['email_token' => $email]);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Sıfırlama Başarılır, Hesabına Giriş Yapabilirsin
					</div>');
			redirect('login');
		}
	}
}
