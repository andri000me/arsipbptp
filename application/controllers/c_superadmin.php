
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class c_superadmin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation','pdf','upload'));
		$this->load->model('m_superadmin');
		$this->load->helper(array('url','form','download'));
		

	}

	public function index()
	{
		
		$m= date("m");
		$data['jml_surat_masuk']=$this->db->query("SELECT * FROM surat_masuk WHERE EXTRACT(MONTH FROM tanggal_surat) = '$m' ")->num_rows();
		$data['jml_surat_keluar']=$this->db->query("SELECT * FROM surat_keluar WHERE EXTRACT(MONTH FROM tanggal_surat) = '$m' ")->num_rows();
		$data['jml_instansi']=$this->m_superadmin->getInstansi()->num_rows();
		$data['jml_suratkeluar']=$this->m_superadmin->getSuratKeluar()->num_rows();
		$data['jml_suratmasuk']=$this->m_superadmin->getSuratMasuk()->num_rows();
		$data['jml_user']=$this->m_superadmin->getUsers()->num_rows();
		$data['main_view']='v_dashboard';
		$this->load->view('v_template',$data);
	}


	public function suratmasuk()
	{
		$data['sm']=$this->db->get_where('surat_masuk', ['Tujuan'=> $this->session->userdata('role_id'), 'status_surat'=>'1'])->result();
		
		$data['pengirim']=$this->m_superadmin->getPengirim()->result();		
		$data['suratmasuk']=$this->m_superadmin->getSuratMasuk()->result();
		$data['main_view']='v_suratmasuk';
		$this->load->view('v_template', $data);		
	}

	public function suratkeluar()
	{
		$data['pengirim']=$this->m_superadmin->getPengirim()->result();	
		$data['suratkeluar']=$this->m_superadmin->getSuratKeluar()->result();
		$data['main_view']='v_suratkeluar';
		$this->load->view('v_template', $data);
	}

	public function tambahsuratmasuk()
	{
		$this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required|trim');
		$this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required|trim');
		$this->form_validation->set_rules('pengirim', 'Pengirim', 'required|trim');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required|trim');
		$this->form_validation->set_rules('tgl_diterima', 'Tanggal Diterima', 'required|trim');
		$this->form_validation->set_rules('agno', 'Agno', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			redirect('c_superadmin/suratmasuk');
			
		} else {
			$data=[
				'nomor_surat'=>htmlspecialchars($this->input->post('no_surat')),
				'tanggal_surat'=>htmlspecialchars($this->input->post('tgl_surat')),
				'pengirim'=>htmlspecialchars($this->input->post('pengirim')),
				'perihal'=>htmlspecialchars($this->input->post('perihal')),
				'tanggal_diterima'=>htmlspecialchars($this->input->post('tgl_diterima')),
				'agno'=>htmlspecialchars($this->input->post('agno')),
				'tujuan'=>htmlspecialchars($this->input->post('tujuan')),

				'file_surat'=>$_FILES['file']['name']
			];

			$targetfolder= "assets/upload_surat_masuk/";
			$targetfolder=$targetfolder . basename( $_FILES['file']['name']);
			$file_type=$_FILES['file']['type'];
			

			if ($file_type=="application/pdf") {
				if (move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder)) {
					
				}else{
				echo'hanya boleh PDF ';
			}

			}

			$this->db->insert('surat_masuk', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Ditambah!</div>');
				redirect('C_superadmin/suratmasuk');
		}
	}

	public function tambahsuratkeluar()
	{
		$this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required|trim');
		$this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required|trim');
		$this->form_validation->set_rules('ringkasan', 'ringkasan', 'required|trim');
		$this->form_validation->set_rules('tujuan', 'tujuan', 'required|trim');
		
		if ($this->form_validation->run() == FALSE) {
			redirect('c_superadmin/suratkeluar');
			
		}else{
			$data=[
				'nomor_surat'=>htmlspecialchars($this->input->post('no_surat')),
				'tanggal_surat'=>htmlspecialchars($this->input->post('tgl_surat')),
				'ringkasan'=>htmlspecialchars($this->input->post('ringkasan')),
				'tujuan'=>htmlspecialchars($this->input->post('tujuan')),
				'file'=>$_FILES['file']['name']
			];
		}
		
			$targetfolder= "assets/upload_surat_keluar/";
			$targetfolder=$targetfolder . basename( $_FILES['file']['name']);
			$file_type=$_FILES['file']['type'];
			

			if ($file_type=="application/pdf") {
				if (move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder)) {
					# code...
				}else{
				echo'hanya boleh PDF ';
			}

			}
			
			$this->db->insert('surat_keluar', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Ditambah!</div>');
				redirect('C_superadmin/suratkeluar');
	}

	

	public function editsuratmasuk()
	{
		$this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required|trim');
		$this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required|trim');
		$this->form_validation->set_rules('pengirim', 'Pengirim', 'required|trim');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required|trim');
		$this->form_validation->set_rules('agno', 'Agno', 'required|trim');
		$this->form_validation->set_rules('tgl_diterima', 'Tanggal Diterima', 'required|trim');
		
		if ($this->form_validation->run() == FALSE) {
			redirect('c_superadmin/suratmasuk');
			
		} else{

		
			if ($_FILES['file_surat']['name'] =='') {
				$data=[
				//'id_surat'=>$this->input->post('id_surat'),
				'nomor_surat'=>htmlspecialchars($this->input->post('no_surat')),
				'tanggal_surat'=>htmlspecialchars($this->input->post('tgl_surat')),
				'pengirim'=>htmlspecialchars($this->input->post('pengirim')),
				'perihal'=>htmlspecialchars($this->input->post('perihal')),
				'agno'=>htmlspecialchars($this->input->post('agno')),
				'tanggal_diterima'=>htmlspecialchars($this->input->post('tgl_diterima')),
				//'file'=>htmlspecialchars($this->input->post('file'))
			];
				
			}else{
				$data=[
				//'id_surat'=>$this->input->post('id_surat'),
				'nomor_surat'=>htmlspecialchars($this->input->post('no_surat')),
				'tanggal_surat'=>htmlspecialchars($this->input->post('tgl_surat')),
				'pengirim'=>htmlspecialchars($this->input->post('pengirim')),
				'perihal'=>htmlspecialchars($this->input->post('perihal')),
				'agno'=>htmlspecialchars($this->input->post('agno')),
				'tanggal_diterima'=>htmlspecialchars($this->input->post('tgl_diterima')),
				'file_surat'=>$_FILES['file_surat']['name'],
				
			];

			$targetfolder= "assets/upload_surat_masuk/";
			$targetfolder=$targetfolder . basename( $_FILES['file_surat']['name']);
			$file_type=$_FILES['file_surat']['type'];

			// $targetfolde= "assets/upload_surat_masuk/";
			// $targetfolde=$targetfolde . basename( $_FILES['file_disposisi']['name']);
			// $file_type=$_FILES['file_disposisi']['type'];
			

			if ($file_type=="application/pdf") {
				if (!move_uploaded_file($_FILES['file_surat']['tmp_name'], $targetfolder)) {
					
				}
			}

			}
			$id=$this->input->post('id_surat');
			$where=$this->db->where('id_surat', $id);
			$this->db->update('surat_masuk', $data,$where);

			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Diedit!</div>');
			redirect('c_superadmin/suratmasuk');


		}
	}

	public function editsuratkeluar()
	{
		$this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required|trim');
		$this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required|trim');
		$this->form_validation->set_rules('ringkasan', 'ringkasan', 'required|trim');
		$this->form_validation->set_rules('tujuan', 'tujuan', 'required|trim');
		
		if ($this->form_validation->run() == FALSE) {
			redirect('c_superadmin/suratkeluar');
			
		}else{
			

			if ($_FILES['file']['name'] =='') {
				$data=[
				//'id_surat'=>$this->input->post('id_surat'),
				'nomor_surat'=>htmlspecialchars($this->input->post('no_surat')),
				'tanggal_surat'=>htmlspecialchars($this->input->post('tgl_surat')),
				'ringkasan'=>htmlspecialchars($this->input->post('ringkasan')),
				'tujuan'=>htmlspecialchars($this->input->post('tujuan')),
				
			];
				
			}else{
				$data=[
				//'id_surat'=>$this->input->post('id_surat'),
				'nomor_surat'=>htmlspecialchars($this->input->post('no_surat')),
				'tanggal_surat'=>htmlspecialchars($this->input->post('tgl_surat')),
				'ringkasan'=>htmlspecialchars($this->input->post('ringkasan')),
				'tujuan'=>htmlspecialchars($this->input->post('tujuan')),
				'file'=>$_FILES['file']['name']
			];

			$targetfolder= "assets/upload_surat_keluar/";
			$targetfolder=$targetfolder . basename( $_FILES['file']['name']);
			$file_type=$_FILES['file']['type'];
			

			if ($file_type=="application/pdf") {
				if (!move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder)) {
					
				}

			}

			}


			

			$id=$this->input->post('id_surat');
			$where= $this->db->where('id_surat', $id);
			$this->db->update('surat_keluar', $data, $where);

			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Diedit!</div>');
			redirect('c_superadmin/suratkeluar');
	}
}

	public function hapussuratmasuk()
	{
		$id=$this->input->post('id_surat');

		$this->db->where('id_surat',$id);
		$this->db->delete('surat_masuk');

		$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Dihapus</div>');
			redirect('c_superadmin/suratmasuk');
	}

	public function hapussuratkeluar()
	{
		$id=$this->input->post('id_surat');

		$this->db->where('id_surat',$id);
		$this->db->delete('surat_keluar');

		$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Dihapus</div>');
			redirect('c_superadmin/suratkeluar');
	}

	public function downloadSuratMasuk($id)
	{
	
		$id= $this->uri->segment(3);
		$fileinfo=$this->m_superadmin->downloadSuratMasuk($id);
		
		force_download('assets/upload_surat_masuk/'.$fileinfo['file_surat'],NULL);
		
	}

	public function downloadSuratdisposisi($id){

		$id= $this->uri->segment(3);
		$fileinfo=$this->m_superadmin->downloadSuratDisposisi($id);
		
		force_download('assets/upload_surat_masuk/'.$fileinfo['file_disposisi'],NULL);
	}

	public function downloadSuratKeluar($id)
	{
		$id= $this->uri->segment(3);
		$fileinfo=$this->m_superadmin->downloadSuratKeluar($id);
		
		force_download('assets/upload_surat_keluar/'.$fileinfo['file'],NULL);
	}

	public function instansi(){
		$data['instansi']=$this->m_superadmin->GetInstansi()->result();
		$data['main_view']='v_instansi';
		$this->load->view('v_template', $data);
	}

	public function tambahinstansi()
	{
		$this->form_validation->set_rules('nama', 'Nama Instansi', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			redirect('c_superadmin/instansi');
		} else {
			$data=[
				'nama_instansi'=>$this->input->post('nama'),
				
			];

			$this->db->insert('instansi', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Ditambah</div>');
			redirect('c_superadmin/instansi');

		}
	}

	public function editinstansi()
	{
		$this->form_validation->set_rules('nama', 'Nama Instansi', 'trim|required');
		

		if ($this->form_validation->run() == FALSE) {
			redirect('c_superadmin/instansi');
		} else{
			$data=[
			
				'nama_instansi'=>$this->input->post('nama'),
				
			];
		}
			
			$id=$this->input->post('id');
			$where=$this->db->where('id',$id);
			$this->db->update('instansi', $data,$where);

			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Diedit!</div>');
			redirect('c_superadmin/instansi');
	}

	public function hapusinstansi()
	{
		$id=$this->input->post('id');
		$this->db->where('id',$id);
		$this->db->delete('instansi');

		$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Dihapus</div>');
			redirect('c_superadmin/instansi');
	}

	public function users()
	{
		$data['users']=$this->m_superadmin->GetUsers()->result();
		$data['main_view']='v_users';
		$this->load->view('v_template', $data);
	}

	public function tambahusers()
	{
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('hak_akses', 'Hak Akses', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			redirect('c_superadmin/users');
		} else {
			$data=[
				'username'=>$this->input->post('username'),
				'password'=>$this->input->post('password'),
				'nama'=>$this->input->post('nama'),
				'role_id'=>$this->input->post('hak_akses'),
				'foto'=>$file_path = $this->input->post('nama').".jpg"
			];

			$file_tmp = $_FILES['foto']['tmp_name'];
			$file_type = $_FILES['foto']['type'];
			$file_error = $_FILES['foto']['error'];
			$file_size = $_FILES['foto']['size'];
			$file_path = $this->input->post('nama').".jpg";

			if ($file_type == "image/jpeg" || $file_type == "image/png") {
				if ($file_size > 0 and  $file_error == 0) {
					move_uploaded_file($file_tmp,"assets/images/".$this->input->post('nama').".jpg" );
				}
			}

			$this->db->insert('users', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Ditambah</div>');
			redirect('c_superadmin/users');

		}
	}

	public function editusers()
	{
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('hak_akses', 'Hak Akses', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			echo 'error_reporting()';
			exit;
			redirect('c_superadmin/users');
		} else{
			
			

			if ($_FILES['foto']['name'] =='') {
				$data=[
				'username'=>$this->input->post('username'),
				'password'=>$this->input->post('password'),
				'nama'=>$this->input->post('nama'),
				'role_id'=>$this->input->post('hak_akses'),
				];
			}else{
				$data=[
			
				'username'=>$this->input->post('username'),
				'password'=>$this->input->post('password'),
				'nama'=>$this->input->post('nama'),
				'role_id'=>$this->input->post('hak_akses'),
				'foto'=>$file_path = $this->input->post('nama').".jpg"
				];		
			}

			$file_tmp = $_FILES['foto']['tmp_name'];
			$file_type = $_FILES['foto']['type'];
			$file_error = $_FILES['foto']['error'];
			$file_size = $_FILES['foto']['size'];
			$file_path = $this->input->post('nama').".jpg";

			if ($file_type == "image/jpeg" || $file_type == "image/png") {
				if ($file_size > 0 and  $file_error == 0) {
					move_uploaded_file($file_tmp,"assets/images/".$this->input->post('nama').".jpg" );
				}
			}

			$id=$this->input->post('id_user');
			$where=$this->db->where('id_user',$id);
			$this->db->update('users', $data,$where);

			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Diedit!</div>');
			redirect('c_superadmin/users');
		}
	}

	public function hapususers()
	{
		$id=$this->input->post('id_user');
		$this->db->where('id_user',$id);
		$this->db->delete('users');

		$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Dihapus</div>');
			redirect('c_superadmin/users');
	}

	public function laporansuratmasuk()
	{
		$data['main_view']='v_laporansuratmasuk';
		$this->load->view('v_template', $data);
	}

	public function laporansuratkeluar()
	{
		$data['main_view']='v_laporansuratkeluar';
		$this->load->view('v_template', $data);
	}

	public function actionlaporanmasukbulanan()
	{
		$bulan=$this->input->post('bulan');
		$tahun=$this->input->post('tahun');
		$data['data']=$this->db->query("SELECT * FROM surat_masuk WHERE EXTRACT(MONTH FROM tanggal_surat) = '$bulan' AND EXTRACT(YEAR FROM tanggal_surat) = '$tahun' ORDER BY tanggal_surat DESC")->result();
		
		$query1=$this->db->query("SELECT * FROM surat_masuk WHERE EXTRACT(MONTH FROM tanggal_surat) = '$bulan' AND EXTRACT(YEAR FROM tanggal_surat) = '$tahun'")->row_array();
		$data['d1'] = $query1;
		// $data['d2'] =$data;

		$this->load->view('v_masuksuratbulanan', $data);
		
	}

    public function actionlaporanmasuktahunan()
    {
		$tahun=$this->input->post('tahun');
		$data['data']=$this->db->query("SELECT * FROM surat_masuk WHERE EXTRACT(YEAR FROM tanggal_surat) = '$tahun' ORDER BY tanggal_surat DESC")->result();
		
		$query1=$this->db->query("SELECT * FROM surat_masuk WHERE  EXTRACT(YEAR FROM tanggal_surat) = '$tahun'")->row_array();

		$this->load->view('v_masuksurattahunan', $data);

	
    }

    public function actionlaporankeluarbulanan()
	{
		$bulan=$this->input->post('bulan');
		$tahun=$this->input->post('tahun');
		$data['data']=$this->db->query("SELECT * FROM surat_keluar WHERE EXTRACT(MONTH FROM tanggal_surat) = '$bulan' AND EXTRACT(YEAR FROM tanggal_surat) = '$tahun' ORDER BY tanggal_surat DESC")->result();
		
		$query1=$this->db->query("SELECT * FROM surat_keluar WHERE EXTRACT(MONTH FROM tanggal_surat) = '$bulan' AND EXTRACT(YEAR FROM tanggal_surat) = '$tahun'")->row_array();
		$data['d1'] = $query1;

		$this->load->view('v_keluarsurat', $data);

		
    }

     public function actionlaporankeluartahunan()
    {
		$tahun=$this->input->post('tahun');
		$data['data']=$this->db->query("SELECT * FROM surat_keluar WHERE EXTRACT(YEAR FROM tanggal_surat) = '$tahun' ORDER BY tanggal_surat DESC")->result();
		
		$query1=$this->db->query("SELECT * FROM surat_keluar WHERE  EXTRACT(YEAR FROM tanggal_surat) = '$tahun'")->row_array();

		$this->load->view('v_keluarsurattahunan', $data);

		
    }

    public function cetakDisposisi()
	{
		$id=$this->uri->segment(3);
		// $bulan=$this->input->post('bulan');
		// $tahun=$this->input->post('tahun');
		$data['data']=$this->db->query("SELECT * FROM surat_masuk WHERE id_surat='$id' ")->row_array();
		$this->load->view('v_disposisi', $data);

		
    }

    public function backup_database()
    {
    	$this->load->dbutil();

    	$backup = $this->dbutil->backup();

    	$this->load->helper('file');
    	write_file('./assets/backup_database.zip',$backup);

    	$this->load->helper('download');
    	force_download('backup_database.zip',$backup);
    }

    public function verifikasi($id_surat)
    {
    	if ($this->m_superadmin->verified($id_surat)) {
    		redirect('c_superadmin/suratmasuk');
    	}else{
    		exit('data unknown!');
    	}
    }

	

}

/* End of file c_superadmin.php */
/* Location: ./application/controllers/c_superadmin.php */ ?>