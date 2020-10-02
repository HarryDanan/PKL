<?php

class Upload2_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_all_data()
	{
        $query = $this->db->get_where('berkas',['email' => $this->session->userdata('email')]);
        
        // return $this->db->get_where('berkas', ['id' => $id])->row_array();
		return $query->result_array();
	}

	public function tambah_()
	{
		$data = [
					'judul' => $this->input->post('judul'),
					'deskripsi' => $this->input->post('deskripsi'),
					'pembimbing1' => $this->input->post('pembimbing1'),
					'pembimbing2' => $this->input->post('pembimbing2'),
                    'kompetensi' => $this->input->post('kompetensi'),
					'tipe_file' => $this->input->post('tipe_file'),
					'email' => $this->input->post('email'),
					'status' => $this->input->post('status'),
					'nim' => $this->input->post('nim'),
				];

		$this->db->insert('berkas', $data);
	}

	public function edit_($id)
	{
		$query = $this->db->get_where('berkas', ['id' => $id]);
		return $query->row_array();
	}

	public function update_($id)
	{
		// $id = ['id' => $this->input->post('id')];
		
	

		$data = [
					

                    'judul'         => $this->input->post('judul'),
					'deskripsi'     => $this->input->post('deskripsi'),
					'pembimbing1'   => $this->input->post('pembimbing1'),
					'pembimbing2'   => $this->input->post('pembimbing2'),
                    'kompetensi'    => $this->input->post('kompetensi'),
					'tipe_file'     => $this->input->post('tipe_file'),
		
				];

				$this->db->where('id',$id);
				$this->db->update('berkas', $data);	
				
		
	}

	public function hapus_($id)
	{
		$this->db->delete('berkas', ['id' => $id]);
	}

	public function download($id){
		$query = $this->db->get_where('berkas',array('id'=>$id));
		return $query->row_array();
	}
}

?>