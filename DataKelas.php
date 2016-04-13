<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends CI_Controller {
/**
* Index Page for this controller.
*
* Maps to the following URL
* http://example.com/index.php/welcome
* - or -
* http://example.com/index.php/welcome/index
* - or -
* Since this controller is set as the default controller in
* config/routes.php, it's displayed at http://example.com/
*
* So any other public methods not prefixed with an underscore will
* map to /index.php/welcome/<method_name>
* @see http://codeigniter.com/user_guide/general/urls.html
*/
function __construct(){
		parent::__construct();
		$this->load->model("Kelas"); //Kelas.php pada folder models
	}
    public function index() {
         $this->load->model('Kelas');
        
        $data['kelas'] = $this->Kelas->select_kls();//method select_kls pada Kelas.php yang ada pada folder models
        $this->load->view('Kelas_View', $data);//menuju ke Kelas_View.php ada folder view
    }

    public function insertkelas() {
 
//        $data = array();
//        $data['id_kelas'] = $this->Kelas->id_kelas();
//        $data['nama_kelas'] = $this->Kelas->nama_kelas();
//        $data['nip'] = $this->Kelas->nip();
//        $data['nomorinduk'] = $this->Kelas->nomorinduk();
        $data = array(
        'id_kelas' => $this->input->post('id_kelas'),
        'nama_kelas' => $this->input->post('nama_kelas'),
        'nip' => $this->input->post('nip'),
        'nomorinduk' => $this->input->post('nomorinduk'));
        $this->Kelas->Insert($data); 
        $this->load->view('Welcome/Kelas_View');//dari kelas Welcome.php digunakan pada Kelas_View.php
           
         
    }
    public function Select_kls() {
    $data['kelas'] = $this->Kelas->select_kls();//method select_kls
	
  }
   public function hapus($id_kelas){
       
		$where = array('id_kelas' => $id_kelas);//dihapus menurut id-nya
		$this->Kelas->delete($where,'kelas');
		$this->load->view('hapuskelas');
             //redirect(base_url().'index.php/crud/lihat');
    }
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */