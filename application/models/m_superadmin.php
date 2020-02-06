
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_superadmin extends CI_Model {

	public function getSuratMasuk()
	{
		return $this->db->get('surat_masuk');

	}

	public function getSuratKeluar()
	{
		return $this->db->get('surat_keluar');
	}

	public function downloadSuratMasuk($id)
	{
		$query= $this->db->get_where('surat_masuk', array('id_surat'=>$id));
		return $query->row_array();
	}

	public function downloadSuratDisposisi($id){
		$query= $this->db->get_where('surat_masuk', array('id_surat'=>$id));
		return $query->row_array();
	}

	public function downloadSuratKeluar($id)
	{
		$query= $this->db->get_where('surat_keluar', array('id_surat'=>$id));
		return $query->row_array();
	}

	public function GetInstansi()
	{
		return $this->db->get('instansi');
	}
	public function GetUsers()
	{
		return $this->db->get('users');
	}

	public function getPengirim()
	{
		return $this->db->get('instansi');
	}
	public function verified($id_surat)
	{
		$data=[
			'status_surat'=>'1'
			];

			$this->db->where('id_surat',$id_surat);
			$this->db->update('surat_masuk',$data);
			return true;
	}

	

}

/* End of file m_superadmin.php */
/* Location: ./application/models/m_superadmin.php */