<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class c_login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('url','form'));
	}

	public function index()
	{
		$data['title']='Login';
		$this->load->view('v_login',$data);
	}

	public function login()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');

		$this->form_validation->set_rules('username', 'username', 'required|trim');
		$this->form_validation->set_rules('password', 'password', 'required|trim');

		if ($this->form_validation->run()==FALSE) {
			$data['title']='Login';
			$this->load->view('v_login',$data);
		}
		else{
			$user=$this->db->get_where('users', ['username'=>$username])->row_array();

			if ($user['username']==$username) {

				if ($user['password']==$password) {
					
					$data=[
					'username'=>$user['username'],
					'role_id'=>$user['role_id'],
					'nama'=>$user['nama'],
					'foto'=>$user['foto'],
					'tujuan'=>$user['tujuan']
					];

					$this->session->set_userdata($data);

					if ($user['role_id']=='1') {
					// echo'hai super admin';
						redirect('c_superadmin');
					}
					else if ($user['role_id']=='2') {
						redirect('c_superadmin');
					}
					else if ($user['role_id']=='3') {
						redirect('c_superadmin');
					}
					else {
						redirect('c_superadmin');
					}
				}
				else
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Password Salah</div>');
					redirect('c_Login');
				}		
			}else if ($user['username']!=$username AND $user['password']!=$password ) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Username dan Password Salah</div>');
				redirect('c_Login');
			}

			else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Username Salah</div>');
				redirect('c_Login');
			}
			}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('nama');
		$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">you have been logged out</div>');
			redirect('c_Login');
	}

}

/* End of file c_login.php */
/* Location: ./application/controllers/c_login.php */ ?>