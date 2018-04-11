<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  CFormatos extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("consulta_model");

		if($this->session->userdata('idUser') == null){
			redirect('/welcome', 'refresh');
		}
	}

	public function index()
	{
		
	}

	public function download($id){
		if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
            $fileInfo = $this->consulta_model->getDocs($id);
            
            //file path
            $file = 'documentos/'.$fileInfo['file'];
            
            //download file from directory
            force_download($file, NULL);
        }

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */