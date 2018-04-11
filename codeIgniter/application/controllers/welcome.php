<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}

	public function index()
	{
		$this->load->helper("url");

		$this->load->view('/head');
		$this->load->view('/header');
		$this->load->view('/pagetop');
		$this->load->view('/sectionAcerca');
		$this->load->view('/sectionNormativas');
		$this->load->view('/sectionServicios');
		$this->load->view('/sectionArticulos');
		$this->load->view('/sectionReclutamiento');
		$this->load->view('/sectionNosotros');
		$this->load->view('/sectionContacto');
		$this->load->view('/sectionAuth');
		$this->load->view('/footer');

	}

	public function authmodal(){
		if($this->session->userdata('idUser') || $this->session->userdata('email')){
			switch ($this->session->userdata('tipo')){
					case '1':
						redirect("cSistemaA");
					case '2':
						redirect("cSistemaE");
					case '3 ':
						redirect("cSistemaV");

			}
		}


		redirect('/welcome');
		
	}

	public function sendMail(){
		$this->load->library('email');

		$email =  $this->input->post('email');
		$nombre  =  $this->input->post('nombre');
		$tipoP  =  $this->input->post('tipoP');
		$empresa  =  $this->input->post('empresa');
		$puesto  =  $this->input->post('puesto');
		$telefono  =  $this->input->post('telefono');
		$contacto  =  $this->input->post('contacto');
		$mensaje  =  $this->input->post('mensaje');

		$subject = 'Propuesta proyecto '+ $tipoP;

		$this->email->from($email, $nombre);
		$this->email->to('amanda_07511@hotmail.com');

		$this->email->subject($subject);
		$this->email->message($mensaje );

		$this->email->send();

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */