<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Europe/Istanbul');
	}
	public function index(){
		$this->load->view('frontend/profile');
	}
	public function profilbilgi($id=''){
		$data['profile'] = $this->db->query("SELECT * FROM tbl_musteri WHERE kd_musteri LIKE '".$id."'")->row_array();
		
		$this->load->view('frontend/profile',$data);
	}
	public function editprofile($id=''){
		$id = $this->input->post('kode');
		$where = array('kd_musteri' => $id );
		$update = array(
			'no_ktp_musteri'			=> $this->input->post('ktp'),
			'isim_musteri'  => $this->input->post('nama'),
			'email_musteri'	    	=> $this->input->post('email'),
			'img_musteri'		=> 'assets/frontend/img/default.png',
			'adres_musteri'		=> $this->input->post('alamat'),
			'telefon_musteri'		=> $this->input->post('hp'),
			 );
		$this->db->update('tbl_musteri', $update,$where);
		$this->session->set_flashdata('message', 'swal("Success", "Veriler Eklendi", "success");');
		redirect('profile/profilbilgi/'.$id);
	}
	public function biletlerim($id=''){
		$this->getsecurity();
		$data['tiket'] = $this->db->query("SELECT * FROM tbl_siparis WHERE kd_musteri ='".$id."' group by kd_siparis ")->result_array();
	
		$this->load->view('frontend/biletlerim',$data);
	}
	public function changepassword($id=''){
		$this->load->library('form_validation');
		$pelanggan = $this->db->query("SELECT password_musteri FROM tbl_musteri where kd_musteri ='".$id."'")->row_array();
		
		$this->form_validation->set_rules('currentpassword', 'currentpassword', 'trim|required|min_length[8]',array(
			'required' => 'Enter Password',
			 ));
		$this->form_validation->set_rules('new_password1', 'new_password1', 'trim|required|min_length[8]|matches[new_password2]',array(
			'required' => 'Enter Password.',
			'matches' => 'Password Not Same.',
			'min_length' => 'Password Minimal 8 Characters.'
			 ));
		$this->form_validation->set_rules('new_password2', 'new_password2', 'trim|required|min_length[8]|matches[new_password1]',array(
			'required' => 'Enter Password.',
			'matches' => 'Password Not Same.',
			'min_length' => 'Password Minimal 8 Characters.'
			 ));
		if ($this->form_validation->run() == false) {
			$this->load->view('frontend/changepassword');
		} else {
			$currentpassword = $this->input->post('currentpassword');
			$newpassword 	 = $this->input->post('new_password1');
			if (!password_verify($currentpassword, $pelanggan['password_musteri'])) {
				$this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert">
				Previous Password Wrong
					</div>');
				redirect('profile/changepassword');
			}elseif ($currentpassword == $newpassword) {
				$this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert">
				Passwords cant be the same before
					</div>');
				redirect('profile/changepassword');
			}else{
				$password_hash = password_hash($newpassword, PASSWORD_DEFAULT);
				$where = array('kd_musteri' => $id );
				$update = array(
				'password_musteri'			=> $password_hash,
				 );
				$this->db->update('tbl_musteri', $update,$where);
				$this->session->set_flashdata('message', 'swal("Success", "Şifren Başarılı Şekilde Değiştirildi", "success");');
				redirect('profile/profilbilgi/'.$id);
			}
		}

	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('backend/login');
		}
	}
}

