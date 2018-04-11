<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  CSistemaE extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("consulta_model");

		if(!$this->session->userdata('idUser') || !$this->session->userdata('email')){
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
		$this->load->view('/sectionMenuEditor');

		$data = array();
		$result = $this->consulta_model->getDocs();
		
		$data['result'] = $result->result();
		$data['total'] = $result->num_rows();
		
		$this->load->view('/sectionDocumentos',  $data);
		
	}

	public function getDoc(){
		$this->load->helper("url");

		$this->load->view('/head');
		$this->load->view('/header2');
		$this->load->view('/sectionMenuEditor');
		
		$data = array();
		$result = $this->consulta_model->getDocsFilter("Nuestros");
		
		$data['result'] = $result->result();
		$data['total'] = $result->num_rows();
		
		$this->load->view('/sectionNuestrosDoc',  $data);
		
	}

	public function getFormat(){
		$this->load->helper("url");

		$this->load->view('/head');
		$this->load->view('/header2');
		$this->load->view('/sectionMenuEditor');
		
		$data = array();
		$result = $this->consulta_model->getDocsFilter("Formatos");
		
		$data['result'] = $result->result();
		$data['total'] = $result->num_rows();
		
		$this->load->view('/sectionFormatos',  $data);
		
	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */