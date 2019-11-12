<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		is_dosen();
	}

    public function index()
	{
	    $data['title'] = 'Dashboard Dosen';
		$data['dosen'] = $this->db->get_where('dosen', ['email' => $this->session->userdata('email')])->row_array();
		// echo 'Selamat Datang Bro '.$data['user']['nama_user'];

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar-dosen',$data);
		$this->load->view('templates/topbar-dosen',$data);
		$this->load->view('dosen/index',$data);
		$this->load->view('templates/footer');
	}

	public function profile()
	{
		$data['title'] = 'Profil Dosen';
		$data['dosen'] = $this->db->get_where('dosen', ['email' => $this->session->userdata('email')])->row_array();
		// echo 'Selamat Datang Bro '.$data['user']['nama_user'];

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar-dosen',$data);
		$this->load->view('templates/topbar-dosen',$data);
		$this->load->view('dosen/profile',$data);
		$this->load->view('templates/footer');
	}

	public function edit()
	{
		$data['title'] = 'Edit Profil Dosen';
		$data['dosen'] = $this->db->get_where('dosen', ['email' => $this->session->userdata('email')])->row_array();
		// echo 'Selamat Datang Bro '.$data['user']['nama_user'];

		$this->form_validation->set_rules('nama','Fullname','required|trim');

		if($this->form_validation->run() == false){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar-dosen',$data);
			$this->load->view('templates/topbar-dosen',$data);
			$this->load->view('dosen/edit',$data);
			$this->load->view('templates/footer');
		}
		else{
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');

			// cek jika ada gambara yang akan diupload
			$upload_image = $_FILES['image']['name'];
			// var_dump($upload_image);
			// die;

			if($upload_image){
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] 	 = '2048';
				$config['upload_path']	 = './assets/dist/img/profile/';

				$this->load->library('upload',$config);

				if($this->upload->do_upload('image'))
				{
					// gambar lama
					$old_image = $data['dosen']['image'];
					if($old_image != 'default.jpg'){
						unlink(FCPATH . 'assets/dist/img/profile/' . $old_image);
					}
					//

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				}	
				else
				{
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('nama_dosen', $nama);
			$this->db->where('email', $email);
			$this->db->update('dosen');

			$this->session->set_flashdata('message',' <div class="alert alert-success" role="alert"> Berhasil Update Akun!
				</div>');
			redirect('dosen/profile');
		}
	}

	public function changePassword()
	{
	    $data['title'] = 'Ganti Password Dosen';
		$data['dosen'] = $this->db->get_where('dosen', ['email' => $this->session->userdata('email')])->row_array();
		// echo 'Selamat Datang Bro '.$data['user']['nama_user'];

		$this->form_validation->set_rules('current_password', 'Current Password','required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password','required|trim|min_length[3]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password','required|trim|min_length[3]|matches[new_password1]');

		if($this->form_validation->run() == false){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar-dosen',$data);
			$this->load->view('templates/topbar-dosen',$data);
			$this->load->view('dosen/changepassword',$data);
			$this->load->view('templates/footer');
		}
		else{
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if(!password_verify($current_password, $data['dosen']['password'])){
				$this->session->set_flashdata('message',' <div class="alert alert-danger" role="alert"> Password Lama Salah!
				</div>');
				redirect('dosen/changepassword');
			}
			else{
				if($current_password == $new_password){
					$this->session->set_flashdata('message',' <div class="alert alert-danger" role="alert"> Password Baru Tidak Boleh Sama Dengan Password Lama!
					</div>');
					redirect('dosen/changepassword');
				}
				else{
					// password ok
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('dosen');

					$this->session->set_flashdata('message',' <div class="alert alert-success" role="alert"> Password Berhasil Diganti!
					</div>');
					redirect('dosen/changepassword');
				}
			}
		}
	}


}