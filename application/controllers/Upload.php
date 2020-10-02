<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller
{
	public function __construct()
	{
        parent::__construct();
		is_logged_in();
		is_mahasiswa();
		$this->load->model('upload2_model');
		$this->load->helper(['url_helper', 'form']);
    	$this->load->library(['form_validation', 'session']);
	}

	public function lihatdata()
	{
		$data['berkas'] = $this->upload2_model->get_all_data();
		$data['title'] = "Data Berkas";
		$data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('mahasiswa/data_berkas',$data);
		$this->load->view('templates/footer');

	}

	public function formtambah()
	{
		$data['title'] = "Upload Data Berkas";
        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('mahasiswa/upload_berkas',$data);
        $this->load->view('templates/footer');
        
	}

	public function tambah()
	{

        $this->form_validation->set_rules('judul', 'Judul Proposal ', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Proposal', 'required');
		$this->form_validation->set_rules('pembimbing1', 'Pembimbing 1', 'required');
		$this->form_validation->set_rules('pembimbing2', 'Pembimbing 2', 'required');
		$this->form_validation->set_rules('kompetensi', 'Kompotensi', 'required'); 	
		$this->form_validation->set_rules('tipe_file', 'Tipe Porposal', 'required|trim');

		if (empty($_FILES['file']['name']))
		{
			$this->form_validation->set_rules('file', 'File Tugas Akhir', 'required');
		}

		if($this->form_validation->run() === FALSE)
		{
			$this->formtambah();
		}
		else
		{
            // 
            $upload_file = $_FILES['file']['name'];
			if($upload_file){
				$config['allowed_types'] = 'pdf|doc|docx';
				$config['max_size'] 	 = '10000';
				$config['upload_path']	 = 'assets/dist/berkas/';

				$this->load->library('upload',$config);

				if($this->upload->do_upload('file'))
				{
					$new_file = $this->upload->data('file_name');
					$this->db->set('file', $new_file);
				}	
				else
				{
					// echo $this->upload->display_errors();
					$this->session->set_flashdata('input_gagal','Extension File Tidak Di Support');
					redirect('/upload/lihatdata');
				}
			}
            // 
			$this->upload2_model->tambah_();
			$this->session->set_flashdata('input_sukses','Data Berkas berhasil di input');
			redirect('/upload/lihatdata');
		}
	}

	public function hapusdata($id)
	{
		$fileinfo = $this->upload2_model->download($id);
		$file = './assets/dist/berkas/'.$fileinfo['file'];
		unlink($file);
		$this->upload2_model->hapus_($id);
		$this->session->set_flashdata('hapus_sukses','Data Berkas berhasil di hapus');
		redirect('/upload/lihatdata');
	}

	public function formedit($id)
	{
        $data['title'] = 'Edit Data Tugas AKhir';
        
        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
		$data['berkas'] = $this->upload2_model->edit_($id);

        $this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('mahasiswa/edit_berkas',$data);
		$this->load->view('templates/footer');
	}

	public function update($id)
	{

        $this->form_validation->set_rules('judul','Judul','required|trim');
		$this->form_validation->set_rules('pembimbing1','Pembimbing 1','required|trim');
		$this->form_validation->set_rules('pembimbing2','Pembimbing 1','required|trim');
		$this->form_validation->set_rules('kompetensi','Kompetensi ','required|trim');
		$this->form_validation->set_rules('deskripsi','Deskripsi','required|trim');
		$this->form_validation->set_rules('tipe_file','Tipe File ','required|trim');

		if (empty($_FILES['file']['name']))
		{
			$this->form_validation->set_rules('file', 'File Tugas Akhir', 'required');
		}
		

		if($this->form_validation->run() === FALSE)
		{
			$this->formedit($id);
		}
		else
		{
            // 
            $upload_file = $_FILES['file']['name'];
			if($upload_file){
				$config['allowed_types'] = 'pdf|doc|docx';
				$config['max_size'] 	 = '10000';
				$config['upload_path']	 = 'assets/dist/berkas/';

				$this->load->library('upload',$config);

				if($this->upload->do_upload('file'))
				{
				
						$fileinfo = $this->upload2_model->download($id);
						$file = './assets/dist/berkas/'.$fileinfo['file'];
						unlink($file);
						$new_file = $this->upload->data('file_name');
						$this->db->set('file', $new_file);
				}	
				else
				{
					$this->session->set_flashdata('update_gagal', 'File Extension Berkas Tidak di Support');
					redirect('/upload/lihatdata');
				}
			}
            // 
			$this->upload2_model->update_($id);
			$this->session->set_flashdata('update_sukses', 'Data Berkas berhasil diperbaharui');
			redirect('/upload/lihatdata');
		}
    }
    
    public function download_file($id){
		$this->load->helper('download');
		$fileinfo = $this->upload2_model->download($id);
        $file = './assets/dist/berkas/'.$fileinfo['file'];
        force_download($file, NULL);
	}

	
}
?>