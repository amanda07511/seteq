<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  CSistemaA extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("consulta_model");

		if($this->session->userdata('idUser') == null){
			redirect('/welcome', 'refresh');
		}
	}


	public function index()
	{
		$this->getAllDoc();

	}



	public function getAllDoc(){
		$this->load->helper("url");

		$this->load->view('/head');
		$this->load->view('/header2');
		
		if($this->session->userdata('tipo') == 1)
			$this->load->view('/sectionMenuAdmin');
		else
			$this->load->view('/sectionMenuEditor');

		

		$data = array();
		$result = $this->consulta_model->getDocs();
		
		$data['result'] = $result->result();
		$data['total'] = $result->num_rows();

		$this->load->view('/sectionDocumentosMod');
		$this->load->view('/sectionDocumentos',  $data);
		$this->load->view('/footerSistema');
		
	}

	public function getDoc(){
		$this->load->helper("url");

		$this->load->view('/head');
		$this->load->view('/header2');

		if($this->session->userdata('tipo') == 1)
			$this->load->view('/sectionMenuAdmin');
		else
			$this->load->view('/sectionMenuEditor');

		$this->load->view('/sectionDocumentosMod');
		
		$data = array();
		$result = $this->consulta_model->getDocsFilter("Completos");
		
		$data['result'] = $result->result();
		$data['total'] = $result->num_rows();
		
		$this->load->view('/sectionNuestrosDoc',  $data);
		$this->load->view('/footerSistema');
	}

	public function getFormat(){
		$this->load->helper("url");

		$this->load->view('/head');
		$this->load->view('/header2');

		if($this->session->userdata('tipo') == 1)
			$this->load->view('/sectionMenuAdmin');
		else
			$this->load->view('/sectionMenuEditor');

		$this->load->view('/sectionDocumentosMod');
		//$this->load->view('/sectionDocumentosMod');
		
		$data = array();
		$result = $this->consulta_model->getDocsFilter("Formatos");
		
		$data['result'] = $result->result();
		$data['total'] = $result->num_rows();
		
		$this->load->view('/sectionFormatos',  $data);
		$this->load->view('/footerSistema');
		
	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */