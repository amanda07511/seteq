<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  CUsers extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("consulta_model");
		$this->load->model("alta_model");

		if($this->session->userdata('idUser') == null){
			redirect('/welcome', 'refresh');
		}
	}

	public function index()
	{
		$this->getAllUsers();
	}

	public function getAllUsers(){
		$this->load->helper("url");

		$this->load->view('/head');
		$this->load->view('/header2');
		$this->load->view('/sectionMenuAdmin');

		$data = array();
		$result = $this->consulta_model->getUsers();
		
		$data['result'] = $result->result();
		$data['total'] = $result->num_rows();

		$this->load->view('/sectionUsuariosMod');
		$this->load->view('/sectionUsuarios',  $data);
		$this->load->view('/footerUser');
		
	}

	public function crearUsuario(){
    	$status = "";
    	$msg = "";
    	$password = "";
      
        $usuario = array();
		$usuario['nombre'] = $this->input->post('nom');
		$usuario['apellido1'] = $this->input->post('ap1');
		$usuario['apellido2'] = $this->input->post('ap2');
		$usuario['email'] = $this->input->post('email');
		$usuario['tipoUser'] = $this->input->post('tipoUser');

		$password = $this->input->post('password');
		$usuario['password'] = md5($password);

        $subir = $this->alta_model->insertaUser($usuario);
          
        if($subir == TRUE){
			$status = "success";
            $msg = "User successfully registered";
        }
        else{
            $status = "error";
            $msg = "Ops, something went wrong when saving the user, please try again. ";
        }
         echo json_encode(array('status' => $status, 'msg' => $msg));
    }

    public function eliminarUser(){
		$status = "";
    	$msg = "";

		$this->load->model("baja_model");

		//tomamos la variable que viene de la peticion Ajax
		$idUser= $this->input->post('idUser');
		$delete = $this->baja_model->eliminaUser($idUser);
		//echo "Im here"; 
		if( $delete == TRUE){
			$status = "success";
            $msg = "File successfully deleted";
		} else {
			$status = "error";
            $msg = "Ops, something went wrong when saving the file, please try again. ";
		}
		echo json_encode(array('status' => $status, 'msg' => $msg));
		
	}//fin de eliminarDocumento

	public function getUser(){
		$this->load->model("consulta_model");
		$data = array();
		$id = $this->input->post('idUser');
		$result = $this->consulta_model->getUser($id);
		
		$data['user'] = $result;
		$data['password'] = md5($result->password);
		echo json_encode(array('data' => $data));

	}

	public function modificarUser($id){
    	$status = "";
    	$msg = "";
           
        $usuario = array();
		$usuario['email'] = $this->input->post('email');
		$usuario['nombre'] = $this->input->post('nom');
		$usuario['apellido1'] = $this->input->post('ap1');
		$usuario['apellido2'] = $this->input->post('ap2');
		$usuario['tipoUser'] = $this->input->post('tipoUser');
		if($this->input->post('password')!= ""){
			$password = $this->input->post('password');
			$usuario['password'] = md5($password);
		}

        $subir = $this->alta_model->modificaUser($usuario,$id);

        if($subir == TRUE){
			$status = "success";
            $msg = "User successfully uploaded";
        }
        else{
            $status = "error";
            $msg = "Ops, something went wrong when saving the user, please try again. ";
        }
         echo json_encode(array('status' => $status, 'msg' => $msg));
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */