<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  CSistemaA extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("consulta_model");

		if(!$this->session->userdata('idUser') || !$this->session->userdata('email')){
			redirect('/welcome', 'refresh');
		}
	}


	public function index()
	{
		$this->buscaDoc();
		$this->load->helper("url");

		$this->load->view('/head');
		$this->load->view('/header2');
		$this->load->view('/sectionMenuAdmin');
		$this->load->view('/sectionDocumentos');


	}



	public function buscaDoc(){
		$data = array();
		$result = $this->consulta_model->getDocs();
		if($result != FALSE){
				$data['result'] =$result;
		} else {
				$data['result'] ='';
		}
		
		$this->load->helper("url");

		$this->load->view('/head');
		$this->load->view('/header2');
		$this->load->view('/sectionMenuAdmin');
		$this->load->view('/sectionDocumentos',  $data);
		
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */